<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

// 1. Prepare writable storage directories in /tmp (Vercel has read-only filesystem)
$storagePath = '/tmp/storage';
$tmpDirs = [
    $storagePath . '/app',
    $storagePath . '/framework',
    $storagePath . '/framework/cache',
    $storagePath . '/framework/cache/data',
    $storagePath . '/framework/sessions',
    $storagePath . '/framework/views',
    $storagePath . '/logs',
    '/tmp/bootstrap/cache',
];

foreach ($tmpDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// 2. Ensure an empty SQLite database exists in /tmp
if (!file_exists('/tmp/database.sqlite')) {
    @touch('/tmp/database.sqlite');
}

// 3. Set runtime environment paths to writable /tmp
putenv('VIEW_COMPILED_PATH=' . $storagePath . '/framework/views');
putenv('APP_CONFIG_CACHE=/tmp/bootstrap/cache/config.php');
putenv('APP_EVENTS_CACHE=/tmp/bootstrap/cache/events.php');
putenv('APP_PACKAGES_CACHE=/tmp/bootstrap/cache/packages.php');
putenv('APP_ROUTES_CACHE=/tmp/bootstrap/cache/routes.php');
putenv('APP_SERVICES_CACHE=/tmp/bootstrap/cache/services.php');
putenv('DB_DATABASE=/tmp/database.sqlite');

$_ENV['VIEW_COMPILED_PATH'] = $storagePath . '/framework/views';
$_ENV['DB_DATABASE'] = '/tmp/database.sqlite';

// 4. Set APP_KEY (Use environment variable from Vercel if set, otherwise fallback)
$appKey = getenv('APP_KEY') ?: ($_ENV['APP_KEY'] ?? null);
if (empty($appKey)) {
    $appKey = 'base64:D4LdrKelhtLPuWYLJL6U/ojRy1gO8ar3cmt44Gv6wNc=';
    putenv("APP_KEY={$appKey}");
    $_ENV['APP_KEY'] = $appKey;
    $_SERVER['APP_KEY'] = $appKey;
}

define('LARAVEL_START', microtime(true));

// 5. Autoload Composer dependencies
require __DIR__ . '/../vendor/autoload.php';

// 6. Bootstrap Laravel Application
/** @var Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 7. Configure storage path to /tmp/storage
$app->useStoragePath($storagePath);

// 8. Handle request with safe exception catch
try {
    $request = Request::capture();
    $app->handleRequest($request);
} catch (\Throwable $e) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    echo "Server Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . " on line " . $e->getLine() . "\n\n";
    echo $e->getTraceAsString();
}

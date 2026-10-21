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

// 4. Check if APP_KEY is provided in Vercel Environment Variables
$appKey = getenv('APP_KEY') ?: ($_ENV['APP_KEY'] ?? null);
if (empty($appKey)) {
    http_response_code(500);
    header('Content-Type: text/html; charset=utf-8');
    echo '<!DOCTYPE html><html><head><title>APP_KEY Missing - DailyPack</title></head><body style="font-family: system-ui, -apple-system, sans-serif; background: #f8fafc; padding: 40px; margin: 0;">';
    echo '<div style="max-width: 620px; margin: 40px auto; background: #fff; padding: 32px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.08);">';
    echo '<h2 style="color: #e11d48; margin-top: 0; font-size: 20px;">⚠️ Missing APP_KEY in Vercel Settings</h2>';
    echo '<p style="color: #475569; font-size: 15px; line-height: 1.6;">Laravel application run karne ke liye <strong>APP_KEY</strong> zaroori hai. Vercel dashboard me environment variable add karein:</p>';
    echo '<ol style="color: #334155; font-size: 14px; line-height: 1.8; padding-left: 20px;">';
    echo '<li>Vercel Dashboard &rarr; Project Select karein &rarr; <strong>Settings</strong> &rarr; <strong>Environment Variables</strong></li>';
    echo '<li><strong>Key:</strong> <code style="background: #f1f5f9; padding: 2px 6px; border-radius: 4px; font-weight: bold;">APP_KEY</code></li>';
    echo '<li><strong>Value:</strong> apna local <code>.env</code> file ka APP_KEY copy karke paste karein</li>';
    echo '<li>Save karein aur Deployments tab me jaakar <strong>Redeploy</strong> karein.</li>';
    echo '</ol>';
    echo '</div></body></html>';
    exit;
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

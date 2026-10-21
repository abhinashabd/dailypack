<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

// Storefront Pages (Modular Blade Architecture)
Route::get('/', function () {
    return view('pages.home');
});

Route::get('/categories', function () {
    return view('pages.categories');
});

Route::get('/products', function () {
    return view('pages.products');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/images/packaging-manufacturing.jpg', function () {
    $brainPath = 'C:/Users/abhin/.gemini/antigravity-ide/brain/a3e60b22-1554-456c-bdd8-96470851e8de/food_packaging_manufacturing_1791781068153.jpg';
    $dest = public_path('images/packaging-manufacturing.jpg');
    if (!file_exists($dest) && file_exists($brainPath)) {
        @copy($brainPath, $dest);
    }
    if (file_exists($dest)) {
        return response()->file($dest);
    }
    if (file_exists($brainPath)) {
        return response()->file($brainPath);
    }
    abort(404);
});

Route::get('/contact', function () {
    return view('pages.contact');
});

// Admin Panel Standalone Page Routes
Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/products', function () {
    return view('admin.products');
});

Route::get('/admin/categories', function () {
    return view('admin.categories');
});

Route::get('/admin/inquiries', function () {
    return view('admin.inquiries');
});

// API Endpoints
Route::prefix('api')->group(function () {
    Route::get('/categories', [ApiController::class, 'getCategories']);
    Route::get('/products', [ApiController::class, 'getProducts']);
    Route::post('/inquiries', [ApiController::class, 'submitInquiry']);
    
    // Admin Routes
    Route::post('/admin/login', [ApiController::class, 'adminLogin']);
    Route::post('/admin/products', [ApiController::class, 'storeProduct']);
    Route::put('/admin/products/{id}', [ApiController::class, 'updateProduct']);
    Route::delete('/admin/products/{id}', [ApiController::class, 'deleteProduct']);
    
    Route::post('/admin/categories', [ApiController::class, 'storeCategory']);
    Route::put('/admin/categories/{id}', [ApiController::class, 'updateCategory']);
    Route::delete('/admin/categories/{id}', [ApiController::class, 'deleteCategory']);
    
    Route::get('/admin/inquiries', [ApiController::class, 'getInquiries']);
    Route::delete('/admin/inquiries/{id}', [ApiController::class, 'deleteInquiry']);
});

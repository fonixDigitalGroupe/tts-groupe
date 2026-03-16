<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/bureau-etudes', [AboutController::class, 'bureauEtudes'])->name('bureau-etudes');
Route::get('/production-terrain', [AboutController::class, 'productionTerrain'])->name('production-terrain');
Route::get('/raccordement', [AboutController::class, 'raccordement'])->name('raccordement');
Route::get('/sav', [AboutController::class, 'sav'])->name('sav');
Route::get('/deploiement', [AboutController::class, 'deploiement'])->name('deploiement');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/product/{product:slug}', [ShopController::class, 'show'])->name('shop.show');

// ─── Admin Panel ──────────────────────────────────────────────
Route::get('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('login');

Route::prefix('admin')->name('admin.')->group(function () {
    // Public Auth Routes
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login.post');

    // Protected Routes
    Route::middleware(['auth'])->group(function () {
        Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('logout');

        // Categories
        Route::get('/categories', [AdminController::class, 'categoriesIndex'])->name('categories.index');
        Route::get('/categories/create', [AdminController::class, 'categoriesCreate'])->name('categories.create');
        Route::post('/categories', [AdminController::class, 'categoriesStore'])->name('categories.store');
        Route::get('/categories/{category}/edit', [AdminController::class, 'categoriesEdit'])->name('categories.edit');
        Route::put('/categories/{category}', [AdminController::class, 'categoriesUpdate'])->name('categories.update');
        Route::delete('/categories/{category}', [AdminController::class, 'categoriesDestroy'])->name('categories.destroy');

        // Products
        Route::get('/products', [AdminController::class, 'productsIndex'])->name('products.index');
        Route::get('/products/create', [AdminController::class, 'productsCreate'])->name('products.create');
        Route::post('/products', [AdminController::class, 'productsStore'])->name('products.store');
        Route::get('/products/{product}/edit', [AdminController::class, 'productsEdit'])->name('products.edit');
        Route::put('/products/{product}', [AdminController::class, 'productsUpdate'])->name('products.update');
        Route::delete('/products/{product}', [AdminController::class, 'productsDestroy'])->name('products.destroy');
        
        // Settings & Users
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::get('/users/create', [AdminController::class, 'usersCreate'])->name('users.create');
        Route::post('/users', [AdminController::class, 'usersStore'])->name('users.store');
        Route::get('/users/{user}/edit', [AdminController::class, 'usersEdit'])->name('users.edit');
        Route::put('/users/{user}', [AdminController::class, 'usersUpdate'])->name('users.update');
        Route::delete('/users/{user}', [AdminController::class, 'usersDestroy'])->name('users.destroy');
    });
});



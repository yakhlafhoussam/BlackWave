<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // User management
    Route::post('/users/{user}/ban', [AdminController::class, 'banUser'])->name('admin.users.ban');
    Route::post('/users/{user}/unban', [AdminController::class, 'unbanUser'])->name('admin.users.unban');
    // Category management
    Route::post('/categories', [AdminController::class, 'addCategory'])->name('admin.categories.add');
    Route::delete('/categories/{category}', [AdminController::class, 'removeCategory'])->name('admin.categories.remove');
    // Product management
    Route::delete('/products/{product}', [AdminController::class, 'removeProduct'])->name('admin.products.remove');
    // Service management
    Route::delete('/services/{service}', [AdminController::class, 'removeService'])->name('admin.services.remove');
    // Post management
    Route::delete('/posts/{post}', [AdminController::class, 'removePost'])->name('admin.posts.remove');
});

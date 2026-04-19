<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BanController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DdosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderPageController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');

    Route::get('/auth/google/redirect', [AuthController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/banned', [BanController::class, 'index'])->name('banned.page');

    Route::get('/complete-profile', [ProfileController::class, 'showCompleteForm'])->name('complete-profile');
    Route::post('/complete-profile', [ProfileController::class, 'storeCompleteForm'])->name('complete-profile.store');
});

Route::middleware(['auth', 'check.banned', 'check.profile'])->group(function () {

    Route::get('/chats', [ChatController::class, 'list'])->name('chat.list');

    Route::get('/orders', [OrderPageController::class, 'index'])->name('orders');

    Route::get('/chat/{user}', [ChatController::class, 'index'])->name('chat.with');
    Route::post('/chat/{user}', [ChatController::class, 'send'])->name('chat.send');

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::post('/profile/update-image', [ProfileController::class, 'updateImage'])->name('profile.update.image');
    Route::post('/profile/delete-image', [ProfileController::class, 'deleteImage'])->name('profile.delete.image');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.edit.apply');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

    Route::get('/service', [ServicesController::class, 'index'])->name('service');
    Route::get('/service/create', [ServicesController::class, 'create'])->name('create.service');
    Route::post('/service/create', [ServicesController::class, 'store'])->name('services.store');
    Route::get('/service/show/{service}', [ServicesController::class, 'show'])->name('show.service');
    Route::delete('/service/delete/{service}', [ServicesController::class, 'destroy'])->name('service.delete');

    Route::get('/service/ddos', [ServicesController::class, 'ddos'])->name('ddos');
    Route::get('/service/ddos/check', [DdosController::class, 'apply'])->name('ddos.check');
    Route::get('/service/ddos/apply', [DdosController::class, 'start'])->name('ddos.apply');

    Route::get('/service/password', [ServicesController::class, 'password'])->name('password');
    Route::get('/service/password/apply', [PasswordController::class, 'apply'])->name('password.apply');
    Route::get('/service/password/check', [PasswordController::class, 'redirect'])->name('check.password');
    Route::post('/service/password/start', [PasswordController::class, 'start'])->name('start.password');
    Route::post('/service/password/now/hyk/youcode/security/abdelaziz', [PasswordController::class, 'now'])->name('now.password');

    Route::get('/marketplace', [MarketplaceController::class, 'index'])->name('marketplace');
    Route::get('/marketplace/create', [MarketplaceController::class, 'create'])->name('create.marketplace');
    Route::post('/marketplace/create', [MarketplaceController::class, 'store'])->name('marketplace.store');
    Route::get('/marketplace/show/{product}', [MarketplaceController::class, 'show'])->name('show.product');
    Route::delete('/marketplace/delete/{product}', [MarketplaceController::class, 'destroy'])->name('marketplace.delete');
    Route::post('/marketplace/order/{product}', [OrderController::class, 'storeMarketplace'])->name('marketplace.order');

    Route::post('/service/order/{service}', [OrderController::class, 'storeService'])->name('service.order');

    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/posts/create', [PostController::class, 'create'])->name('create.post');
    Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');

    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
    Route::delete('/posts/{post}/unlike', [PostController::class, 'unlike'])->name('posts.unlike');

    Route::post('/posts/{post}/comments', [PostController::class, 'storeComment'])->name('comments.store');

    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.delete');
    Route::delete('/comments/{comment}', [PostController::class, 'destroyComment'])->name('comments.delete');
});

// Admin routes
require __DIR__.'/admin.php';

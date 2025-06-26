<?php
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AccountController;

use App\Http\Controllers\AdminController;
use App\Http\Middleware\CheckRole;

// Tạo resource routes cho products
Route::resource('products', ProductController::class);
#Route::get('/', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::resource('products', ProductController::class)->except(['create']);
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
Route::get('/account', [AccountController::class, 'index'])->name('account.index');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');

//Main
Route::get('/', function () {
    $products = \App\Models\Product::all();
    return view('home', compact('products')); 
})->name('home');


//Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login'); 
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        // Chuyển hướng theo role
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('home');
    }
    return back()->withErrors([
        'email' => 'Email hoặc mật khẩu không đúng.',
    ])->withInput();
})->name('login.post');
//Đăng ký
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'user',
    ]);

    Auth::login($user);

    return redirect()->route('home');
})->middleware('guest')->name('register.post');


// Reset Password
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');

//Middleware

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/users', App\Http\Controllers\Admin\UserController::class)->names('admin.users');
});
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
});

//Admin dashboard
Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');


// Route::get('/admin/users', function () {
//     return view('admin/users');
// })->name('admin.users');

Route::get('/admin/settings', function () {
    return view('admin.settings');
})->name('admin.settings');

Route::get('/admin/reports', function () {
    return view('admin.reports');
})->name('admin.reports');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

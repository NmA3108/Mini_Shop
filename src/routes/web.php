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
        return redirect()->route('home'); // Sử dụng route name 'home'
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
    ]);

    Auth::login($user);

    return redirect()->route('home');
})->middleware('guest')->name('register.post');


// Reset Password
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
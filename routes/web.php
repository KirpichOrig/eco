<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;    
use App\Http\Controllers\ProfileController;    
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::resource('categories', CategoryController::class);

Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/login', function () {
    return view('pages.login');  
});

Route::get('/register', function () {
    return view('pages.reg'); 
})->name('register.form');

Route::post('/register', [UsersController::class, 'register'])->name('register');

Route::get('/catalog', [ProductController::class, 'index'])->name('catalog');

Route::get('/basket', function () {
    return view('pages.basket'); 
});

Route::get('/about', function () {
    return view('pages.about');  
});

Route::get('/where', function () {
    return view('pages.where');  
});

Route::get('/profil', [ProfileController::class, 'index'])->name('profile');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/add', [ProductController::class, 'showForm'])->name('add.form');
    Route::post('/add', [ProductController::class, 'store'])->name('add.store');
    Route::get('/addcategory', [CategoryController::class, 'create'])->name('addcategory.form');
    Route::post('/addcategory', [CategoryController::class, 'store'])->name('addcategory.store');
});

Route::get('/edit', function () {
    return view('pages.edit');  
});

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate(); 
    session()->regenerateToken(); 
    return redirect('/login');
})->name('logout');

Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');

Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
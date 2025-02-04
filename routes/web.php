<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;    
use App\Http\Controllers\ProfileController;    
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');  // Главная страница
});

Route::get('/login', function () {
    return view('pages.login');  // Страница авторизации
});

Route::get('/register', function () {
    return view('pages.reg');  // Страница регистрации
})->name('register.form');
Route::post('/register', [UsersController::class, 'register'])->name('register');

Route::get('/catalog', function () {
    return view('pages.catalog');  // Страница регистрации
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/add', [ProductController::class, 'showForm'])->name('add.form');
    Route::post('/add', [ProductController::class, 'store'])->name('add.store');
});

Route::get('/edit', action: function () {
    return view('pages.edit');  // Страница регистрации
});

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate(); // Очищаем сессию
    session()->regenerateToken(); // Генерируем новый CSRF-токен
    return redirect('/login');
})->name('logout');

Route::get('/catalog', [ProductController::class, 'index'])->name('catalog');

Route::get('/profil', [ProfileController::class, 'index'])->name('profile');
// Route::get('/profil', 'profile')->name('profile');

Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');

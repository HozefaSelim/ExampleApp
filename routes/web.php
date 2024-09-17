<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TagContronller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

    // dd(auth()->user());
    // dd(Auth::user());
    return view('welcome');
})->name('home');


Route::resource('/products', ProductController::class);
Route::resource('/categories', CategoryController::class);
Route::resource('/tags', TagContronller::class);


// Route::get('/adults/{age}', function () {
//     return "you are adults";
// })->middleware('checkAge:');

Route::get('/adults', function () {
    return "you are adults";
})->middleware('checkAge:24');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



// Route::get('/admin/dashboard', function () {
//     return view("admin.dashboard");
// })->middleware('admin')->name("dashboard");



Route::middleware('admin')->prefix('/admin/dashboard')->group(function () {
    Route::get('/', function () {
    
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});





Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

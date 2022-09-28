<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', function () {
//     return view('home', [
//         "title" => "Home",
//         "active" => 'home'
//     ]);
// });

// Route::get('/about', function () {
//     return view('about', [
//         'title' => 'About',
//         'active' => 'about',
//         'name' => 'Sandhika Galih',
//         'email' => 'sandhikagalih@gmail.com',
//         'image' => 'sandhika.jpg'
//     ]);
// });

// Route::get('/posts', [PostController::class, 'index']);
// Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// Route::get('/categories', function() {
//     return view('categories', [
//         'title' => 'Post Categories',
//         'active' => 'categories',
//         'categories' => Category::all()
//     ]);
// });


Route::get('/', function () {
    return view('login.index', [
        'title' => 'Login',
        'active' => 'login'
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/dashboard', function() {
    return view('dashboard.index', [
        'title' => 'Dashboard',
        'active' => 'dashboard'
    ]);
})->middleware('auth')->name('dashboard');

Route::resource('/token', TokenController::class)->middleware('auth');

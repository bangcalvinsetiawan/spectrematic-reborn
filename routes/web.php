<?php
// error_reporting("E_ALL");
// ini_set('display_errors', 1);
// $code = $_GET['code'];
// $header_values = array("Accept: application/json", "Content-Type: application/x-www-form-urlencoded");
// $url = 'https://wss.hyper-api.com/token.php';
// $post_arr = array("code" => $code, "grant_type" => "authorization_code");
// $process = curl_init($url);
// curl_setopt($process, CURLOPT_HTTPHEADER, $header_values);
// curl_setopt($process, CURLOPT_USERPWD, "2999a8b9e1ecc9bd2f8d7d85aa46b0f7:0ca33103c520ed2edd261cf66eed06");
// curl_setopt($process, CURLOPT_POST, 1);
// curl_setopt($process, CURLOPT_POSTFIELDS, http_build_query($post_arr));
// curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
// $result = curl_exec($process);
// $json_object = json_decode($result, true);

// $access_token = $json_object['access_token'];
//  echo $access_token;
//  print_r($access_token);
?>

<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
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


// Route::get('/dashboard', function() {
//     return view('dashboard.index', [
//         'title' => 'Dashboard',
//         'active' => 'dashboard'
//     ]);
// })->middleware('auth')->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('showorderlimit', [DashboardController::class, 'showorderlimit'])->middleware('auth');
Route::get('fetch-order', [DashboardController::class, 'fetchorder'])->middleware('auth');
Route::delete('delete-order/{id}', [DashboardController::class, 'destroy']);


Route::resource('/token', TokenController::class)->middleware('auth');
Route::resource('/order', OrderController::class)->middleware('auth');

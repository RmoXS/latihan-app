<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RakBukuController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsAuthController;

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
    return view('welcome');
});
Route::get('/greeting', function () {
    return 'Hello World';
});
Route::view('/hello', 'hello');
Route::get('/coba/{id}', function (string $id) {
    return view('coba', ['id' => $id]);
});
Route::view('/biodata', 'biodata');
Route::post('/biodata', function (Request $request) {
    $output = "Nama: . $request->nama. <br>
            Email: . $request->email. <br>
            No. Hp.: $request->no_hp.";
    return $output;
});
Route::get('/buku', function () {
    $data = [];
    $data['poin'] = 83;
    $data['flag'] = '2';
    $data['sub_judul'] = 'latihan parsing data di view';
    $data['buku'] = ['buku 1', 'buku 2', 'buku 3', 'buku 4', 'buku 5'];
    return view('buku/list', $data);
});
// Rak Buku
Route::resource('rak_buku', RakBukuController::class);

// Register & Login
Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

// Ajax  Rak Buku
Route::post('/rak_buku/ajax_store',[RakBukuController::class, 'ajax_store']);

// Posts
Route::get('posts/login', [PostsAuthController::class, 'showLoginForm'])->name('posts.login');
Route::post('posts/login', [PostsAuthController::class, 'login'])->name('posts.login.post');
Route::post('posts/logout', [PostsAuthController::class, 'logout'])->name('posts.logout');

//validasi form create posts
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// Route yang memerlukan autentikasi
Route::group(['middleware' => 'auth:web'], function() {
    Route::resource('posts', PostController::class);
});
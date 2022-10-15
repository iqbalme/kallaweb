<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Models\Prodi;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/dashboard', [UserController::class, 'dashboard']);

Route::get('/tes', [TestController::class, 'index']);
Route::resource('post', PostController::class);
Route::resource('category', CategoryController::class);
Route::resource('tag', TagController::class);
Route::resource('pendaftaran', PendaftarController::class);
Route::resource('transaksi', TransaksiController::class);
Route::resource('invoice', InvoiceController::class);
Route::resource('setting', SettingController::class);
Route::resource('menu', MenuController::class);
Route::resource('payment', PaymentController::class);
Route::resource('user', UserController::class);

//for ckeditor upload file
Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');
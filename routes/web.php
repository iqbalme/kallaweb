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
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\VoucherController;
use App\Http\Livewire\Frontend\Home;
use App\Http\Livewire\Frontend\SinglePost;
use App\Http\Livewire\Frontend\Login;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\User\UserIndex;
use App\Http\Livewire\Role\RoleIndex;
use App\Http\Livewire\Admin\Profil;
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

Route::get('/lw', function () {
    return view('teslivewire');
});

Route::get('/', Home::class);
Route::get('post/{post_id}', SinglePost::class);
Route::get('tes/', [TestController::class, 'index']);
Route::get('login/', Login::class)->name('login');
Route::post('login/', [UserController::class, 'authenticate']);

Route::prefix('admin')->group(function () {
	Route::get('dashboard/', Dashboard::class)->name('dashboard.admin');
	Route::get('prodi/', [ProdiController::class, 'index'])->name('prodi.index');
	Route::get('register/', [UserController::class, 'register'])->name('register');
	Route::get('logout/', [UserController::class, 'logout'])->name('logout');
	Route::get('users/', UserIndex::class)->name('user.index');
	Route::get('roles/', RoleIndex::class)->name('role.index');
	Route::get('profil/', Profil::class)->name('profil');
	Route::resource('post', PostController::class);
	Route::resource('katalog', KatalogController::class);
	Route::resource('voucher', VoucherController::class);
	Route::resource('category', CategoryController::class);
	Route::resource('tag', TagController::class);
	Route::resource('pendaftaran', PendaftarController::class);
	Route::resource('transaksi', TransaksiController::class);
	Route::resource('invoice', InvoiceController::class);
	Route::resource('setting', SettingController::class);
	Route::resource('menu', MenuController::class);
	
	//for ckeditor upload file
	Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');
	Route::post('upload-thumbnail', [PostController::class, 'upload_thumbnail'])->name('thumbnail.upload');
});
Route::resource('payment', PaymentController::class);
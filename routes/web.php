<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TagController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CKEditorController;
use App\Http\Livewire\Frontend\Home;
use App\Http\Livewire\Frontend\SinglePost;
use App\Http\Livewire\Frontend\Login;
use App\Http\Livewire\Frontend\Arsip;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Profil;
use App\Http\Livewire\Pengaturan\PengaturanDasar;
use App\Http\Livewire\Pengaturan\PengaturanTema;
use App\Http\Livewire\Pengaturan\PengaturanMenu;
use App\Http\Livewire\User\UserIndex;
use App\Http\Livewire\Role\RoleIndex;
use App\Http\Livewire\Prodi\ProdiIndex;
use App\Http\Livewire\Kategori\KategoriIndex;
use App\Http\Livewire\Post\PostIndex;
use App\Http\Livewire\Post\PostCreate;
use App\Http\Livewire\Post\PostUpdate;
use App\Http\Livewire\Katalog\KatalogIndex;
use App\Http\Livewire\Voucher\VoucherIndex;

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
Route::get('post/{post_val}', SinglePost::class)->name('post.single');
Route::get('tes/', [TestController::class, 'index']);
Route::get('arsip/{meta_type}/{meta_val}', Arsip::class);
Route::get('login/', Login::class)->name('login');
Route::post('login/', [UserController::class, 'authenticate']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
	Route::get('dashboard/', Dashboard::class)->name('dashboard.admin');
	Route::get('prodi/', ProdiIndex::class)->name('prodi.index');
	Route::get('kategori/', KategoriIndex::class)->name('kategori.index');
	Route::get('register/', [UserController::class, 'register'])->name('register');
	Route::get('logout/', [UserController::class, 'logout'])->name('logout');
	Route::get('users/', UserIndex::class)->name('user.index');
	Route::get('roles/', RoleIndex::class)->name('role.index');
	Route::get('profil/', Profil::class)->name('profil');
	Route::get('post/', PostIndex::class)->name('post.index');
	Route::get('post/create/', PostCreate::class)->name('post.create');
	Route::get('post/{post}/edit', PostUpdate::class)->name('post.edit');
	Route::get('katalog/', KatalogIndex::class)->name('katalog.index');
	Route::get('voucher/', VoucherIndex::class)->name('voucher.index');
	Route::get('pengaturan/dasar/', PengaturanDasar::class)->name('pengaturan.dasar');
	Route::get('pengaturan/tema/', PengaturanTema::class)->name('pengaturan.tema');
	Route::get('pengaturan/menu/', PengaturanMenu::class)->name('pengaturan.menu');
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
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TagController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CKEditorController;
use App\Http\Livewire\Teslw;
use App\Http\Livewire\Frontend\Home;
use App\Http\Livewire\Frontend\Home2;
use App\Http\Livewire\Frontend\SinglePost;
use App\Http\Livewire\Frontend\SinglePost2;
use App\Http\Livewire\Frontend\Login;
use App\Http\Livewire\Frontend\Arsip;
use App\Http\Livewire\Frontend\PendaftarForm;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Profil;
use App\Http\Livewire\Admin\PendaftarCtrl;
use App\Http\Livewire\Pengaturan\PengaturanDasar;
use App\Http\Livewire\Pengaturan\PengaturanTema;
use App\Http\Livewire\Pengaturan\PengaturanMenu;
use App\Http\Livewire\Pengaturan\PengaturanAdmisi;
use App\Http\Livewire\Pengaturan\PengaturanPembayaran;
use App\Http\Livewire\Pengaturan\PengaturanMail;
use App\Http\Livewire\User\UserIndex;
use App\Http\Livewire\Role\RoleIndex;
use App\Http\Livewire\Prodi\ProdiIndex;
use App\Http\Livewire\Kategori\KategoriIndex;
use App\Http\Livewire\Post\PostIndex;
use App\Http\Livewire\Post\PostCreate;
use App\Http\Livewire\Post\PostUpdate;
use App\Http\Livewire\Katalog\KatalogIndex;
use App\Http\Livewire\Voucher\VoucherIndex;
use App\Http\Livewire\Carousel\CarouselIndex;
use App\Http\Livewire\Page\SuccessPaymentPage;
use App\Http\Livewire\Page\ExpiredPaymentPage;
use App\Http\Livewire\Menu\MenuIndex;
use App\Http\Livewire\Event\EventIndex;
use App\Http\Livewire\Galeri\GaleriIndex;
use App\Http\Livewire\Team\TeamIndex;
use App\Http\Livewire\Testimoni\TestimoniIndex;

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

Route::domain('testing' . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return 'ini adalah subdomain';
    });
});

Route::get('teslw', Teslw::class);
Route::get('/', Home::class)->name('home');
//Route::get('/', Home2::class)->name('home');
Route::get('post/{post_val}', SinglePost::class)->name('post.single');
// Route::get('post/{post_val}', SinglePost2::class)->name('post.single');
Route::get('tes/', [TestController::class, 'index']);
Route::get('arsip/{meta_type}/{meta_val}', Arsip::class)->name('arsip');
Route::get('registrasi/', PendaftarForm::class)->name('registrasi');
Route::get('success-payment/', SuccessPaymentPage::class)->name('payment.success');
Route::get('expired-payment/', ExpiredPaymentPage::class)->name('payment.expired');
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
	Route::get('pengaturan/pembayaran/', PengaturanPembayaran::class)->name('pengaturan.pembayaran');
	Route::get('pengaturan/admisi/', PengaturanAdmisi::class)->name('pengaturan.admisi');
	Route::get('pengaturan/mail/', PengaturanMail::class)->name('pengaturan.mail');
	Route::get('carousel/', CarouselIndex::class)->name('carousel.index');
	Route::get('pendaftar/', PendaftarCtrl::class)->name('pendaftar.index');
	Route::get('menu/', MenuIndex::class)->name('pengaturan.menu');
	Route::get('event/', EventIndex::class)->name('event.index');
	Route::get('galeri/', GaleriIndex::class)->name('galeri.index');
	Route::get('tim/', TeamIndex::class)->name('team.index');
	Route::get('testimoni/', TestimoniIndex::class)->name('testimoni.index');
	
	//for ckeditor upload file
	Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');
	Route::post('upload-thumbnail', [PostController::class, 'upload_thumbnail'])->name('thumbnail.upload');
});
Route::resource('payment', PaymentController::class);
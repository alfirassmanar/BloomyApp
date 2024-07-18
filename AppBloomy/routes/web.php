<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Menus\UserController;
use App\Http\Controllers\Admin\Menus\PelangganController;
use App\Http\Controllers\Admin\Menus\WisataController;
use App\Http\Controllers\Admin\Menus\UMKMController;
use App\Http\Controllers\Admin\Menus\KulinerController;
use App\Http\Controllers\Admin\Menus\BlogController;
use App\Http\Controllers\Admin\Menus\LaporanController;
use App\Http\Controllers\Admin\Menus\PekerjaController;
use App\Http\Controllers\Admin\Menus\TourController;
use App\Http\Controllers\Admin\Menus\TransaksiController;

use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserBlogController;
use App\Http\Controllers\User\PembayaranController;
use App\Http\Controllers\User\SuccessController;
use App\Http\Controllers\User\BantuanController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\HalblogController;

use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\RegistToguideController;


// RUANG LINGKUP ADMIN
Route::get('/Login/Admin', [AdminController::class, 'login'])->name('login.admin.bloomy');
Route::get('/Registrasi/Admin', [AdminController::class, 'registrasi'])->name('registrasi.admin.bloomy');

// Start Ajax Perintah Pemrosesan
Route::post('/api/prosesRegistrasi', [AuthController::class, 'prosesRegistrasi'])->name('prosesRegistrasi.admin.bloomy');
Route::post('/api/prosesLogin', [AuthController::class, 'prosesLogin'])->name('prosesLogin.admin.bloomy');
Route::get('/auth/{provider}', [AuthController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [AuthController::class, 'handleProviderCallback']);

Route::middleware(['isAdmin'])->group(function () {
    Route::post('/api/prosesLogout', [AuthController::class, 'prosesLogout'])->name('prosesLogout.admin.bloomy');

    Route::get('/api/tampilUser', [UserController::class, 'tampilUser'])->name('tampilUser.admin.bloomy');
    Route::post('/api/prosesTambahUser', [UserController::class, 'prosesTambahUser'])->name('prosesTambahUser.bloomy');
    Route::get('/api/prosesEditUser/{id_user}', [UserController::class, 'prosesEditUser'])->name('prosesEditUser.bloomy');
    Route::post('/api/updateUser/{id_user}', [UserController::class, 'updateUser'])->name('updateUser.bloomy');
    Route::get('/api/prosesHapusUser/{id_user}', [UserController::class, 'prosesHapusUser'])->name('prosesHapusUser.bloomy');

    Route::get('/api/tampilPelanggan', [PelangganController::class, 'tampilPelanggan'])->name('tampilPelanggan.admin.bloomy');
    Route::post('/api/prosesTambahPelanggan', [PelangganController::class, 'prosesTambahPelanggan'])->name('prosesTambahPelanggan.bloomy');
    Route::get('/api/prosesEditPelanggan/{id_user}', [PelangganController::class, 'prosesEditPelanggan'])->name('prosesEditPelanggan.bloomy');
    Route::post('/api/updatePelanggan/{id_user}', [PelangganController::class, 'updatePelanggan'])->name('updatePelanggan.bloomy');
    Route::get('/api/prosesHapusPelanggan/{id_user}', [PelangganController::class, 'prosesHapusPelanggan'])->name('prosesHapusPelanggan.bloomy');

    Route::get('/api/tampilPekerja', [PekerjaController::class, 'tampilPekerja'])->name('tampilPekerja.admin.bloomy');
    Route::post('/api/prosesTambahPekerja', [PekerjaController::class, 'prosesTambahPekerja'])->name('prosesTambahPekerja.bloomy');
    Route::get('/api/prosesEditPekerja/{id_pekerja}', [PekerjaController::class, 'prosesEditPekerja'])->name('prosesEditPekerja.bloomy');
    Route::post('/api/updatePekerja/{id_pekerja}', [PekerjaController::class, 'updatePekerja'])->name('updatePekerja.bloomy');
    Route::get('/api/prosesHapusPekerja/{id_pekerja}', [PekerjaController::class, 'prosesHapusPekerja'])->name('prosesHapusPekerja.bloomy');

    Route::get('/api/tampilTour', [TourController::class, 'tampilTour'])->name('tampilTour.admin.bloomy');
    Route::post('/api/prosesTambahTour', [TourController::class, 'prosesTambahTour'])->name('prosesTambahTour.bloomy');
    Route::get('/api/prosesEditTour/{id_tour}', [TourController::class, 'prosesEditTour'])->name('prosesEditTour.bloomy');
    Route::post('/api/updateTour/{id_tour}', [TourController::class, 'updateTour'])->name('updateTour.bloomy');
    Route::get('/api/prosesHapusTour/{id_tour}', [TourController::class, 'prosesHapusTour'])->name('prosesHapusTour.bloomy');

    Route::get('/api/tampilWisata', [WisataController::class, 'tampilWisata'])->name('tampilWisata.admin.bloomy');
    Route::post('/api/prosesTambahWisata', [WisataController::class, 'prosesTambahWisata'])->name('prosesTambahWisata.bloomy');
    Route::get('/api/prosesEditWisata/{id_wisata}', [WisataController::class, 'prosesEditWisata'])->name('prosesEditWisata.bloomy');
    Route::post('/api/updateWisata/{id_wisata}', [WisataController::class, 'updateWisata'])->name('updateWisata.bloomy');
    Route::get('/api/prosesHapusWisata/{id_user}', [WisataController::class, 'prosesHapusWisata'])->name('prosesHapusWisata.bloomy');

    Route::get('/api/tampilUMKM', [UMKMController::class, 'tampilUMKM'])->name('tampilUMKM.admin.bloomy');
    Route::post('/api/prosesTambahUMKM', [UMKMController::class, 'prosesTambahUMKM'])->name('prosesTambahUMKM.bloomy');
    Route::get('/api/prosesEditUMKM/{id_umkm}', [UMKMController::class, 'prosesEditUMKM'])->name('prosesEditUMKM.bloomy');
    Route::post('/api/updateUMKM/{id_umkm}', [UMKMController::class, 'updateUMKM'])->name('updateUMKM.bloomy');
    Route::get('/api/prosesHapusUMKM/{id_umkm}', [UMKMController::class, 'prosesHapusUMKM'])->name('prosesHapusUMKM.bloomy');

    Route::get('/api/tampilKuliner', [KulinerController::class, 'tampilKuliner'])->name('tampilKuliner.admin.bloomy');
    Route::post('/api/prosesTambahKuliner', [KulinerController::class, 'prosesTambahKuliner'])->name('prosesTambahKuliner.bloomy');
    Route::get('/api/prosesEditKuliner/{id_kuliner}', [KulinerController::class, 'prosesEditKuliner'])->name('prosesEditKuliner.bloomy');
    Route::post('/api/updateKuliner/{id_kuliner}', [KulinerController::class, 'updateKuliner'])->name('updateKuliner.bloomy');
    Route::get('/api/prosesHapusKuliner/{id_kuliner}', [KulinerController::class, 'prosesHapusKuliner'])->name('prosesHapusKuliner.bloomy');

    Route::get('/api/tampilBlog', [BlogController::class, 'tampilBlog'])->name('tampilBlog.admin.bloomy');
    Route::post('/api/prosesTambahBlog', [BlogController::class, 'prosesTambahBlog'])->name('prosesTambahBlog.bloomy');
    Route::get('/api/prosesEditBlogBlog/{id_blog}', [BlogController::class, 'prosesEditBlog'])->name('prosesEditBlogBlog.bloomy');
    Route::post('/api/updateBlogBlog/{id_blog}', [BlogController::class, 'updateBlog'])->name('updateBlogBlog.bloomy');
    Route::get('/api/prosesHapusBlog/{id_blog}', [BlogController::class, 'prosesHapusBlog'])->name('prosesHapusBlog.bloomy');

    Route::get('/api/getWisataBlog', [BlogController::class, 'getWisata'])->name('getWisataBlog.admin.bloomy');
    Route::get('/api/getUMKMBlog', [BlogController::class, 'getUMKM'])->name('getUMKMBlog.admin.bloomy');
    Route::get('/api/getKulinerBlog', [BlogController::class, 'getKuliner'])->name('getKulinerBlog.admin.bloomy');

    Route::get('/api/tampilTransaksi', [TransaksiController::class, 'tampilTransaksi'])->name('tampilTransaksi.admin.bloomy');
    Route::get('/getPaketWisataDetails/{id}', [TransaksiController::class, 'getPaketWisataDetails'])->name('getPaketWisataDetails');
    Route::post('/api/prosesTambahTransaksi', [TransaksiController::class, 'prosesTambahTransaksi'])->name('prosesTambahTransaksi.bloomy');

    Route::get('/api/tampilLaporanMingguan', [LaporanController::class, 'tampilLaporanMingguan'])->name('tampilLaporanMingguan.admin.bloomy');
    Route::get('/api/tampilLaporanBulanan', [LaporanController::class, 'tampilLaporanBulanan'])->name('tampilLaporanBulanan.admin.bloomy');
    Route::get('/api/tampilLaporanKategori_Wisata', [LaporanController::class, 'tampilLaporanKategori_Wisata'])->name('tampilLaporan.Kategori.Wisata.admin.bloomy');
    Route::get('/api/tampilRekapData', [LaporanController::class, 'tampilRekapData'])->name('tampilRekapData.admin.bloomy');
    Route::get('/api/tampilRekapTransaksi', [LaporanController::class, 'tampilRekapTransaksi'])->name('tampilRekapTransaksi.admin.bloomy');
});
// End Ajax Perintah Pemrosesan

// Start Pengambilan Dashboard Admin
Route::middleware(['isAdmin'])->group(function () {

    Route::get('/Dashboard/Admin', [AdminController::class, 'index'])->name('dashboard.bloomy');

    Route::get('/Dashboard/Admin/mProfile/{id_user}', [AdminController::class, 'mProfile'])->name('mProfile.bloomy');

    Route::get('/Dashboard/Admin/mUser', [AdminController::class, 'mUser'])->name('mUser.bloomy');
    Route::get('/Dashboard/Admin/mUser/Tambah', [AdminController::class, 'mUserTambah'])->name('mUserTambah.bloomy');
    Route::get('/Dashboard/Admin/mUser/Edit/{id_pekerja}', [AdminController::class, 'mUserEdit'])->name('mUserEdit.bloomy');

    Route::get('/Dashboard/Admin/mPelanggan', [AdminController::class, 'mPelanggan'])->name('mPelanggan.bloomy');
    Route::get('/Dashboard/Admin/mPelanggan/Tambah', [AdminController::class, 'mPelangganTambah'])->name('mPelangganTambah.bloomy');
    Route::get('/Dashboard/Admin/mPelanggan/Edit/{id_user}', [AdminController::class, 'mPelangganEdit'])->name('mPelangganEdit.bloomy');

    Route::get('/Dashboard/Admin/mPekerja', [AdminController::class, 'mPekerja'])->name('mPekerja.bloomy');
    Route::get('/Dashboard/Admin/mPekerja/Tambah', [AdminController::class, 'mPekerjaTambah'])->name('mPekerjaTambah.bloomy');
    Route::get('/Dashboard/Admin/mPekerja/Edit/{id_pekerja}', [AdminController::class, 'mPekerjaEdit'])->name('mPekerjaEdit.bloomy');

    Route::get('/Dashboard/Admin/mTour', [AdminController::class, 'mTour'])->name('mTour.bloomy');
    Route::get('/Dashboard/Admin/mTour/Tambah', [AdminController::class, 'mTourTambah'])->name('mTourTambah.bloomy');
    Route::get('/Dashboard/Admin/mTour/Edit/{id_tour}', [AdminController::class, 'mTourEdit'])->name('mTourEdit.bloomy');
    Route::get('/Dashboard/Admin/mTour/Detail/{id_tour}', [AdminController::class, 'mTourDetail'])->name('mTourDetail.bloomy');
    Route::get('/Dashboard/Admin/mTour/Detail/mCetakTourInvoice/{id_tour}', [AdminController::class, 'mCetakTourInvoice'])->name('mCetakTourInvoice.bloomy');

    Route::post('/json/dataPenginapan', [AdminController::class, 'jsonTour'])->name('jsonTour.bloomy');

    Route::get('/Dashboard/Admin/mWisata', [AdminController::class, 'mWisata'])->name('mWisata.bloomy');
    Route::get('/Dashboard/Admin/mWisata/Edit/{id_wisata}', [AdminController::class, 'mWisataEdit'])->name('mWisataEdit.bloomy');
    Route::get('/Dashboard/Admin/mWisata/Tambah', [AdminController::class, 'mWisataTambah'])->name('mWisataTambah.bloomy');
    Route::get('/Dashboard/Admin/mWisata/Detail/{id_wisata}', [AdminController::class, 'mWisataDetail'])->name('mWisataDetail.bloomy');

    Route::get('/Dashboard/Admin/mUMKM', [AdminController::class, 'mUMKM'])->name('mUMKM.bloomy');
    Route::get('/Dashboard/Admin/mUMKM/Edit/{id_wisata}', [AdminController::class, 'mUMKMEdit'])->name('mUMKMEdit.bloomy');
    Route::get('/Dashboard/Admin/mUMKM/Tambah', [AdminController::class, 'mUMKMTambah'])->name('mUMKMTambah.bloomy');
    Route::get('/Dashboard/Admin/mUMKM/Detail/{id_wisata}', [AdminController::class, 'mUMKMDetail'])->name('mUMKMDetail.bloomy');

    Route::get('/Dashboard/Admin/mKuliner', [AdminController::class, 'mKuliner'])->name('mKuliner.bloomy');
    Route::get('/Dashboard/Admin/mKuliner/Edit/{id_kuliner}', [AdminController::class, 'mKulinerEdit'])->name('mKulinerEdit.bloomy');
    Route::get('/Dashboard/Admin/mKuliner/Tambah', [AdminController::class, 'mKulinerTambah'])->name('mKulinerTambah.bloomy');
    Route::get('/Dashboard/Admin/mKuliner/Detail/{id_kuliner}', [AdminController::class, 'mKulinerDetail'])->name('mKulinerDetail.bloomy');

    Route::get('/Dashboard/Admin/mBlog', [AdminController::class, 'mBlog'])->name('mBlog.bloomy');
    Route::get('/Dashboard/Admin/mBlog/Tambah', [AdminController::class, 'mBlogTambah'])->name('mBlogTambah.bloomy');
    Route::get('/Dashboard/Admin/mBlog/Tambah/getUsahaKategori', [AdminController::class, 'getUsahaKategori'])->name('getUsahaKategori');
    Route::get('/Dashboard/Admin/mBlog/Edit/{id_blog}', [AdminController::class, 'mWisataBlogEdit'])->name('mWisataBlogEdit.bloomy');
    Route::get('/api/getDataByKategori/{id_kategori}', [AdminController::class, 'getDataByKategori'])->name('getDataByKategori.bloomy');
    Route::get('/Dashboard/Admin/mBlog/Detail/{id_blog}', [AdminController::class, 'mBlogDetail'])->name('mBlogDetail.bloomy');

    Route::get('/Dashboard/Admin/mTransaksi', [AdminController::class, 'mTransaksi'])->name('mTransaksi.bloomy');
    Route::get('/Dashboard/Admin/mTransaksi/Tambah', [AdminController::class, 'mTransaksiTambah'])->name('mTransaksiTambah.bloomy');

    Route::get('/Dashboard/Admin/mKalkulasi', [AdminController::class, 'mKalkulasi'])->name('mKalkulasi.bloomy');
    // Route::get('/getData/Statistika', [AdminController::class, 'getData'])->name('getData.bloomy');
    // Route::post('/generate-statistics', [AdminController::class, 'generateStatistics'])->name('generate.statistics');
    // Route::get('/generate-statistics/lihat', [AdminController::class, 'generateStatistics_lihat'])->name('generatelihat.statistics');

    Route::get('/Dashboard/Admin/mLaporanMingguan', [AdminController::class, 'mLaporanMingguan'])->name('mLaporanMingguan.bloomy');
    Route::get('/Dashboard/Admin/mLaporanBulanan', [AdminController::class, 'mLaporanBulanan'])->name('mLaporanBulanan.bloomy');
    Route::get('/Dashboard/Admin/mLaporanKategoriWisata', [AdminController::class, 'mLaporanKategoriWisata'])->name('mLaporan.Kategori.Wisata.bloomy');
    Route::get('/Dashboard/Admin/mRekapData', [AdminController::class, 'mRekapData'])->name('mRekapData.bloomy');
});
// End Pengambilan Dashboard 
// RUANG LINGKUP ADMIN

Route::get('/api/user/prosesTampilTour', [HomeController::class, 'userTampilTour'])->name('TampilTour.user.bloomy');
Route::get('/api/user/prosesTampilBlog/Wisata', [UserBlogController::class, 'userTampilBlogWisata'])->name('TampilBlogWisata.user.bloomy');
Route::get('/api/user/prosesTampilBlog/UMKM', [UserBlogController::class, 'userTampilBlogUMKM'])->name('TampilBlogUMKM.user.bloomy');
Route::get('/api/user/prosesTampilBlog/Kuliner', [UserBlogController::class, 'userTampilBlogKuliner'])->name('TampilBlogKuliner.user.bloomy');

Route::post('/api/user/prosesUserLogin/Login', [UserLoginController::class, 'prosesUserLogin'])->name('prosesUserLogin.user.bloomy');
Route::post('/api/user/prosesUserRegistrasi/Registrasi', [UserLoginController::class, 'prosesUserRegistrasi'])->name('prosesUserRegistrasi.user.bloomy');
Route::post('/api/user/prosesUserLogout/Logout', [UserLoginController::class, 'prosesUserLogout'])->name('prosesUserLogout.user.bloomy');

// RUANG LINGKUP USER 
Route::get('/', [HomeController::class, 'index'])->name('home.bloomy'); //success
Route::get('/Pembayaran/Bloomy', [PembayaranController::class, 'index'])->name('pembayaran'); //success
Route::get('/Success/Bloomy', [SuccessController::class, 'index'])->name('successPay'); //success

Route::get('/blog-bloomy', [UserBlogController::class, 'index'])->name('blog.bloomy'); //success
Route::get('/bantuan-bloomy', [BantuanController::class, 'index'])->name('bantuan.bloomy'); //success
Route::get('/contact-person', [ContactController::class, 'index'])->name('contactPerson'); //success
Route::get('/profile-bloomy', [ProfileController::class, 'index'])->name('profile'); //success
Route::get('/halaman-blog-bloomy', [HalblogController::class, 'index'])->name('blog.halBlog'); //success

Route::get('/Registrasi/Bloomy', [UserLoginController::class, 'registrasi'])->name('registrasi.bloomy'); //success
Route::get('/Login/Bloomy', [UserLoginController::class, 'index'])->name('login.bloomy'); //success
Route::get('/RegistToGuide/Bloomy', [RegistToguideController::class, 'index'])->name('registToguide'); //success
// RUANG LINGKUP USER

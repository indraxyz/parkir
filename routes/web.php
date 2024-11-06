<?php

use Illuminate\Support\Facades\Route;

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


// Login
Route::get('/', 'AdminC@Login');
Route::post('admin/login', 'AdminC@LoginCek');
Route::get('admin/logout', 'AdminC@Logout');

Route::group(['middleware' => 'cekAdmin'], function () {
    Route::get('admin/dashboard', 'AdminC@Dashboard');

    // master
    Route::get('admin/master/tarif', 'AdminC@MasterTarif');
    Route::get('admin/master/tarif-add', function ()
    {
        return view('admin.tarif.add');
    });
    Route::post('admin/master/tarif-simpan', 'AdminC@SimpanTarif');
    Route::get('admin/master/tarif-edit/{id}', 'AdminC@EditTarif');
    Route::post('admin/master/tarif-update', 'AdminC@UpdateTarif');
    Route::get('admin/master/tarif-hapus/{id}', 'AdminC@HapusTarif');

    Route::get('admin/master/blok', 'AdminC@MasterBlok');
    Route::get('admin/master/blok-add', function ()
    {
        return view('admin.blok.add');
    });
    Route::post('admin/master/blok-simpan', 'AdminC@SimpanBlok');
    Route::get('admin/master/blok-edit/{id}', 'AdminC@EditBlok');
    Route::post('admin/master/blok-update', 'AdminC@UpdateBlok');
    Route::get('admin/master/blok-hapus/{id}', 'AdminC@HapusBlok');
    Route::get('admin/master/blok-cari', 'AdminC@CariBlok');

    Route::get('admin/master/lantai', 'AdminC@MasterLantai');
    Route::get('admin/master/lantai-add', function ()
    {
        return view('admin.lantai.add');
    });
    Route::post('admin/master/lantai-simpan', 'AdminC@SimpanLantai');
    Route::get('admin/master/lantai-edit/{id}', 'AdminC@EditLantai');
    Route::post('admin/master/lantai-update', 'AdminC@UpdateLantai');
    Route::get('admin/master/lantai-hapus/{id}', 'AdminC@HapusLantai');
    Route::get('admin/master/lantai-cari', 'AdminC@CariLantai');

    Route::get('admin/master/lokasi-parkir', 'AdminC@MasterLokasi');
    Route::get('admin/master/lokasi-add', 'AdminC@TambahLokasi');
    Route::post('admin/master/lokasi-simpan', 'AdminC@SimpanLokasi');
    Route::get('admin/master/lokasi-edit/{id}', 'AdminC@EditLokasi');
    Route::post('admin/master/lokasi-update', 'AdminC@UpdateLokasi');
    Route::get('admin/master/lokasi-hapus/{id}', 'AdminC@HapusLokasi');
    Route::get('admin/master/lokasi-cari', 'AdminC@CariLokasi');

    Route::get('admin/master/petugas', 'AdminC@MasterPetugas');
    Route::get('admin/master/petugas-add', function ()
    {
        return view('admin.petugas.add');
    });
    Route::post('admin/master/petugas-simpan', 'AdminC@SimpanPetugas');
    Route::get('admin/master/petugas-edit/{id}', 'AdminC@EditPetugas');
    Route::post('admin/master/petugas-update', 'AdminC@UpdatePetugas');
    Route::get('admin/master/petugas-hapus/{id}', 'AdminC@HapusPetugas');
    Route::get('admin/master/petugas-cari', 'AdminC@CariPetugas');
    Route::get('admin/master/petugas-detail/{id}', 'AdminC@DetailPetugas');

    // Parkir Masuk
    Route::get('admin/parkir/form-masuk', 'AdminC@FormMasuk');
    Route::post('admin/parkir/masuk-simpan', 'AdminC@SimpanMasuk');
    Route::get('admin/parkir/kelola-masuk', 'AdminC@KelolaMasuk');
    Route::get('admin/parkir/masuk-struk/{id}', 'AdminC@StrukMasuk');
    Route::get('admin/parkir/masuk-cari', 'AdminC@CariMasuk');
    Route::get('admin/parkir/masuk-hapus/{id}', 'AdminC@HapusMasuk');
    Route::get('admin/parkir/masuk-edit/{id}', 'AdminC@EditMasuk');
    Route::post('admin/parkir/masuk-update', 'AdminC@UpdateMasuk');
    Route::get('admin/parkir/masuk-cetak/{id}', 'AdminC@CetakMasuk');

    // ---

    // Parkir Keluar
    Route::get('admin/parkir/kelola-keluar', 'AdminC@KelolaKeluar');
    Route::get('admin/parkir/keluar-form', 'AdminC@FormKeluar');
    Route::post('admin/parkir/keluar-struk', 'AdminC@StrukKeluar');
    Route::get('admin/parkir/keluar-struk/{id}', 'AdminC@LihatStrukKeluar');
    Route::get('admin/parkir/keluar-bayar/{id}', 'AdminC@BayarKeluar');
    Route::get('admin/parkir/keluar-cetak/{id}', 'AdminC@CetakKeluar');
    Route::get('admin/parkir/keluar-cari', 'AdminC@CariKeluar');
    Route::get('admin/parkir/keluar-hapus/{id}', 'AdminC@HapusKeluar');

    // Laporan Parkir
    Route::get('admin/laporan', 'AdminC@KelolaLaporan');
    Route::post('admin/laporan-filter', 'AdminC@FilterLaporan');
    Route::get('admin/laporan-cetak/{awal}/{akhir}/{key?}', 'AdminC@CetakLaporan');

    // settings
    Route::get('admin/akun-saya', 'AdminC@AkunSaya');
    Route::get('admin/akun-edit/{id}', 'AdminC@AkunEdit');
    Route::post('admin/akun-update', 'AdminC@AkunUpdate');
    Route::get('admin/akun-editpassword/{id}', 'AdminC@AkunEditPassword');
    Route::post('admin/akun-updatepassword', 'AdminC@AkunUpdatePassword');
});
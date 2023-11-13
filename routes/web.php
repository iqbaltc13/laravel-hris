<?php

use App\Http\Controllers\DinasLuarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AutoShiftController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PajakController;
use App\Http\Controllers\RekapDataController;
use App\Http\Controllers\StatusPtkpController;
use App\Http\Controllers\TunjanganController;

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

Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::get('/presensi', [AuthController::class, 'presensi'])->middleware('guest');
Route::get('/presensi-pulang', [AuthController::class, 'presensiPulang'])->middleware('guest');
Route::post('/presensi/store', [AuthController::class, 'presensiStore'])->middleware('guest');
Route::post('/presensi-pulang/store', [AuthController::class, 'presensiPulangStore'])->middleware('guest');
Route::get('/ajaxGetNeural', [AuthController::class, 'ajaxGetNeural'])->middleware('guest');
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register-proses', [AuthController::class, 'registerProses'])->middleware('guest');
Route::post('/login-proses', [AuthController::class, 'loginProses'])->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/pegawai', [KaryawanController::class, 'index'])->middleware('admin');
Route::get('/pegawai/tambah-pegawai', [KaryawanController::class, 'tambahKaryawan'])->middleware('admin');
Route::post('/pegawai/tambah-pegawai-proses', [KaryawanController::class, 'tambahKaryawanProses'])->middleware('admin');
Route::post('/pegawai/face/ajaxPhoto', [KaryawanController::class, 'ajaxPhoto'])->middleware('admin');
Route::post('/pegawai/face/ajaxDescrip', [KaryawanController::class, 'ajaxDescrip'])->middleware('admin');
Route::post('/pegawai/import', [KaryawanController::class, 'importUsers'])->middleware('admin');
Route::get('/pegawai/detail/{id}', [KaryawanController::class, 'detail'])->middleware('admin');
Route::get('/pegawai/face/{id}', [KaryawanController::class, 'face'])->middleware('admin');
Route::put('/pegawai/proses-edit/{id}', [KaryawanController::class, 'editKaryawanProses'])->middleware('admin');
Route::delete('/pegawai/delete/{id}', [KaryawanController::class, 'deleteKaryawan'])->middleware('admin');
Route::get('/pegawai/edit-password/{id}', [KaryawanController::class, 'editPassword'])->middleware('admin');
Route::put('/pegawai/edit-password-proses/{id}', [KaryawanController::class, 'editPasswordProses'])->middleware('admin');
Route::resource('/shift', ShiftController::class)->middleware('admin');

Route::get('/pegawai/shift/{id}', [KaryawanController::class, 'shift'])->middleware('admin');
Route::get('/pegawai/dinas-luar/{id}', [KaryawanController::class, 'dinasLuar'])->middleware('admin');

Route::post('/pegawai/shift/proses-tambah-shift', [KaryawanController::class, 'prosesTambahShift'])->middleware('admin');
Route::post('/pegawai/dinas-luar/proses-tambah-shift', [KaryawanController::class, 'prosesTambahDinas'])->middleware('admin');

Route::delete('/pegawai/delete-shift/{id}', [KaryawanController::class, 'deleteShift'])->middleware('admin');
Route::delete('/pegawai/delete-dinas/{id}', [KaryawanController::class, 'deleteDinas'])->middleware('admin');

Route::get('/pegawai/edit-shift/{id}', [KaryawanController::class, 'editShift'])->middleware('admin');
Route::get('/pegawai/edit-dinas/{id}', [KaryawanController::class, 'editDinas'])->middleware('admin');

Route::put('/pegawai/proses-edit-shift/{id}', [KaryawanController::class, 'prosesEditShift'])->middleware('auth');
Route::put('/pegawai/proses-edit-dinas/{id}', [KaryawanController::class, 'prosesEditDinas'])->middleware('auth');

Route::get('/absen', [AbsenController::class, 'index'])->middleware('auth');
Route::get('/dinas-luar', [DinasLuarController::class, 'index'])->middleware('auth');

Route::get('/my-location', [AbsenController::class, 'myLocation'])->middleware('auth');

Route::put('/absen/masuk/{id}', [AbsenController::class, 'absenMasuk'])->middleware('auth');
Route::put('/dinas-luar/masuk/{id}', [DinasLuarController::class, 'absenMasukDinas'])->middleware('auth');

Route::put('/absen/pulang/{id}', [AbsenController::class, 'absenPulang'])->middleware('auth');
Route::put('/dinas-luar/pulang/{id}', [DinasLuarController::class, 'absenPulangDinas'])->middleware('auth');

Route::get('/data-absen', [AbsenController::class, 'dataAbsen'])->middleware('admin');
Route::get('/data-dinas-luar', [DinasLuarController::class, 'dataAbsenDinas'])->middleware('admin');

Route::get('/data-absen/{id}/edit-masuk', [AbsenController::class, 'editMasuk'])->middleware('admin');
Route::get('/maps/{lat}/{long}/{userid}', [AbsenController::class, 'maps'])->middleware('auth');
Route::put('/data-absen/{id}/proses-edit-masuk', [AbsenController::class, 'prosesEditMasuk'])->middleware('admin');
Route::get('/data-absen/{id}/edit-pulang', [AbsenController::class, 'editPulang'])->middleware('admin');
Route::put('/data-absen/{id}/proses-edit-pulang', [AbsenController::class, 'prosesEditPulang'])->middleware('admin');
Route::delete('/data-absen/{id}/delete', [AbsenController::class, 'deleteAdmin'])->middleware('admin');

Route::get('/my-absen', [AbsenController::class, 'myAbsen'])->middleware('auth');
Route::get('/my-dinas-luar', [DinasLuarController::class, 'myDinasLuar'])->middleware('auth');

Route::get('/lembur', [LemburController::class, 'index'])->middleware('auth');
Route::post('/lembur/masuk', [LemburController::class, 'masuk'])->middleware('auth');
Route::put('/lembur/pulang/{id}', [LemburController::class, 'pulang'])->middleware('auth');
Route::get('/data-lembur', [LemburController::class, 'dataLembur'])->middleware('admin');
Route::post('/data-lembur/approval/{id}', [LemburController::class, 'approval'])->middleware('admin');
Route::get('/my-lembur', [LemburController::class, 'myLembur'])->middleware('auth');

Route::get('/rekap-data', [RekapDataController::class, 'index'])->middleware('admin');
Route::get('/cuti', [CutiController::class, 'index'])->middleware('auth');
Route::post('/cuti/tambah', [CutiController::class, 'tambah'])->middleware('auth');
Route::delete('/cuti/delete/{id}', [CutiController::class, 'delete'])->middleware('auth');
Route::get('/cuti/edit/{id}', [CutiController::class, 'edit'])->middleware('auth');
Route::put('/cuti/proses-edit/{id}', [CutiController::class, 'editProses'])->middleware('auth');
Route::get('/data-cuti', [CutiController::class, 'dataCuti'])->middleware('admin');
Route::get('/data-cuti/tambah', [CutiController::class, 'tambahAdmin'])->middleware('admin');
Route::post('/data-cuti/getuserid', [CutiController::class, 'getUserId'])->middleware('admin');
Route::post('/data-cuti/proses-tambah', [CutiController::class, 'tambahAdminProses'])->middleware('admin');
Route::delete('/data-cuti/delete/{id}', [CutiController::class, 'deleteAdmin'])->middleware('admin');
Route::get('/data-cuti/edit/{id}', [CutiController::class, 'editAdmin'])->middleware('admin');
Route::put('/data-cuti/edit-proses/{id}', [CutiController::class, 'editAdminProses'])->middleware('admin');
Route::get('/my-profile', [KaryawanController::class, 'myProfile'])->middleware('auth');
Route::put('/my-profile/update/{id}', [KaryawanController::class, 'myProfileUpdate'])->middleware('auth');
Route::get('/my-profile/edit-password', [KaryawanController::class, 'editPassMyProfile'])->middleware('auth');
Route::put('/my-profile/edit-password-proses/{id}', [KaryawanController::class, 'editPassMyProfileProses'])->middleware('auth');

Route::get('/lokasi-kantor', [LokasiController::class, 'index'])->middleware('admin');
Route::get('/lokasi-kantor/tambah', [LokasiController::class, 'tambahLokasi'])->middleware('admin');
Route::post('/lokasi-kantor/tambah-proses', [LokasiController::class, 'prosesTambahLokasi'])->middleware('admin');
Route::get('/lokasi-kantor/edit/{id}', [LokasiController::class, 'editLokasi'])->middleware('admin');
Route::put('/lokasi-kantor/update/{id}', [LokasiController::class, 'updateLokasi'])->middleware('admin');
Route::put('/lokasi-kantor/radius/{id}', [LokasiController::class, 'updateRadiusLokasi'])->middleware('admin');
Route::delete('/lokasi-kantor/delete/{id}', [LokasiController::class, 'deleteLokasi'])->middleware('admin');
Route::get('/lokasi-kantor/pending-location', [LokasiController::class, 'pendingLocation'])->middleware('admin');
Route::put('/lokasi-kantor/update-pending-location/{id}', [LokasiController::class, 'UpdatePendingLocation'])->middleware('admin');

Route::get('/request-location', [LokasiController::class, 'requestLocation'])->middleware('auth');
Route::get('/request-location/tambah', [LokasiController::class, 'tambahRequestLocation'])->middleware('auth');
Route::post('/request-location/tambah-proses', [LokasiController::class, 'prosesTambahRequestLocation'])->middleware('auth');
Route::get('/request-location/edit/{id}', [LokasiController::class, 'editRequestLocation'])->middleware('auth');
Route::put('/request-location/update/{id}', [LokasiController::class, 'updateRequestLocation'])->middleware('auth');
Route::put('/request-location/radius/{id}', [LokasiController::class, 'updateRadiusRequestLocation'])->middleware('auth');
Route::delete('/request-location/delete/{id}', [LokasiController::class, 'deleteRequestLocation'])->middleware('auth');

Route::get('/reset-cuti', [KaryawanController::class, 'resetCuti'])->middleware('admin');
Route::put('/reset-cuti/{id}', [KaryawanController::class, 'resetCutiProses'])->middleware('admin');

Route::get('/jabatan', [JabatanController::class, 'index'])->middleware('admin');
Route::get('/jabatan/create', [JabatanController::class, 'create'])->middleware('admin');
Route::post('/jabatan/insert', [JabatanController::class, 'insert'])->middleware('admin');
Route::get('/jabatan/edit/{id}', [JabatanController::class, 'edit'])->middleware('admin');
Route::put('/jabatan/update/{id}', [JabatanController::class, 'update'])->middleware('admin');
Route::delete('/jabatan/delete/{id}', [JabatanController::class, 'delete'])->middleware('admin');

Route::get('/golongan', [GolonganController::class, 'index'])->middleware('admin');
Route::get('/golongan/tambah', [GolonganController::class, 'tambah'])->middleware('admin');
Route::post('/golongan/tambah-proses', [GolonganController::class, 'tambahProses'])->middleware('admin');
Route::get('/golongan/edit/{id}', [GolonganController::class, 'edit'])->middleware('admin');
Route::put('/golongan/update/{id}', [GolonganController::class, 'update'])->middleware('admin');
Route::delete('/golongan/delete/{id}', [GolonganController::class, 'delete'])->middleware('admin');

Route::get('/dokumen', [DokumenController::class, 'index'])->middleware('admin');
Route::get('/dokumen/tambah', [DokumenController::class, 'tambah'])->middleware('admin');
Route::post('/dokumen/tambah-proses', [DokumenController::class, 'tambahProses'])->middleware('admin');
Route::get('/dokumen/edit/{id}', [DokumenController::class, 'edit'])->middleware('admin');
Route::put('/dokumen/edit-proses/{id}', [DokumenController::class, 'editProses'])->middleware('admin');
Route::delete('/dokumen/delete/{id}', [DokumenController::class, 'delete'])->middleware('admin');
Route::get('/my-dokumen', [DokumenController::class, 'myDokumen'])->middleware('auth');
Route::get('/my-dokumen/tambah', [DokumenController::class, 'myDokumenTambah'])->middleware('auth');
Route::post('/my-dokumen/tambah-proses', [DokumenController::class, 'myDokumenTambahProses'])->middleware('auth');
Route::get('/my-dokumen/edit/{id}', [DokumenController::class, 'myDokumenEdit'])->middleware('auth');
Route::put('/my-dokumen/edit-proses/{id}', [DokumenController::class, 'myDokumenEditProses'])->middleware('auth');
Route::delete('/my-dokumen/delete/{id}', [DokumenController::class, 'myDokumenDelete'])->middleware('auth');

Route::get('/auto-shift', [AutoShiftController::class, 'index'])->middleware('admin');
Route::get('/auto-shift/tambah', [AutoShiftController::class, 'tambah'])->middleware('admin');
Route::post('/auto-shift/store', [AutoShiftController::class, 'store'])->middleware('admin');
Route::get('/auto-shift/{id}/edit', [AutoShiftController::class, 'edit'])->middleware('admin');
Route::put('/auto-shift/update/{id}', [AutoShiftController::class, 'update'])->middleware('admin');
Route::delete('/auto-shift/delete/{id}', [AutoShiftController::class, 'delete'])->middleware('admin');

Route::get('/file', [FileController::class, 'index'])->middleware('admin');
Route::get('/file/upload', [FileController::class, 'upload'])->middleware('admin');
Route::post('/file/upload-proses', [FileController::class, 'uploadProses'])->middleware('admin');
Route::get('/file/edit/{id}', [FileController::class, 'edit'])->middleware('admin');
Route::put('/file/update/{id}', [FileController::class, 'update'])->middleware('admin');
Route::delete('/file/delete/{id}', [FileController::class, 'delete'])->middleware('admin');

Route::get('/my-file', [FileController::class, 'myFile'])->middleware('auth');
Route::get('/my-file/upload', [FileController::class, 'myFileUpload'])->middleware('auth');
Route::post('/my-file/upload-proses', [FileController::class, 'myFileUploadProses'])->middleware('auth');
Route::get('/my-file/edit/{id}', [FileController::class, 'myFileEdit'])->middleware('auth');
Route::put('/my-file/update/{id}', [FileController::class, 'myFileUpdate'])->middleware('auth');
Route::delete('/my-file/delete/{id}', [FileController::class, 'myFileDelete'])->middleware('auth');

Route::get('/tunjangan', [TunjanganController::class, 'index'])->middleware('admin');
Route::get('/tunjangan/tambah', [TunjanganController::class, 'tambah'])->middleware('admin');
Route::post('/tunjangan/tambah-proses', [TunjanganController::class, 'tambahProses'])->middleware('admin');
Route::get('/tunjangan/{id}/edit', [TunjanganController::class, 'edit'])->middleware('admin');
Route::put('/tunjangan/{id}/update', [TunjanganController::class, 'update'])->middleware('admin');
Route::delete('/tunjangan/{id}/delete', [TunjanganController::class, 'delete'])->middleware('admin');

Route::get('/payroll', [PayrollController::class, 'index'])->middleware('admin');
Route::get('/payroll/tambah', [PayrollController::class, 'tambah'])->middleware('admin');
Route::post('/payroll/tambah-proses', [PayrollController::class, 'tambahProses'])->middleware('admin');
Route::get('/payroll/{id}/edit', [PayrollController::class, 'edit'])->middleware('admin');
Route::get('/payroll/{id}/download', [PayrollController::class, 'download'])->middleware('admin');
Route::put('/payroll/{id}/update', [PayrollController::class, 'update'])->middleware('admin');
Route::delete('/payroll/{id}/delete', [PayrollController::class, 'delete'])->middleware('admin');

Route::get('/status-ptkp', [StatusPtkpController::class, 'index'])->middleware('admin');
Route::get('/status-ptkp/tambah', [StatusPtkpController::class, 'tambah'])->middleware('admin');
Route::post('/status-ptkp/tambah-proses', [StatusPtkpController::class, 'tambahProses'])->middleware('admin');
Route::get('/status-ptkp/{id}/edit', [StatusPtkpController::class, 'edit'])->middleware('admin');
Route::put('/status-ptkp/{id}/update', [StatusPtkpController::class, 'update'])->middleware('admin');
Route::delete('/status-ptkp/{id}/delete', [StatusPtkpController::class, 'delete'])->middleware('admin');

Route::get('/pajak-pph21', [PajakController::class, 'index'])->middleware('admin');
Route::get('/pajak-pph21/tambah', [PajakController::class, 'tambah'])->middleware('admin');
Route::post('/pajak-pph21/tambah-proses', [PajakController::class, 'tambahProses'])->middleware('admin');
Route::get('/pajak-pph21/{id}/edit', [PajakController::class, 'edit'])->middleware('admin');
Route::put('/pajak-pph21/{id}/update', [PajakController::class, 'update'])->middleware('admin');
Route::delete('/pajak-pph21/{id}/delete', [PajakController::class, 'delete'])->middleware('admin');

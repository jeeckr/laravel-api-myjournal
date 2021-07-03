<?php

use App\Http\Controllers\API\JurnalController;
use App\Http\Controllers\API\LaporanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::resource('/jurnal', JurnalController::class)->names('jurnal');
// Route::resource('/laporan', LaporanController::class)->names('laporan');
Route::get('/jurnal', [JurnalController::class, 'index'])->name('jurnal.index');
Route::post('/jurnal', [JurnalController::class, 'store'])->name('jurnal.store');
Route::get('/jurnal/{id_jurnal}', [JurnalController::class, 'show'])->name('jurnal.show');
Route::put('/jurnal/{id_jurnal}', [JurnalController::class, 'update'])->name('jurnal.update');
Route::delete('/jurnal/{id_jurnal}', [JurnalController::class, 'destroy'])->name('jurnal.destroy');
Route::get('/jurnal/{id_jurnal}/pdf', [JurnalController::class, 'generate_pdf'])->name('jurnal.pdf');
Route::get('/pdf_view', function () {
    return view('pdf_view');
})->name('pdf_view');

// Laporan
Route::get('/jurnal/{id_jurnal}/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/get/{tanggal}', [LaporanController::class, 'get_laporan_by_date'])->name('laporan.by_date');
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
Route::get('/laporan/{id_laporan}', [LaporanController::class, 'show'])->name('laporan.show');
Route::put('/laporan/{id_laporan}', [LaporanController::class, 'update'])->name('laporan.update');
Route::delete('/laporan/{id_laporan}', [LaporanController::class, 'destroy'])->name('laporan.destroy');

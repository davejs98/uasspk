<?php

use App\Http\Controllers\CalonKaryawanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
    /**
     * Kriteria Section.
     */
Route::get('/kriteria', [KriteriaController::class, 'kriteria'])->middleware(['auth'])->name('kriteria');
Route::get('/addKriteria', [KriteriaController::class, 'addKriteria'])->middleware(['auth'])->name('addKriteria');
Route::post('/saveKriteria', [KriteriaController::class, 'saveKriteria'])->middleware(['auth'])->name('saveKriteria');
Route::post('/saveEditedKriteria', [KriteriaController::class, 'saveEditedKriteria'])->middleware(['auth'])->name('saveEditedKriteria');
Route::get('/deleteKriteria/{idKriteria}', [KriteriaController::class, 'deleteKriteria'])->middleware(['auth'])->name('deleteKriteria');
Route::get('/editKriteria/{idKriteria}', [KriteriaController::class, 'editKriteria'])->middleware(['auth'])->name('editKriteria');

    /**
     * Calon Karyawan Section.
     */
Route::get('/calonkaryawan', [CalonKaryawanController::class, 'calonkaryawan'])->middleware(['auth'])->name('calonkaryawan');
Route::get('/addCalonKaryawan', [CalonKaryawanController::class, 'addCalonKaryawan'])->middleware(['auth'])->name('addCalonKaryawan');
Route::post('/saveCalonKaryawan', [CalonKaryawanController::class, 'saveCalonKaryawan'])->middleware(['auth'])->name('saveCalonKaryawan');
Route::post('/saveEditedCalonKaryawan', [CalonKaryawanController::class, 'saveEditedCalonKaryawan'])->middleware(['auth'])->name('saveEditedCalonKaryawan');
Route::get('/deleteCalonKaryawan/{idCalonKaryawan}', [CalonKaryawanController::class, 'deleteCalonKaryawan'])->middleware(['auth'])->name('deleteCalonKaryawan');
Route::get('/editCalonKaryawan/{idCalonKaryawan}', [CalonKaryawanController::class, 'editCalonKaryawan'])->middleware(['auth'])->name('editCalonKaryawan');



require __DIR__.'/auth.php';

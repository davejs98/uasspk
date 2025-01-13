<?php

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
Route::get('/kriteria', [KriteriaController::class, 'kriteria'])->middleware(['auth'])->name('kriteria');
Route::get('/addKriteria', [KriteriaController::class, 'addKriteria'])->middleware(['auth'])->name('addKriteria');
Route::post('/saveKriteria', [KriteriaController::class, 'saveKriteria'])->middleware(['auth'])->name('saveKriteria');
Route::post('/saveEditedKriteria', [KriteriaController::class, 'saveEditedKriteria'])->middleware(['auth'])->name('saveEditedKriteria');
Route::get('/deleteKriteria/{idKriteria}', [KriteriaController::class, 'deleteKriteria'])->middleware(['auth'])->name('deleteKriteria');
Route::get('/editKriteria/{idKriteria}', [KriteriaController::class, 'editKriteria'])->middleware(['auth'])->name('editKriteria');





require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ImportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
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

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/import', [ImportController::class, 'index'])->name('import.view');
    Route::post('/import', [ImportController::class, 'importTest'])->name('import.post');
    Route::get('/report/data', [ReportController::class, 'rawData'])->name('report.raw');
    Route::get('/report/alert', [ReportController::class, 'viewAlert'])->name('report.alert');
    Route::get('/report/run-job', [ReportController::class, 'runJobSynthesize'])->name('report.runJob');
    Route::get('/report/alert/edit/{METER_ID}', [ReportController::class, 'edit'])->name('report.edit');
    Route::get('/report/alert/controlled', [ReportController::class, 'controlledAlert'])->name('report.controlledAlert');
});

require __DIR__.'/auth.php';

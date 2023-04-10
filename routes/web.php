<?php

use App\Http\Controllers\ImportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExportUserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportSearchController;
use GuzzleHttp\Middleware;

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

// Route::get('/', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::get('/', [DashboardController::class, 'viewDashboard'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/import', [ImportController::class, 'index'])->name('import.view');
    Route::post('/import', [ImportController::class, 'importTest'])->name('import.post');
    
    Route::get('/report/data', [ReportController::class, 'rawData'])->name('report.raw');
    Route::get('/report/data/search', [ReportController::class, 'search'])->name('report.raw.search');
    Route::get('/report/alert', [ReportController::class, 'viewAlert'])->name('report.alert');
    Route::get('/export', [ExportUserController::class, 'export'])->name('export');
    Route::get('/report/run-job', [ReportController::class, 'runJobSynthesize'])->name('report.runJob');
    Route::get('/report/edit', [ReportController::class, 'viewEdit'])->name('report.edit');      
    Route::post('/report/update/{meter_no}', [ReportController::class, 'update'])->name('report.update');    
    
    Route::get('/admin', [AdminController::class, 'viewAdmin'])->middleware('isAdmin')->name('admin');
    Route::get('/admin/insert', [AdminController::class, 'viewInsert'])->name('admin.insertUser');
    Route::patch('/admin', [AdminController::class, 'updateUser'])->name('admin.update');
    Route::put('/admin', [AdminController::class, 'insertUser'])->name('admin.insert');
    Route::delete('/admin', [AdminController::class, 'deleteUser'])->name('admin.delete');
});

require __DIR__.'/auth.php';

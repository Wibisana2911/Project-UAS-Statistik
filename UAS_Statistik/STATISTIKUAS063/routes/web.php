<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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
    return view('statistika.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 
Route::get('/data',  [AdminController::class, 'index'] , function () {
    return view('statistika.home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/datacreate',  [AdminController::class, 'data'] , function () {
    return view('statistika.data');
})->middleware(['auth', 'verified'])->name('datacreate');
Route::post('/dataupdate',  [AdminController::class, 'data'] , function () {
    return view('statistika.data');
})->middleware(['auth', 'verified'])->name('dataupdate');

Route::get('admin/{NIM}/edit',  [AdminController::class, 'edit'] , function () {
    return view('edit');
})->middleware(['auth', 'verified'])->name('edit');

Route::put('/admin/{NIM}',  [AdminController::class, 'update']);
Route::delete('/admin/{NIM}',  [AdminController::class, 'destroy']);

Route::get('/create',  [AdminController::class, 'create'] , function () {
    return view('statistika.create');
})->middleware(['auth', 'verified'])->name('create');

Route::get('/printdatapdf', [AdminController::class, 'printDataPDF']) -> name('printdatapdf');
Route::get('/printdataexcel', [AdminController::class, 'printDataExcel']) -> name('printdataexcel');
Route::post('/importdataexcel', [AdminController::class, 'importDataExcel']) -> name('importdataexcel');
Route::get('/frequency', [AdminController::class, 'frequency']) -> name('frequency');




// require __DIR__.'/auth.php';

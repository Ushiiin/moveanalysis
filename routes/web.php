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

Route::get('/', function () {
    return view('welcome');
});

// Introのためのトップページ
use App\Http\Controllers\IntroPageController;
Route::get('/intro', [IntroPageController::class, 'index'])->name('intro');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Uploadのためのページ
use App\Http\Controllers\UploadController;
Route::get('/upload', [UploadController::class, 'index'])->middleware(['auth'])->name('upload');
Route::post('/upload/action', [UploadController::class, "action"])->name('upload.action');

// Viewのためのトップページ
use App\Http\Controllers\ViewController;
Route::get('/view', [ViewController::class, 'index'])->middleware(['auth'])->name('view');
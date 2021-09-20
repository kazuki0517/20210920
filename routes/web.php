<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm.post');
Route::get('/confirm', [ContactController::class, 'check'])->name('show.get');
Route::get('/form/confirm', [ContactController::class, 'show'])->name('confirm.get');
Route::post('/form/confirm', [ContactController::class, 'store'])->name('show.post');
Route::get('/form/thanks', [ContactController::class, 'complete'])->name('thanks.get');

Route::get('/management', [ContactController::class, 'overview'])->name('management.get');
Route::delete('/management/del/{id}', [ContactController::class, 'destroy'])->name('management.delete');
Route::post('/management/find', [ContactController::class, 'find'])->name('management.find');



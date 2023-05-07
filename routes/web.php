<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
// Route::get('/contact/complete', [ContactController::class, 'complete'])->name('contact.complete');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/search', [AdminController::class, 'search'])->name('admin.search');
Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');

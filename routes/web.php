<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AksessGuruController;



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

Route::get('/', [AuthController::class, 'index'])->name('login'); 
Route::post('/proseslogin', [AuthController::class, 'proseslogin'])->name('proseslogin'); 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => ('auth')], function(){
    Route::group(['middleware' => ('Masuk:admin')], function(){
    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::resource('guru',GuruController::class);
    Route::resource('kelass',KelasController::class);
    });
    
    Route::group(['middleware' => ('Masuk:guru')], function(){
        Route::get('aksesguru', [AksessGuruController::class, 'index'])->name('guru');
        
    });
}); 

Route::resource('agenda',AgendaController::class);



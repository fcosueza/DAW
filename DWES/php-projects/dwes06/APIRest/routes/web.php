<?php

use App\Http\Controllers\UbicacionController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('ubicaciones',[UbicacionController::class,'index']);
Route::get('ubicaciones/create',[UbicacionController::class,'create']);
Route::post('ubicaciones/store',[UbicacionController::class,'store']);

Route::get('ubicaciones/{ubicacion}',[UbicacionController::class,'show'])->whereNumber('ubicacion')->name('ubicaciones.show');
Route::get('ubicaciones/{ubicacion}/edit',[UbicacionController::class,'edit'])->whereNumber('ubicacion')->name('ubicaciones.edit');
Route::post('ubicaciones/{ubicacion}/update',[UbicacionController::class,'update'])->whereNumber('ubicacion')->name('ubicaciones.update');
Route::get('ubicaciones/{ubicacion}/destroyconfirm',[UbicacionController::class,'destroyconfirm'])->whereNumber('ubicacion')->name('ubicaciones.destroyconfirm');
Route::post('ubicaciones/{ubicacion}/destroy',[UbicacionController::class,'destroy'])->whereNumber('ubicacion')->name('ubicaciones.destroy');

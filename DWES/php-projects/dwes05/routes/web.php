<?php

  use Illuminate\Support\Facades\Route;
  use App\Http\Controllers\UbicacionController;

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

  Route::get('ubicaciones', [UbicacionController::class, 'index']);
  Route::get('ubicaciones/create', [UbicacionController::class, 'create']);
  Route::post('ubicaciones/store', [UbicacionController::class, 'store']);
  Route::get('ubicaciones/{ubicacion}', [UbicacionController::class, 'show'])->whereNumber('ubicacion');


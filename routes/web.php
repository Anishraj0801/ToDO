<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\activeCodeController;

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


Route::get('active', [activeCodeController::class, 'index']);
Route::get('create', [activeCodeController::class, 'create']);
Route::post('create', [activeCodeController::class, 'store']);

Route::get('{id}/update', [activeCodeController::class, 'edit']);

Route::put('create/{id}/active ', [activeCodeController::class, 'updated']);
Route::get('create/{id}/delete', [activeCodeController::class, 'delete']);
Route::post('/tasks/{id}/complete', [activeCodeController::class, 'complete'])->name('tasks.complete');
    

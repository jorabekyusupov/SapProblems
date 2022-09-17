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
require_once 'fortify.php';



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/', [\App\Http\Controllers\InfoController::class, 'index'])->name('dashboard');

});
Route::group(['middleware' => 'check-admin'], function () {
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::put('/users/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');

});
Route::group(['middleware' => ['employee', 'check-admin']], function () {
    Route::get('/problem/create', [\App\Http\Controllers\InfoController::class, 'create'])->name('pr.create');
    Route::post('/problem/store', [\App\Http\Controllers\InfoController::class, 'store'])->name('pr.store');
    Route::get('/problem/{id}/edit', [\App\Http\Controllers\InfoController::class, 'edit'])->name('pr.edit');
    Route::put('/problem/{id}/update', [\App\Http\Controllers\InfoController::class, 'update'])->name('pr.update');
    Route::delete('/problem/destroy/{id}', [\App\Http\Controllers\InfoController::class, 'destroy'])->name('pr.destroy');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

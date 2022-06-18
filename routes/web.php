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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\InfoController::class, 'index'])->name('dashboard');

});
Route::group(['middleware' => 'check-admin'], function () {
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

});
Route::group(['middleware' => ['employee', 'check-admin']], function () {
    Route::get('/problem/create', [\App\Http\Controllers\InfoController::class, 'create'])->name('pr.create');
    Route::post('/problem/store', [\App\Http\Controllers\InfoController::class, 'store'])->name('pr.store');

});



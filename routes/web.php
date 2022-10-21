<?php

use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\UserController;
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
})->name('home');



Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(function () {
    Route::resource('pages', PagesController::class);
    Route::resource('users', UserController::class);
    Route::resource('notices', NoticeController::class);


    Route::get('/', function () {
        return view('admin.index');
    })->name('home');


});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
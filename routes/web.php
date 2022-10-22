<?php

use Mailjet\Resources;
use App\Mail\OrderShipped;
use App\Models\Admin\Notice;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Mailjet\LaravelMailjet\Facades\Mailjet;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\AlumniController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\User\GeneralPageController;
use App\Http\Controllers\Admin\AdministratorController;

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
    $notices = Notice::select('id', 'title', 'created_at')->latest()->take(10)->get();
    return view('welcome', compact('notices'));
})->name('home');

Route::get('notices/{id}', [GeneralPageController::class, 'singleNotice'])->name('singleNotice');
Route::get('notices', [GeneralPageController::class, 'notice'])->name('notice');
Route::get('administration', [GeneralPageController::class, 'administration'])->name('administration');
Route::get('alumni/{slug}', [GeneralPageController::class, 'alumniDetail'])->name('alumniDetail');
Route::get('alumni', [GeneralPageController::class, 'alumni'])->name('alumni');

Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(function () {
    Route::resource('pages', PagesController::class);
    Route::resource('users', UserController::class);
    Route::resource('notices', NoticeController::class);
    Route::resource('administrator', AdministratorController::class);
    Route::resource('alumins', AlumniController::class);


    Route::get('/', function () {
        return view('admin.index');
    })->name('home');


});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/mail', function () {



    Mail::to('monzurul.ce.buet@gmail.com')->send(new OrderShipped());
});

require __DIR__ . '/auth.php';
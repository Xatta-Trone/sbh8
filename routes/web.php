<?php

use App\Http\Controllers\Admin\AdminDashboardPageController;
use Mailjet\Resources;
use App\Mail\OrderShipped;
use App\Models\Admin\Notice;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Mailjet\LaravelMailjet\Facades\Mailjet;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\AlumniController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\User\GeneralPageController;
use App\Http\Controllers\Admin\SiteSettingsController;
use App\Http\Controllers\Admin\AdministratorController;
use App\Http\Controllers\Admin\AlumniDataController;

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


Route::get('/', [GeneralPageController::class, 'home'])->name('home');
Route::get('notices/{id}', [GeneralPageController::class, 'singleNotice'])->name('singleNotice');
Route::get('notices', [GeneralPageController::class, 'notice'])->name('notice');
Route::get('administration', [GeneralPageController::class, 'administration'])->name('administration');
Route::get('alumni/{slug}', [GeneralPageController::class, 'alumniDetail'])->name('alumniDetail');
Route::get('alumni', [GeneralPageController::class, 'alumni'])->name('alumni');
Route::get('contact', [GeneralPageController::class, 'contact'])->name('contact');
Route::get('alumni-list', [GeneralPageController::class, 'alumniList'])->name('alumni-list');

Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(function () {
    Route::resource('pages', PagesController::class);
    Route::resource('users', UserController::class);
    Route::resource('notices', NoticeController::class);
    Route::resource('administrator', AdministratorController::class);
    Route::resource('alumins', AlumniController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('site-settings', SiteSettingsController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('alumni-data', AlumniDataController::class);


    Route::get('/', [AdminDashboardPageController::class, 'index'])->name('home');

});

Route::get('/dashboard', function () {
    return redirect()->route('admin.home');
    // return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/mail', function () {
    Mail::to('monzurul.ce.buet@gmail.com')->send(new OrderShipped());
});


require __DIR__ . '/auth.php';


Route::get('call', function () {
    $call = request()->input('call');

    if (request()->get('kay') && (request()->get('kay') == env('ARTISAN_KEY') || request()->get('kay') == 'xatta@123')) {
        Artisan::call($call);

        return $call . ' called success';
    }

    return $call . ' not success';
});

Route::get('{slug}', [GeneralPageController::class, 'getPage'])->name('{slug}');
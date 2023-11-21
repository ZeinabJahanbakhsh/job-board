<?php

use App\Http\Controllers\Admin\Candidate\CandidateController;
use App\Http\Controllers\Admin\Employer\EmployerAdvertisementController;
use App\Http\Controllers\Admin\Employer\EmployerController;
use App\Http\Controllers\Auth\Socialite\SocialiteController;
use App\Http\Controllers\JobAdvertisement\ListAdvertisementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

/*
|--------------------------------------------------------------------------
| All Advertisements
|--------------------------------------------------------------------------
*/

Route::controller(ListAdvertisementController::class)->group(function () {
    Route::get('/', 'index')->name('list-advertisements');
    Route::get('show-job/{advertisement}', 'show')->name('show-job');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index')
         ->middleware('is_admin');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});

/*
 |--------------------------------------------------------------------------
 | Socialite
 |--------------------------------------------------------------------------
 */
Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback']);


/*
|--------------------------------------------------------------------------
| Employer
|--------------------------------------------------------------------------
*/

Route::controller(EmployerAdvertisementController::class)
     ->middleware(['auth', 'is_employer'])
     ->group(function () {
         Route::prefix('employers/{employer}/advertisements')
              ->group(function () {
                  Route::get('/', 'index')->name('all-advertisements');
                  Route::get('/create', 'create')->name('create-advertisement');
                  Route::post('/', 'store')->name('store-advertisement');
                  Route::get('/{advertisement}', 'edit')->name('edit-advertisement');
                  Route::put('/{advertisement}', 'update')->name('update-advertisement');
                  Route::delete('/{advertisement}', 'destroy')->name('destroy-advertisement');
              });
     });

Route::controller(EmployerAdvertisementController::class)
     ->middleware(['auth', 'is_employer'])
     ->group(function () {
         Route::get('employers/{employer}/received-resumes', 'get')->name('received-resumes');
         Route::get('employers/{file}', 'showPdfFile')->name('show-resume');
     });

/*
|--------------------------------------------------------------------------
| Candidate
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'is_candidate'])->controller(CandidateController::class)
     ->group(function () {
         Route::post('/advertisements/{advertisement}/send-resume', 'sendResume')
              ->name('send-resume');
         Route::post('candidate/{candidate}/advertisements/{advertisement}/store-resume', 'storeResume')
              ->name('store-resume');
         Route::get('candidate/{candidate}/all-resumes', 'get')
              ->name('all-resumes');

     });

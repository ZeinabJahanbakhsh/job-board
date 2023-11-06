<?php

use App\Http\Controllers\Admin\Candidate\CandidateController;
use App\Http\Controllers\Admin\Employer\AdvertisementController;
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
    Route::get('show-job/{advertisement}', [ListAdvertisementController::class, 'show'])->name('show-job');
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

Route::controller(AdvertisementController::class)
     ->prefix('employers/{employer}/advertisements')
     ->middleware(['auth', 'is_employer'])
     ->group(function () {
         Route::get('/', 'index')->name('all-advertisements');                                               //show all employer's advertisements
         Route::get('/create', 'create')->name('create-advertisement');                                      //show create form
         Route::post('/', 'store')->name('store-advertisement');                                             // create form
         Route::get('/{advertisement}', 'edit')->name('edit-advertisement');                                 //update a employer's advertisement
         Route::put('/{advertisement}', 'update')->name('update-advertisement');                             //update a employer's advertisement
         Route::delete('/{advertisement}', 'destroy')->name('destroy-advertisement');                        //update a employer's advertisement
     });


/*
|--------------------------------------------------------------------------
| Candidate
|--------------------------------------------------------------------------
*/
Route::resource('candidates', CandidateController::class)->except(['destroy', 'index'])
     ->middleware(['auth', 'is_candidate']);

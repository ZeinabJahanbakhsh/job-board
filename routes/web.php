<?php

use App\Http\Controllers\Admin\Candidate\CandidateController;
use App\Http\Controllers\Admin\Employer\EmployerController;
use App\Http\Controllers\Auth\Socialite\SocialiteController;
use App\Http\Controllers\JobAdvertisement\ListJobController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
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
| All Advertisements
|--------------------------------------------------------------------------
*/
Route::get('list-jobs', [ListJobController::class, 'index'])->name('list-jobs');
Route::get('show-job/{employer}', [ListJobController::class, 'show'])->name('show-job');


/*
|--------------------------------------------------------------------------
| Employer
|--------------------------------------------------------------------------
*/
Route::resource('employers', EmployerController::class);


/*
|--------------------------------------------------------------------------
| Candidate
|--------------------------------------------------------------------------
*/
Route::resource('candidates', CandidateController::class)->except(['destroy', 'index']);

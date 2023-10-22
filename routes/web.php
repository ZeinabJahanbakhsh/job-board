<?php

use App\Http\Controllers\Admin\Candidate\CandidateController;
use App\Http\Controllers\Admin\Employer\EmployerController;
use App\Http\Controllers\JobAdvertisement\ListJobController;
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
  | All Advertisements
  |--------------------------------------------------------------------------
  */
Route::get('list-jobs', [ListJobController::class, 'index']);
Route::get('show-job/{employer}', [ListJobController::class, 'show'])->name('show-job');


  /*
  |--------------------------------------------------------------------------
  | Employer
  |--------------------------------------------------------------------------
  */
Route::resource('employer', EmployerController::class);



 /*
 |--------------------------------------------------------------------------
 | Candidate
 |--------------------------------------------------------------------------
 */
Route::resource('candidate', CandidateController::class);

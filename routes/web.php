<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\BouquetController;
use App\Http\Controllers\NiveauxController;
use App\Http\Controllers\ProfesseurController;

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
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name("dashboard.index");
    Route::resource('eleve', EleveController::class);
    Route::resource('professeur', ProfesseurController::class);
    Route::resource('niveaux', NiveauxController::class);
    Route::resource('bouquets', BouquetController::class);
    Route::resource('users', UserController::class);
    Route::resource('batchs', BatchController::class);
    Route::resource('cours', CoursController::class);
    Route::resource('groups', GroupController::class);
});

Auth::routes();

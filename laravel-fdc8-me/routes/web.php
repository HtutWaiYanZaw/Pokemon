<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SubTypeController;
use App\Http\Controllers\SuperTypeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ResistanceController;
use App\Http\Controllers\WeaknessController;

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

Route::prefix('admin')->group(function () {
    //get started
    Route::get('/', function () {
        return view('admin.auth.login');
    });

    Route::post('/login', [AuthController::class, 'Login']);


    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/admin');
    });

    Route::middleware(['check-admin-auth'])->group(function () {

        Route::resource('users', UserController::class);

        Route::resource('supertypes',SuperTypeController::class);

        Route::resource('subTypes',SubTypeController::class);

        Route::resource('types',TypeController::class);

        Route::resource('resistances',ResistanceController::class);

        Route::resource('weaknesses',WeaknessController::class);

        Route::resource('cards',CardController::class);
    });
    // Route::get('/page1', function () {
    //     return view('admin.starter.page1');
    // });

    // Route::get('/page2', function () {
    //     return view('admin.starter.page2');
    // });


});



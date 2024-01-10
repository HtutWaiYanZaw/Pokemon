<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Card\CardApiController;
use App\Http\Controllers\API\Resistance\ResistanceApiController;
use App\Http\Controllers\Api\ShoppingCart\ShoppingCartController;
use App\Http\Controllers\API\SubType\SubApiController;
use App\Http\Controllers\API\SuperType\SuperTypeApiController;
use App\Http\Controllers\API\Type\TypeApiController;
use App\Http\Controllers\API\Weakness\WeaknessApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('index', [ShoppingCartController::class, 'index']);
    Route::post('add-to-cart/{cardId}', [ShoppingCartController::class, 'addToCart']);
    Route::post('remove-from-cart/{cardId}', [ShoppingCartController::class, 'removeFromCart']);
    Route::post('checkout/', [ShoppingCartController::class, 'checkout']);
});

Route::resource('main-card', CardApiController::class);

Route::put('/main-card/{cardId}', [CardApiController::class, 'update']);

Route::post('main-card/create', [CardApiController::class, 'store']);

Route::delete('main-card/{cardId}', [CardApiController::class, 'destroy']);

Route::get('super-type', [SuperTypeApiController::class, 'index']);

Route::get('sub-type', [SubApiController::class, 'index']);

Route::get('type', [TypeApiController::class, 'index']);

Route::get('resistance', [ResistanceApiController::class, 'index']);

Route::get('weakness', [WeaknessApiController::class, 'index']);

Route::get('search-name', [CardApiController::class, 'search']);

Route::get('filter-name', [CardApiController::class, 'filter']);

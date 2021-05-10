<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\SlotController;
use App\Http\Livewire\SlotReservations;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;

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

Route::get('/activeGames', function () {
    return view('welcome');
});

Route::get('/home', [ HomeController::class, 'showActiveGames' ])->middleware("auth")->name("active-games");

Route::get("/slot/{game}", SlotReservations::class);
Route::get("/slot/next-steps/{game}", [SlotController::class, "nextSteps"]);


Route::resource("game", GameController::class)->names([
    'index' => 'dashboard',
    'store' => 'game.store'
])->middleware('admin');



Route::group(['middleware' => 'God'], function() {
    Route::resource("product-list", ProductListController::class);
});

Route::group(['middleware' => 'admin'], function() {
    Route::get("/game/lobby/{game}",[
        GameController::class, "gameLobby"
    ]);

    Route::post("/game/start/{game}",[
        GameController::class, "startGame"
    ]);

    Route::post("/game/complete/{game}",[
        GameController::class, "completeGame"
    ]);
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [ HomeController::class, 'showActiveGames' ])->name("active-games");

    Route::get("/slot/{game}", SlotReservations::class);

    Route::get("/slot/next-steps/{game}", [
        SlotController::class, "nextSteps"
    ]);

    Route::get("/game/room/{game}",[
        GameController::class, "gameRoom"
    ]);
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\PlayerController;

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

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */

require __DIR__ . '/auth.php';


Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['checkRole:Admin']], function () {

        Route::group(['prefix' => 'teams'], function () {
            Route::get('/',           [TeamController::class, 'index'])->name('teams.index');

            Route::get('/create',           [TeamController::class, 'create'])->name('teams.create');
            Route::get('/{team}',          [TeamController::class, 'show'])->name('teams.show');
            Route::get('/{team}/edit',     [TeamController::class, 'edit'])->name('teams.edit');

            Route::post('',                 [TeamController::class, 'store'])->name('teams.store');
            Route::post('{team}',           [TeamController::class, 'update'])->name('teams.update');
            Route::delete('{team}',        [TeamController::class, 'destroy'])->name('teams.destroy');
        });

        Route::group(['prefix' => 'players'], function () {
            Route::get('/',           [PlayerController::class, 'index'])->name('players.index');

            Route::get('/create',           [PlayerController::class, 'create'])->name('players.create');
            Route::get('/{player}',          [PlayerController::class, 'show'])->name('players.show');
            Route::get('/{player}/edit',     [PlayerController::class, 'edit'])->name('players.edit');

            Route::post('',                 [PlayerController::class, 'store'])->name('players.store');
            Route::post('{player}',           [PlayerController::class, 'update'])->name('players.update');
            Route::delete('{player}',        [PlayerController::class, 'destroy'])->name('players.destroy');
        });
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/',           [MatchController::class, 'index'])->name('matches.index');
    Route::get('/create',           [MatchController::class, 'create'])->name('matches.create');
    Route::get('/{match}',          [MatchController::class, 'show'])->name('matches.show');
    Route::get('/{match}/edit',     [MatchController::class, 'edit'])->name('matches.edit');

    Route::post('',                 [MatchController::class, 'store'])->name('matches.store');
    Route::post('{match}',           [MatchController::class, 'update'])->name('matches.update');
    Route::delete('{match}',        [MatchController::class, 'destroy'])->name('matches.destroy');
});
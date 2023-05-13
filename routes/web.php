<?php

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

Route::get('/', [\App\Http\Controllers\MainController::class, 'tournamentTeams']);
Route::get('/fixture', [\App\Http\Controllers\MainController::class, 'fixtures']);
Route::get('/simulation', [\App\Http\Controllers\MainController::class, 'simulation']);
Route::get('/reset-all', [\App\Http\Controllers\MainController::class, 'resetAll']);
Route::get('/standings', [\App\Http\Controllers\MainController::class, 'getStandings']);
Route::get('/fixtures', [\App\Http\Controllers\MainController::class, 'getFixtures']);
Route::get('/prediction', [\App\Http\Controllers\PredictionController::class, 'getPrediction']);
Route::get('/play-all-weeks', [\App\Http\Controllers\SimulatorController::class, 'playAllWeeks']);
Route::get('/play-week/{weekId}', [\App\Http\Controllers\SimulatorController::class, 'playWeekly']);

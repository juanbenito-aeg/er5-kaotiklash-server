<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PlayerStatsController;
use App\Http\Controllers\PlayerController;

Route::apiResource("cards", CardController::class);
Route::apiResource("player_stats", [PlayerStatsController::class]);
Route::post("players/opponent-names", [PlayerController::class, "opponentNames"]);
Route::post("login", [PlayerController::class, "login"]);
Route::apiResource("players", PlayerController::class);

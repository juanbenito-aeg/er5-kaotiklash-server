<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PlayerStatsController;
use App\Http\Controllers\PlayerController;

Route::apiResource("cards", CardController::class);
Route::get("player_stats/{id}/total-matches", [PlayerStatsController::class, "getTotalMatches"]);
Route::get("player_stats/{id}/winned-matches", [PlayerStatsController::class, "getWinnedMatches"]);
Route::get("player_stats/{id}/total-played-turns", [PlayerStatsController::class, "getTotalPlayedTurns"]);
Route::get("player_stats/{id}/joseph-appeared", [PlayerStatsController::class, "getJosephAppeared"]);
Route::get("player_stats/{id}/total-minions-killed", [PlayerStatsController::class, "getTotalMinionsKilled"]);
Route::get("player_stats/{id}/total-fumbles", [PlayerStatsController::class, "getTotalFumbles"]);
Route::get("player_stats/{id}/total-critical-hits", [PlayerStatsController::class, "getTotalCriticalHits"]);
Route::get("player_stats/{id}/total-used-cards", [PlayerStatsController::class, "getTotalUsedCards"]);
Route::apiResource("player_stats", PlayerStatsController::class);
Route::post("players/opponents-data", [PlayerController::class, "opponentsData"]);
Route::post("login", [PlayerController::class, "login"]);
Route::apiResource("players", PlayerController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PlayerStatsController;
use App\Http\Controllers\PlayerController;

Route::apiResource("cards", CardController::class);
Route::get("player_stats/total-matches/{id}", [PlayerStatsController::class, "getTotalMatches"]);
Route::get("player_stats/winned-matches/{id}", [PlayerStatsController::class, "getWinnedMatches"]);
Route::get("player_stats/total-played-rounds/{id}", [PlayerStatsController::class, "getTotalPlayedRounds"]);
Route::get("player_stats/joseph-appeared/{id}", [PlayerStatsController::class, "getJosephAppeared"]);
Route::get("player_stats/total-minions-killed/{id}", [PlayerStatsController::class, "getTotalMinionsKilled"]);
Route::get("player_stats/total-fumbles/{id}", [PlayerStatsController::class, "getTotalFumbles"]);
Route::get("player_stats/total-critical-hits/{id}", [PlayerStatsController::class, "getTotalCriticalHits"]);
Route::get("player_stats/total-used-cards/{id}", [PlayerStatsController::class, "getTotalUsedCards"]);
Route::apiResource("player_stats", PlayerStatsController::class);
Route::post("players/opponents-data", [PlayerController::class, "opponentsData"]);
Route::post("login", [PlayerController::class, "login"]);
Route::apiResource("players", PlayerController::class);

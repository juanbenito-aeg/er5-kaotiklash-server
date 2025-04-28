<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PlayerStatsController;
use App\Http\Controllers\PlayerController;

Route::apiResource("cards", CardController::class);
Route::get("player_stats/total-matches", [PlayerStatsController::class, "getTotalMatches"]);
Route::get("player_stats/winned-matches", [PlayerStatsController::class, "getWinnedMatches"]);
Route::get("player_stats/total-played-rounds", [PlayerStatsController::class, "getTotalPlayedRounds"]);
Route::get("player_stats/joseph-appeared", [PlayerStatsController::class, "getJosephAppeared"]);
Route::get("player_stats/total-minions-killed", [PlayerStatsController::class, "getTotalMinionsKilled"]);
Route::get("player_stats/total-fumbles", [PlayerStatsController::class, "getTotalFumbles"]);
Route::get("player_stats/total-critical-hits", [PlayerStatsController::class, "getTotalCriticalHits"]);
Route::get("player_stats/total-used-cards", [PlayerStatsController::class, "getTotalUsedCards"]);
Route::apiResource("player_stats", PlayerStatsController::class);
Route::post("players/opponent-names", [PlayerController::class, "opponentNames"]);
Route::post("login", [PlayerController::class, "login"]);
Route::apiResource("players", PlayerController::class);

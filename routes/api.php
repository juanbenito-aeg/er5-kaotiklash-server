<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PlayerController;

Route::apiResource("cards", CardController::class);
Route::post("players/opponent-names", [PlayerController::class, "opponentNames"]);
Route::apiResource("players", PlayerController::class);

<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PlayerController;  

Route::apiResource("cards", CardController::class);
Route::apiResource("players", PlayerController::class);

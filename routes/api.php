<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArmorController;
use App\Http\Controllers\MinionController;
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\PlayerController;  
use App\Http\Controllers\RareEventController;
use App\Http\Controllers\SpecialEventController;
use App\Http\Controllers\MainCharacterController;
use App\Http\Controllers\JosephChaoticEventController;

Route::apiResource("armor", ArmorController::class);
Route::apiResource("players", PlayerController::class);
Route::apiResource("minions", MinionController::class);
Route::apiResource("weapons", WeaponController::class);
Route::apiResource("rare-events", RareEventController::class);
Route::apiResource("special-events", SpecialEventController::class);
Route::apiResource("main-characters", MainCharacterController::class);
Route::apiResource("chaotic-events", JosephChaoticEventController::class);

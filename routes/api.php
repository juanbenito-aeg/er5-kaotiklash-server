<?php

use App\Http\Controllers\MinionController;
use Illuminate\Support\Facades\Route;

Route::apiResource("minions", MinionController::class);
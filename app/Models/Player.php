<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = "players";
    protected $primaryKey = "player_id";
    public $timestamps = false;

    protected $fillable = [
        "name",
        "email_address",
        "password",
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function playerStats() {
        return $this->hasMany(PlayerStats::class, "player_1", "player_id");
    }
}

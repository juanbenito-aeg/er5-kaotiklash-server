<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerStats extends Model
{
    protected $table = "playerStats";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        "winner",
        "loser",
        "date",
    ];
}

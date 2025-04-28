<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerStats extends Model
{
    protected $table = "player_stats";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        "player_1",
        "player_2",
        "winner",
        "date",
        "duration_in_minutes",
        "played_rounds",
        "joseph_appeared",
        "player_1_minions_killed",
        "player_2_minions_killed",
        "player_1_fumbles",
        "player_2_fumbles",
        "player_1_critical_hits",
        "player_2_critical_hits",
        "player_1_used_cards",
        "player_2_used_cards",
    ];

    public function player1(): BelongsTo
    {
        return $this->belongsTo(Player::class,"player_1",  "player_id");
    }

    public function player2(): BelongsTo
    {
        return $this->belongsTo(Player::class,"player_2",  "player_id");
    }

    public function winnerPlayer(): BelongsTo
    {
        return $this->belongsTo(Player::class,"winner",  "player_id");
    }
}

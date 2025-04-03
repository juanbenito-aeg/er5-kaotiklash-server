<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JosephChaoticEvent extends Model
{
    protected $table = "joseph_chaotic_events";
    protected $primaryKey = "joseph_chaotic_event_id";
    public $timestamps = false;

    public function mainCharacter(): BelongsTo
    {
        return $this->belongsTo(MainCharacter::class, "main_character_id", "main_character_id");
    }
}

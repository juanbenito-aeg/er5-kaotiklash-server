<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Armor extends Model
{
    protected $table = "armor";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function type(): BelongsTo
    {
        return $this->belongsTo(ArmorType::class, "id");
    }
}

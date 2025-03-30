<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Weapon extends Model
{
    protected $table = "weapons";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function type(): BelongsTo
    {
        return $this->belongsTo(WeaponType::class, "type_id");
    }
}

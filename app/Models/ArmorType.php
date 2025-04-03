<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ArmorType extends Model
{
    protected $table = "armor_types";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function armor(): HasMany
    {
        return $this->hasMany(Armor::class, "id", "id");
    }
}

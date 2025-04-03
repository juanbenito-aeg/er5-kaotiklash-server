<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WeaponType extends Model
{
    protected $table = "weapon_types";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function weapons(): HasMany
    {
        return $this->hasMany(Weapon::class, "id", "id");
    }
}

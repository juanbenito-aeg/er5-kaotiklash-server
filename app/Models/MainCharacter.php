<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MainCharacter extends Model
{
    protected $table = "main_characters";
    protected $primaryKey = "main_characters_id";
    public $timestamps = false;

    public function chaoticEvents(): HasMany
    {
        return $this->hasMany(JosephChaoticEvent::class, "main_characters_id");
    }
}

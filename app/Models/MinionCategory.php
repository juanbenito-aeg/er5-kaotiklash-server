<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MinionCategory extends Model
{
    protected $table = "minion_categories";
    protected $primaryKey = "minion_category_id";
    public $timestamps = false;

    public function minions(): HasMany
    {
        return $this->hasMany(Minion::class, "category_id");
    }
}

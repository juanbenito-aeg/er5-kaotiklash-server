<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Minion extends Model
{
    protected $table = "minions";
    protected $primaryKey = "minion_id";
    public $timestamps = false;

    public function category(): BelongsTo
    {
        return $this->belongsTo(MinionCategory::class, "category_id", "minion_category_id");
    }
}

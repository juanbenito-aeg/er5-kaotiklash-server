<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialEvent extends Model
{
    protected $table = "special_events";
    protected $primaryKey = "special_event_id";
    public $timestamps = false;
}

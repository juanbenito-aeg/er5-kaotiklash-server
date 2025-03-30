<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RareEvent extends Model
{
    protected $table = "rare_events";
    protected $primaryKey = "rare_event_id";
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stamp extends Model
{
    protected $fillable = [
        'stamp_id',
        'visitor_id',
        'developer_id',
        'developer_stamp',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStat extends Model
{
    protected $fillable = [
        'visitor_id',
        'point'
    ];
}

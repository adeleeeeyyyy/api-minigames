<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    protected $fillable = [
        'project_id',
        'name',
        'division',
        'Author',
        'vote',
    ];

}

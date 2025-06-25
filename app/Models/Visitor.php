<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Visitor extends Model
{
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'visitor_id',
        'visitor_email',
    ];


}

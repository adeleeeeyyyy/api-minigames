<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Developer extends Model
{
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'developer_id',
        'division',
        'logo',
    ];
}

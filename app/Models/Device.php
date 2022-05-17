<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['name', 'access_token_id', 'player_id', 'user_id', 'visitor', 'latitude', 'longitude'];
}

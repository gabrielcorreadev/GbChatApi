<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceManager extends Model
{
    protected $fillable = ['name', 'access_token_id', 'visitor', 'lat', 'lng'];
}

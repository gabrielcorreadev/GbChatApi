<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    const TYPE_PROFILE = 1;
    const TYPE_MESSAGE = 2;
    
    protected $fillable = ['name', 'path', 'user_id', 'type'];
}

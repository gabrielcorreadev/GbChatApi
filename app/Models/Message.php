<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    const TYPE_TEXT_MESSAGE = 0;
    const TYPE_IMAGE_MESSAGE = 1;
    const TYPE_PDF_MESSAGE = 2;
    const TYPE_DOC_MESSAGE = 3;
    const TYPE_VOICE_MESSAGE = 4;

    protected $fillable = ['from_id', 'to_id', 'message', 'status', 'message_type', 'file_name'];
}

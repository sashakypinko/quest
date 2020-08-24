<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;

class Message extends BaseModel
{
    public $fillable = [
        'id',
        'chat_id',
        'from_id',
        'message',
        'is_read'
    ];

}

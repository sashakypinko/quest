<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;

class Message extends BaseModel
{
    public $fillable = [
        'id',
        'message',
        'is_read'
    ];

    /**
     * @param $query
     * @param $user_id
     * @return mixed
     */
    public function scopeMessage($query, $user_id)
    {
        return $query->where(function ($query) use ($user_id) {
            $query->where('from_id', Auth::user()->id);
            $query->where('to_id', $user_id);
            $query->orWhere('to_id', Auth::user()->id);
            $query->where('from_id', $user_id);
        });
    }
}

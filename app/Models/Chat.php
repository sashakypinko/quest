<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'owner_id',
        'invited_id'
    ];

    /**
     * @param $query
     * @param $fromId
     * @param $toId
     * @return mixed
     */
    public function scopeChat($query, $fromId, $toId)
    {
        return $query->where(function ($query) use ($fromId, $toId) {
            $query->where('owner_id', $fromId);
            $query->where('invited_id', $toId);

            $query->orWhere('owner_id', $toId);
            $query->where('invited_id', $fromId);
        });
    }
}

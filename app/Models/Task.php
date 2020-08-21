<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;

class Task extends BaseModel
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'is_active'
    ];

    protected $hidden = [
        'id'
    ];

    /**
     * @return mixed
     */
    public function getTask()
    {
        return $this->where('priority', Auth::user()->current_task)->first();
    }

    /**
     * @return mixed
     */
    public function getTasksCount()
    {
        return $this->count();
    }
}

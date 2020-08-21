<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;

class Response extends BaseModel
{

    protected $fillable = [
        'user_id',
        'task_id',
        'description',
        'image'
    ];

    protected $hidden = [
        'id'
    ];

    /**
     * @param $image
     * @param $description
     * @return mixed
     */
    public function send($image, $description)
    {
        return $this->create([
            'user_id' => Auth::user()->id,
            'task_id' => Task::where('priority', Auth::user()->current_task)->first()->id,
            'image' => $image,
            'description' => $description
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task()
    {
        return $this->belongsTo('App\Models\Task');
    }
}

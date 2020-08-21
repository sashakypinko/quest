<?php

namespace App\Models;

class Quest extends BaseModel
{
    protected $table = 'quest';

    protected $fillable = [
        'main_title',
        'top_title',
        'top_content',
        'bottom_title',
        'bottom_content'
    ];

    protected $hidden = [
        'id'
    ];
}

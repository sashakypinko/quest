<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Actions\Actionable;
use App\Traits\FileTrait;

abstract class BaseModel extends Model
{
    use Actionable;
    use FileTrait;

    /**
     * @param string $title
     * @return array
     */
    public static function list($title = 'name')
    {
        return self::all()->pluck('id', $title)->toArray();
    }
}

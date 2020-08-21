<?php

namespace App\Nova;

use App\Models\Response as Model;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;

class Response extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Response::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'description';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'description', 'id'
    ];

    /**
     * @param Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return array_merge(
            $this->generalFields(),
            $this->auditionFields()
        );
    }

    /**
     * @return array
     */
    public function generalFields()
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make(__('User'), 'user', User::class),

            BelongsTo::make(__('Task'), 'task', Task::class),

            Text::make(__('Description'), 'description')
                ->sortable()
                ->rules('required', 'max:255'),

            Image::make(__('Image'), 'image')
                ->disk('public')->path((new Model)->getFilePath()),
        ];
    }

    /**
     * @return array
     */
    public function auditionFields()
    {
        return [
            Heading::make(__('Audition Information'))
                ->onlyOnDetail(),

            DateTime::make(__('Created At'), 'created_at')
                ->readonly()
                ->hideFromIndex(),

            DateTime::make(__('Updated At'), 'updated_at')
                ->readonly()
                ->hideFromIndex(),
        ];
    }
}

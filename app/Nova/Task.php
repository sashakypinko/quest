<?php

namespace App\Nova;

use Illuminate\Http\Request;
use App\Models\Task as Model;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class Task extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Task::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title', 'description'
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

            Text::make(__('Title'), 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make(__('Description'), 'description')
                ->sortable()
                ->rules('required', 'max:255'),

            Image::make(__('Image'), 'image')
                ->disk('public')->path((new Model)->getFilePath()),

            Number::make(__('Priority'), 'priority')
                ->sortable(),
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

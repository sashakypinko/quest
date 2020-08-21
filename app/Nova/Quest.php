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
use Laravel\Nova\Fields\Textarea;

class Quest extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Quest::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'main_title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'main_title'
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

            Text::make(__('Title'), 'main_title')
                ->sortable()
                ->rules('required', 'max:255'),

            Image::make(__('Image'), 'image')
                ->disk('public')->path((new Model)->getFilePath()),

            Text::make(__('Second Section Title'), 'bottom_title')
                ->sortable()
                ->rules('required', 'max:255'),

            Textarea::make(__('Second Section Content'), 'bottom_content')
                ->sortable()
                ->rules('required')

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

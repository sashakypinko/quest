<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'email',
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

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),
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

<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class Event extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\Models\\Event';

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
        'id', 'name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')->sortable()
                ->rules('required', 'string', 'max:50')
                ->creationRules('required', 'string', 'min:3')
                ->updateRules('nullable', 'string', 'min:3'),

            Text::make('Description')->sortable()->hidefromindex()
                ->rules('required', 'string'),

            Text::make('Venue')->sortable()
                ->rules('required', 'string', 'max:50'),

            Text::make('Address')->sortable()
                ->rules('required', 'string', 'max:1023'),

            Text::make('City')->sortable()
                ->rules('required', 'string', 'max:50'),

            Text::make('State')->sortable()
                ->rules('required', 'string', 'max:50'),

            Text::make('Post Code')->sortable()
                ->rules('required', 'string', 'max:50'),

            Text::make('Image Src')->sortable()
                ->rules('required', 'string', 'max:50'),

            DateTime::make('Starting At')
                ->rules('after_or_equal:today'),

            DateTime::make('Ending At')
                ->rules('after_or_equal:starting_at'),

            BelongsTo::make('Country')
                ->rules('required'),
               
            HasMany::make('EventItems'),

            BelongsToMany::make('Users')
                ->fields(function () {
                    return [
                        Text::make('comment'),

                        Text::make('receive_updates'),
                    ];
                }),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}

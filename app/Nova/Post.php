<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Post extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\Models\\Post';

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
        'id', 'title',
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

            Text::make('Title')->sortable()
                ->rules('required', 'string', 'max:255'),

            Textarea::make('Snippet')->sortable()->hidefromindex()
                ->rules('required', 'string', 'max:1023'),

            Trix::make('Body')
                ->rules('required'),

            DateTime::make('Published At')->hidefromindex()
                ->rules('after_or_equal:today'),

            DateTime::make('Unpublished At')->hidefromindex()
                ->rules('after_or_equal:published_at'),

            Text::make('Permalink')->sortable()->hidefromindex()
                ->rules('required', 'url', 'string', 'max:255')
                ->creationRules('unique:posts,permalink')
                ->updateRules('unique:posts,permalink'),

            Text::make('Image Src')->sortable()->hidefromindex()
                ->rules('required', 'string'),

            Boolean::make('Is Sticky', 'is_sticky'),

            Boolean::make('Is Visible', 'is_visible'),

            Boolean::make('Is Video', 'is_video'),

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

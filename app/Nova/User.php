<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\MorphToMany;
use App\Nova\Metrics\Users\TotalUsers;
use Laravel\Nova\Fields\BelongsToMany;
use App\Nova\Metrics\Users\UsersPerDay;
use App\Nova\Metrics\Users\UsersByGender;
use KABBOUCHI\NovaImpersonate\Impersonate;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\Models\\User';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'first_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
       'id', 'first_name', 'last_name', 'email',
    ];

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @var array
     */
    public static $with = [
        'company', 'gender', 'country',
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

            Gravatar::make(),

            Text::make('First Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Last Name')
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

            Date::make('Date Of Birth'),

            BelongsToMany::make('BusinessCategories')->sortable()->hideFromIndex(),

            BelongsTo::make('Gender', 'gender', Gender::class)->sortable()->hideFromIndex(),
            Text::make('Gender', 'gender_id', function () {
                return "<a href='/nova/resources/".$this->country->getTable().'/'.$this->country->getRouteKey()."' class='no-underline dim text-primary font-bold'>".$this->gender->name.'</a>';
            })->asHtml()->sortable()->onlyOnIndex(),

            BelongsTo::make('Country', 'country', Country::class)->sortable()->hideFromIndex(),
            Text::make('Country', 'country_id', function () {
                return "<a href='/nova/resources/".$this->country->getTable().'/'.$this->country->getRouteKey()."' class='no-underline dim text-primary font-bold'>".$this->country->name.'</a>';
            })->asHtml()->sortable()->onlyOnIndex(),

            BelongsTo::make('Company', 'company', Company::class)->sortable()->hideFromIndex(),
            Text::make('Company', 'company_id', function () {
                return "<a href='/nova/resources/".$this->country->getTable().'/'.$this->country->getRouteKey()."' class='no-underline dim text-primary font-bold'>".$this->company->name.'</a>';
            })->asHtml()->sortable()->onlyOnIndex(),

            Impersonate::make($this)->withMeta([
                'redirect_to' => route('admin.dashboard'),
            ]),

            BelongsToMany::make('Events')
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
        return [
            new TotalUsers(),
            new UsersPerDay(),
            new UsersByGender(),
        ];
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

    /**
     * Get the value that should be displayed to represent the resource.
     *
     * @return string
     */
    public function title()
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * Get the search result subtitle for the resource.
     *
     * @return string
     */
    public function subtitle()
    {
        if (! empty($this->company)) {
            return $this->company->name;
        }
    }
}

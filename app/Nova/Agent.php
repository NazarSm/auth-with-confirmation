<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Agent extends Resource
{
    public static $with = ['clients'];

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Agent::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('user_id', $request->user()->id );
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Select::make('Gender')
                ->options([
                    'Ms' => 'Ms',
                    'Mrs' => 'Mrs'
                ]),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Surname')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Address')
                ->sortable()
                ->rules('required', 'string', 'max:254'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254'),

            Number::make('Phone')
                ->rules('required', 'numeric'),

            Number::make('Post code')
                ->sortable()
                ->rules( 'numeric'),

            //Date::make('Birth date'),

            Text::make('Nationality')
                ->sortable()
                ->rules('required', 'string', 'max:254'),

            Text::make('Birth city'),

            Text::make('Company name'),

            Text::make('Bank name'),

            Text::make('IBAN'),

            Text::make('Bank code'),


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

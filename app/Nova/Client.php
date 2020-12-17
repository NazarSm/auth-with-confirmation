<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Client extends Resource
{


    public static $displayInNavigation = true;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Client::class;

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
        'id', 'name'
    ];

    public static function indexQuery(NovaRequest $request, $query)
    {
        $id = isset(Auth::user()->agent) ? Auth::user()->agent->id : false;

        return $query->where('user_id', $request->user()->id )
            ->orWhere('agent_id', $id );
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

            Image::make('Logo')->disk('public')->maxWidth(100),

            Select::make('Gender')
                ->options([
                    'Ms' => 'Ms',
                    'Mrs' => 'Mrs'
                ]),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('First name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254'),

            Number::make('Phone')
                ->rules('required', 'numeric'),


            Text::make('Company name')
                ->sortable()
                ->rules('required', 'max:255'),

            Number::make('Siret number')
                ->sortable()
                ->rules('required', 'numeric'),

            Text::make('Address')
                ->sortable()
                ->rules('required', 'string', 'max:254'),

            Number::make('Post code')
                ->rules( 'nullable', 'numeric'),

            Date::make('Contract signature date'),

            Number::make('Total transactions')->default(null)
                ->rules( 'nullable', 'numeric'),

            BelongsToMany::make('Categories', 'categories', Category::class),

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

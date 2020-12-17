<?php

namespace App\Nova;

use App\Nova\Filters\CategoriesByClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use phpDocumentor\Reflection\Types\Self_;

class Category extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Category::class;

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
        'title',
    ];

   /* public static function relatableQuery(NovaRequest $request, $query)
    {
        $categories = \App\Models\Category::all('id');

        return $query->whereIn('id', $categories);
    }*/
    /*public static function indexQuery(NovaRequest $request, $query)
    {
        $cate = \App\Models\Category::all('id');
        $client = Auth::user()->client;
        $categories = $client->categories->all();

        foreach ($categories as $category){
            $id[] = $category->id;
        }
        return $query->whereIn('id', $id)
            ->orWhereIn('id', $cate);
    }*/

    /*public static function indexQuery(NovaRequest $request, $query)
    {

        if ($request->viaRelationship()) {
           // return self::relatableQuery($request, $query);

            $categories = \App\Models\Category::all('id');

            return $query->whereIn('category_id', $categories);
        }

        $client = Auth::user()->client;
        $idClientCategories = $client->categories->all();

        foreach ($idClientCategories as $idClientCategory) {
            $id[] = $idClientCategory->id;
        }

        return $query->whereIn('id', $id);

    }*/

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

            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsToMany::make('Clients')
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
        return [
            new CategoriesByClient
        ];
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

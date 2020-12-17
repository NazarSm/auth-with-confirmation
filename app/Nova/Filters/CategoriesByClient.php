<?php

namespace App\Nova\Filters;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Filters\Filter;

class CategoriesByClient extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        $cat = Category::all('id');

        $client = Auth::user()->client;
        $idClientCategories = $client->categories->all();

        foreach ($idClientCategories as $idClientCategory) {
            $id[] = $idClientCategory->id;
        }

        if($request->viaRelationship()){

            return $query->whereIn('category_id', $cat);

        }

        return $query->whereIn('id', $id);
    }

    public function default()
    {
        return true;
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return [
            'My category' => '0'
        ];
    }
}

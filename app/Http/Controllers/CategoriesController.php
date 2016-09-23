<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Media;
use App\Work;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoriesController extends Controller
{
    public function show($categoryAlias)
    {
        $category = Categories::whereAlias($categoryAlias)->first()->works;

        return view('works')->with('category', $category);

    }

    public function showByAlias(Request $request)
    {
        $alias = $request->segments();

        $category = Categories::whereAlias($alias)->first();

        $data = [
            'category' => $category,
        ];

        return view('categories.show')->with($data, 'data');
    }
}

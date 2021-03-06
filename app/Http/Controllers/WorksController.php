<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Work;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Routing\Controller;

class WorksController extends Controller
{

    public function index()
    {
        $works = Work::all();

        return view('works.works')->with('works', $works);
    }

    public function show($workAlias)
    {
        $work = Work::whereAlias($workAlias)->first();
        $categories = Categories::all();
        return view('works.show')->with('work', $work)->with('categories', $categories);
    }

    public function showById($id)
    {
        $work = Work::findOrFail($id);
        $categories = Categories::all();
        return view('works.show')->with('work', $work)->with('categories', $categories);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with('post_count', Post::all())
                ->with('trashed_count', Post::onlyTrashed()->get()->count())
                ->with('post_count', Post::all()->count())
                ->with('user_count', User::all()->count())
                ->with('categories_count', Category::all()->count());
    }
}

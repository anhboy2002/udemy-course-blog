<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){

        return view('welcome')
                    ->with('title', Setting::first()->site_name)
                    ->with('categories', Category::take(5)->get())
                    ->with('first_post', Post::orderBy('created_at', 'DESC')->first())
                    ->with('second_post', Post::orderBy('created_at', 'DESC')->skip(1)->take(1)->get()->first())
                    ->with('third_post', Post::orderBy('created_at', 'DESC')->skip(2)->take(1)->get()->first())
                    ->with('wordpress', Category::find(5))
                    ->with('career', Category::find(6))
                    ->with('laravel', Category::find(2))
                    ->with('settings', Setting::first());
    }
    public function singlePost($slug){
        $post = Post::where('slug', $slug)->first();
        $next_id = Post::where('id', '>', $post->id)->min('id');
        $prev_id = Post::where('id', '<', $post->id)->max('id');

        return view('single')->with('post', $post)
                                   ->with('title', Setting::first()->site_name)
                                   ->with('categories', Category::take(5)->get())
                                   ->with('settings', Setting::first())
                                   ->with('next', Post::find($next_id))
                                   ->with('prev', Post::find($prev_id))
                                   ->with('tags', Tag::all());
    }
    public function category($id){

        $category = Category::findOrFail($id);

        return view('category')->with('category', $category)
                                     ->with('title', Setting::first()->site_name)
                                     ->with('settings', Setting::first())
                                     ->with('categories', Category::take(5)->get());
    }

    public function tag($id){

        $tag = Tag::findOrFail($id);

        return view('tag')->with('tag', $tag)
            ->with('title', $tag->tag)
            ->with('settings', Setting::first())
            ->with('categories', Category::take(5)->get());
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name','id')->toArray();
        $tags = Tag::all();
        if(count($categories) == 0 || $tags->count() == 0){

            Session::flash('info', 'You must have some categories or tags before attempting to create to a post');
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',$categories)
                                               ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'contentt' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name=time().'.'.$featured->getClientOriginalExtension();
        $featured->move('uploads/posts', $featured_new_name);


        $post = Post::create([
            'title' => $request->title,
            'content' => $request->contentt,
            'featured'=> 'uploads/posts/' . $featured_new_name,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
            'user_id' => Auth::id(),
        ]);

        $post->tags()->attach($request->tags);
        Session::flash('success', 'Post created successfully ');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::findOrFail($id);

        return view('admin.posts.edit')->with('post', $post)
                                             ->with('categories', Category::all()->pluck('name','id')->toArray())
                                             ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'contentt' => 'required',
            'category_id' => 'required',
        ]);

        $post = Post::findOrFail($id);

        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name=time().'.'.$featured->getClientOriginalExtension();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured= 'uploads/posts/' . $featured_new_name;
        }
        $post->title= $request->title;
        $post->content= $request->contentt;
        $post->category_id = $request->category_id;
        $post->slug = Str::slug($request->title);
        $post->save();

        $post->tags()->sync($request->tags);
        Session::flash('success','You successfully updated Post');
        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        Session::flash('success','You successfully trashed Post');
        return redirect()->route('posts');
    }

    public  function trashed(){
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public  function kill($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        Session::flash('success','You successfully Delete Post');

        return redirect()->back();
    }

    public  function restore($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        Session::flash('success','You successfully restore Post');

        return redirect()->route('posts');
    }
}

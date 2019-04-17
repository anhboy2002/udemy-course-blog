<?php


Route::get('/test', function () {
    return App\Models\User::find(3)->profile->avatar;
});

Route::get('/', [
    'uses'=> 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/results',function() {
    $post = \App\Models\Post::where('title', 'like', '%' . request('query') . '%')->get();

    return view('results')->with('posts', $post)
                                    ->with('title', 'Search results :' . request('query'))
                                    ->with('settings', \App\Models\Setting::first())
                                    ->with('categories', \App\Models\Category::take(5)->get())
                                    ->with('query', request('query'));
});

Auth::routes();

Route::get('/{slug}', [
    'uses'=> 'FrontEndController@singlePost',
    'as' => 'post.single'
]);

Route::get('/category/{id}', [
    'uses'=> 'FrontEndController@category',
    'as' => 'category.single'
]);

Route::get('/tag/{id}', [
    'uses'=> 'FrontEndController@tag',
    'as' => 'tag.single'
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function (){

    Route::get('/home',[
        'as' => 'home',
        'uses' => 'HomeController@index',
    ]);

    Route::get('/posts',[
        'as' => 'posts',
        'uses' => 'PostController@index',
    ]);

    Route::get('/posts/trashed',[
        'as' => 'posts.trashed',
        'uses' => 'PostController@trashed',
    ]);

    Route::get('/posts/kill/{id}',[
        'as' => 'post.kill',
        'uses' => 'PostController@kill',
    ]);

    Route::get('/posts/restore/{id}',[
        'as' => 'post.restore',
        'uses' => 'PostController@restore',
    ]);

    Route::get('/posts/edit/{id}',[
        'as' => 'post.edit',
        'uses' => 'PostController@edit',
    ]);

    Route::post('/posts/update/{id}',[
        'as' => 'post.update',
        'uses' => 'PostController@update',
    ]);

    Route::get('/post/delete/{id}',[
        'as' => 'post.delete',
        'uses' => 'PostController@destroy',
    ]);
    Route::post('/post/update/{id}',[
        'as' => 'post.update',
        'uses' => 'PostController@update',
    ]);

    Route::get('/posts/create',[
        'as' => 'post.create',
        'uses' => 'PostController@create',
    ]);

    Route::post('/posts/store',[
        'as' => 'post.store',
        'uses' => 'PostController@store',
    ]);

    Route::get('/category/create',[
       'uses' => 'CategoriesController@create',
        'as' => 'category.create',
    ]);

    Route::post('/category/store',[
        'as' => 'category.store',
        'uses' => 'CategoriesController@store',
    ]);

    Route::get('/categories',[
        'as' => 'categories',
        'uses' => 'CategoriesController@index',
    ]);
    Route::get('/category/edit/{id}',[
        'as' => 'category.edit',
        'uses' => 'CategoriesController@edit',
    ]);
    Route::get('/category/delete/{id}',[
        'as' => 'category.delete',
        'uses' => 'CategoriesController@destroy',
    ]);
    Route::post('/category/update/{id}',[
        'as' => 'category.update',
        'uses' => 'CategoriesController@update',
    ]);

    Route::get('/tags',[
       'uses' => 'TagsController@index',
        'as' => 'tags'
    ]);

    Route::get('/tags/create',[
        'uses' => 'TagsController@create',
        'as' => 'tags.create'
    ]);

    Route::post('/tags/store',[
        'as' => 'tags.store',
        'uses' => 'TagsController@store',
    ]);

    Route::get('/tags/edit/{id}',[
        'uses' => 'TagsController@edit',
        'as' => 'tags.edit'
    ]);

    Route::post('/tags/update/{id}',[
        'uses' => 'TagsController@update',
        'as' => 'tags.update'
    ]);

    Route::get('/tags/delete/{id}',[
        'uses' => 'TagsController@destroy',
        'as' => 'tags.delete'
    ]);

    Route::get('/users',[
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);

    Route::get('/user/create',[
        'uses' => 'UsersController@create',
        'as' => 'user.create'
    ]);

    Route::post('/user/store',[
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ]);

    Route::get('/user/delete/{id}',[
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);

    Route::get('/user/admin/{id}',[
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ]);

    Route::get('/user/not_admin/{id}',[
        'uses' => 'UsersController@not_admin',
        'as' => 'user.not_admin'
    ]);
    Route::get('/user/profile',[
        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
    ]);

    Route::post('/user/profile/update',[
        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'
    ]);

    Route::get('/settings',[
        'uses' => 'SettingsController@index',
        'as' => 'settings'
    ])->middleware('admin');

    Route::post('/settings/update',[
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ])->middleware('admin');

});



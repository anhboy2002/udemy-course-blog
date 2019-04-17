@extends('layouts.app')
@section('content')

        @include('admin.include.errors')
        <div class="card">
                <div class="card-header">
                        <a href = "{{ route('post.create') }}"> Edit a  {{$post->title}}</a>
                </div>
        </div>
        <div class="card-body">
                {!! Form::open(['method' => 'POST', 'route' => ['post.update', 'id' => $post->id ], 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group" >
                        {!! Form::label('title', 'Title', ['class' => 'col-sm-4 col-form-label ']) !!}
                        {!! Form::text('title', $post->title , ['class' => 'form-control']) !!}
                </div>

                <div class="form-group" >
                        {!! Form::label('featured', 'Featured image', ['class' => 'col-sm-4 col-form-label']) !!}
                        {!! Form::file('featured') !!}
                </div>

                <div class="form-group" >
                        {!! Form::label('categories', 'Select a Category', ['class' => 'col-sm-4 col-form-label']) !!}
                        {!! Form::select('category_id', $categories, $post->category_id) !!}
                </div>

                <div class="form-group" >
                        {!! Form::label('tags', 'Select tags', ['class' => 'col-sm-4 col-form-label']) !!}
                        @foreach($tags as $tag)
                                <div class="form-check">
                                        <label> <input type="checkbox" name="tags[]" class ="form-check-input" value="{{$tag->id}}"
                                                         @foreach ($post->tags as $t)
                                                                 @if($tag->id == $t->id)
                                                                        checked
                                                                 @endif
                                                         @endforeach ,
                                                >{{$tag->tag}}</label>
                                </div>
                        @endforeach
                </div>


                <div class="form-group" >
                        {!! Form::label('content', 'Content', ['class' => 'col-sm-4 col-form-label']) !!}
                        {!! Form::textarea('contentt',$post->content, ['class' => 'form-control', 'id' => 'content']) !!}
                </div>

                <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                                {!! Form::submit ('Update post', ['class' => 'btn btn-primary'])!!}
                        </div>
                </div>

                {!! Form::close() !!}
        </div>

@endsection

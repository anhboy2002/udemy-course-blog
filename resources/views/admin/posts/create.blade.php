@extends('layouts.app')
@section('content')

        @include('admin.include.errors')
        <div class="card">
                <div class="card-header">
                        <a href = "{{ route('post.create') }}"> Create a Post</a>
                </div>
        </div>
        <div class="card-body">
                {!! Form::open(['method' => 'POST', 'route' => 'post.store', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group" >
                                {!! Form::label('title', 'Title', ['class' => 'col-sm-4 col-form-label ']) !!}
                                {!! Form::text('title', ' ', ['class' => 'form-control']) !!}
                        </div>


                        <div class="form-group" >
                                {!! Form::label('featured', 'Featured image', ['class' => 'col-sm-4 col-form-label']) !!}
                                {!! Form::file('featured') !!}
                        </div>

                        <div class="form-group" >
                                {!! Form::label('categories', 'Select a Category', ['class' => 'col-sm-4 col-form-label']) !!}
                                {!! Form::select('category_id', $categories) !!}
                        </div>

                        <div class="form-group" >
                                {!! Form::label('tags', 'Select tags', ['class' => 'col-sm-4 col-form-label']) !!}
                                @foreach($tags as $tag)
                                        <div class="form-check">
                                                {!! Form::checkbox('tags[]', $tag->id, ['class' => 'form-check-input']) !!}
                                                {{$tag->tag}}
                                        </div>
                                @endforeach
                        </div>


                        <div class="form-group" >
                                {!! Form::label('content', 'Content', ['class' => 'col-sm-4 col-form-label']) !!}
                                {!! Form::textarea('contentt', ' ', ['class' => 'form-control', 'id' => 'content']) !!}
                        </div>

                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                        {!! Form::submit ('Store post', ['class' => 'btn btn-primary'])!!}
                                </div>
                        </div>

                {!! Form::close() !!}
        </div>

@endsection

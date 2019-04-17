@extends('layouts.app')
@section('content')
        @include('admin.include.errors')

        <div class="card">
                <div class="card-header">
                        <a href = "{{ route('post.create') }}"> Update a Category : {{$category->name}}</a>
                </div>
        </div>
        <div class="card-body">
                {!! Form::open(['method' => 'POST', 'route' => ['category.update','id' => $category->id ]]) !!}
                        <div class="form-group" >
                                {!! Form::label('name', 'Name', ['class' => 'col-sm-4 col-form-label ']) !!}
                                {!! Form::text('name', $category->name , ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                        {!! Form::submit ('Update Category', ['class' => 'btn btn-primary'])!!}
                                </div>
                        </div>

                {!! Form::close() !!}
        </div>

@endsection

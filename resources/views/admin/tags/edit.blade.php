@extends('layouts.app')
@section('content')

    @include('admin.include.errors')
    <div class="card">
        <div class="card-header">
            <a href = "{{ route('tags.edit', ['id' => $tag->id]) }}"> Edit a tag {{$tag->tag}}</a>
        </div>
    </div>
    <div class="card-body">
        {!! Form::open(['method' => 'POST', 'route' => ['tags.update', 'id' => $tag->id]]) !!}
        <div class="form-group" >
            {!! Form::label('tag', 'Tag', ['class' => 'col-sm-4 col-form-label ']) !!}
            {!! Form::text('tag',$tag->tag, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                {!! Form::submit ('Update Tag', ['class' => 'btn btn-primary'])!!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>

@endsection

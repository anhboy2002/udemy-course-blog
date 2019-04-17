@extends('layouts.app')
@section('content')

        @include('admin.include.errors')
        <div class="card">
                <div class="card-header">
                        <a href = "{{ route('tags.create') }}"> Create a tag</a>
                </div>
        </div>
        <div class="card-body">
                {!! Form::open(['method' => 'POST', 'route' => 'tags.store']) !!}
                        <div class="form-group" >
                                {!! Form::label('tag', 'Tag', ['class' => 'col-sm-4 col-form-label ']) !!}
                                {!! Form::text('tag', ' ', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                        {!! Form::submit ('Store Tag', ['class' => 'btn btn-primary'])!!}
                                </div>
                        </div>

                {!! Form::close() !!}
        </div>

@endsection

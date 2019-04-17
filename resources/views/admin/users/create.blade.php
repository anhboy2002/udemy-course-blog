@extends('layouts.app')
@section('content')

        @include('admin.include.errors')
        <div class="card">
                <div class="card-header">
                        <a href = "{{ route('user.create') }}"> Create user</a>
                </div>
        </div>
        <div class="card-body">
                {!! Form::open(['method' => 'POST', 'route' => 'user.store']) !!}
                        <div class="form-group" >
                                {!! Form::label('name', 'User', ['class' => 'col-sm-4 col-form-label ']) !!}
                                {!! Form::text('name', ' ', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group" >
                                {!! Form::label('email', 'Email', ['class' => 'col-sm-4 col-form-label ']) !!}
                                {!! Form::text('email', ' ', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                        {!! Form::submit ('Store user', ['class' => 'btn btn-primary'])!!}
                                </div>
                        </div>

                {!! Form::close() !!}
        </div>

@endsection

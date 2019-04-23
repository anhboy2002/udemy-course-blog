@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('header.register')</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'register', 'method' => 'POST']) !!}
                        <div class="form-group row">
                            {!! Form::label('name', trans('header.name'), ['class' => 'col-md-4 col-form-label text-md-right'] ) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'id' => 'name']) !!}

                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('email', trans('header.email'), ['class' => 'col-md-4 col-form-label text-md-right'] ) !!}
                            <div class="col-md-6">
                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'id' => 'email']) !!}

                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password', trans('header.password'), ['class' => 'col-md-4 col-form-label text-md-right'] ) !!}
                            <div class="col-md-6">

                                {!! Form::password('password', ['class' => 'form-control']) !!}

                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password-confirm', trans('header.confirm_password'), ['class' => 'col-md-4 col-form-label text-md-right'] ) !!}

                            <div class="col-md-6">
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirm']) !!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {!! Form::submit (trans('header.register'), ['class' => 'btn btn-primary'])!!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

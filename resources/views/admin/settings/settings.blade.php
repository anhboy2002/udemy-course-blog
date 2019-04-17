@extends('layouts.app')
@section('content')

    @include('admin.include.errors')
    <div class="card">
        <div class="card-header">
             Edit blog settings
        </div>
    </div>
    <div class="card-body">
        {!! Form::open(['method' => 'POST', 'route' => 'settings.update']) !!}
        <div class="form-group" >
            {!! Form::label('site_name', 'Site Name', ['class' => 'col-sm-4 col-form-label ']) !!}
            {!! Form::text('site_name',$settings->site_name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group" >
            {!! Form::label('address', 'Address', ['class' => 'col-sm-4 col-form-label ']) !!}
            {!! Form::text('address', $settings->address, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group" >
            {!! Form::label('contact_number', 'Contact number', ['class' => 'col-sm-4 col-form-label ']) !!}
            {!! Form::text('contact_number', $settings->contact_number, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group" >
            {!! Form::label('contact_email', 'Contact email', ['class' => 'col-sm-4 col-form-label ']) !!}
            {!! Form::text('contact_email', $settings->contact_email, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                {!! Form::submit ('Update settings', ['class' => 'btn btn-primary'])!!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>

@endsection

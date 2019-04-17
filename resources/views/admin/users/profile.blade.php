@extends('layouts.app')
@section('content')

        @include('admin.include.errors')
        <div class="card">
                <div class="card-header">
                        <a href = "{{ route('user.profile') }}"> Edit your user</a>
                </div>
        </div>
        <div class="card-body">
                {!! Form::open(['method' => 'POST', 'route' => 'user.profile.update', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group" >
                                {!! Form::label('name', 'User name', ['class' => 'col-sm-4 col-form-label ']) !!}
                                {!! Form::text('name',$user->name, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group" >
                                {!! Form::label('email', 'Email', ['class' => 'col-sm-4 col-form-label ']) !!}
                                {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group" >
                                {!! Form::label('newpassword', 'New password', ['class' => 'col-sm-4 col-form-label ']) !!}
                                {!! Form::password('newpassword', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group" >
                                {!! Form::label('avatar', 'Upload new Avatar', ['class' => 'col-sm-4 col-form-label ']) !!}
                                {!! Form::file('avatar') !!}
                        </div>
                        <div class="form-group" >
                                {!! Form::label('facebook', 'Facebook', ['class' => 'col-sm-4 col-form-label ']) !!}
                                {!! Form::text('facebook', $user->profile->facebook, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group" >
                                {!! Form::label('youtube', 'Youtube', ['class' => 'col-sm-4 col-form-label ']) !!}
                                {!! Form::text('youtube', $user->profile->youtube, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group" >
                                {!! Form::label('about', 'About', ['class' => 'col-sm-4 col-form-label ']) !!}
                                {!! Form::textarea('about', $user->profile->about, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                        {!! Form::submit ('Update user', ['class' => 'btn btn-primary'])!!}
                                </div>
                        </div>

                {!! Form::close() !!}
        </div>

@endsection

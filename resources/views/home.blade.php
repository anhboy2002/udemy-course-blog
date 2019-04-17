@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header text-center bg-info">
                     POSTED
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$post_count}}</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header text-center bg-danger ">
                    TRASHED
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$trashed_count}}</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header text-center bg-light">
                    USER
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$user_count}}</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header text-center bg-info">
                    CATEGORIES
                </div>
                <div class="card-body">
                    <h1 class="text-center">{{$categories_count}}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

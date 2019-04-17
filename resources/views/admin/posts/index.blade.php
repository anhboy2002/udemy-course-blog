@extends('layouts.app')
@section('content')
    <div class="card-header">All Post</div>
    <table class="table table-hover">
        <thead>
            <th>
                Image
            </th>
            <th>
                Post Name
            </th>
            <th>
                Editing
            </th>
            <th>
                Trashed
            </th>
        </thead>
        <tbody>
        @if ($posts->count() >0 )
        @foreach($posts as $post)
            <tr>
                <td>
                    <img src="{{ $post -> featured }}" alt="{{$post->title}}" width="70px" height="50px">
                </td>
                <td>
                    {{ $post->title }}
                </td>
                <td>
                    <a href="{{route('post.edit', ['id' => $post->id]) }}" class=" btn btn-primary">
                        Editing
                    </a>
                </td>
                <td>
                    <a href="{{route('post.delete', ['id' => $post->id]) }}" class=" btn btn-danger">
                        Trashed
                    </a>
                </td>
            </tr>
        @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center"> No Post</td>
            </tr>
        @endif
        </tbody>
    </table>

@endsection

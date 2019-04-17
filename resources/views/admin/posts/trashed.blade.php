@extends('layouts.app')
@section('content')
    <div class="card-header">Trashed Post</div>
    <table class="table table-hover">
        <thead>
        <th>
            Image
        </th>
        <th>
            Category Name
        </th>
        <th>
            Editing
        </th>
        <th>
            Restore
        </th>
        <th>
            Deleting
        </th>
        </thead>
        <tbody>
        @if($posts->count() > 0)
            @foreach($posts as $post)
                <tr>
                    <td>
                        <img src="{{ $post -> featured }}" alt="{{$post->title}}" width="70px" height="50px">
                    </td>
                    <td>
                        {{ $post->title }}
                    </td>
                    <td>
                        {{--                    <a href="{{route('post.edit', ['id' => $post->id]) }}" class=" btn btn-primary">--}}
                        Editing
                        </a>
                    </td>
                    <td>
                        <a href="{{route('post.restore', ['id' => $post->id]) }}" class=" btn btn-primary">
                            Restore
                        </a>
                    </td>
                    <td>
                        <a href="{{route('post.kill', ['id' => $post->id]) }}" class=" btn btn-danger">
                            Delete
                        </a>
                    </td>

                </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5" class="text-center"> No Trashed Post</td>
            </tr>
        @endif

        </tbody>
    </table>

@endsection

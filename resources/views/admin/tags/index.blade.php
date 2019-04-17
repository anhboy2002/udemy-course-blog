@extends('layouts.app')
@section('content')
    <div class="card-header">Tags</div>
    <table class="table table-hover">
        <thead>
        <th>
            Tags Name
        </th>
        <th>
            Editing
        </th>
        <th>
            Deleting
        </th>
        </thead>
        <tbody>
        @if($tags->count() > 0 )
            @foreach($tags as $tag)
                <tr>
                    <td>
                        {{$tag->tag}}
                    </td>
                    <td>
                        <a href="{{route('tags.edit', ['id' => $tag->id]) }}" class=" btn btn-primary">
                            Editing
                        </a>
                    </td>
                    <td>
                        <a href="{{route('tags.delete', ['id' => $tag->id]) }}" class=" btn btn-danger">
                            Deleting
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center"> No tags yet </td>
            </tr>
        @endif
        </tbody>
    </table>

@endsection

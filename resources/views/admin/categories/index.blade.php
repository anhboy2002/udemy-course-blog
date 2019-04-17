@extends('layouts.app')
@section('content')
    <div class="card-header">Categories</div>
    <table class="table table-hover">
        <thead>
            <th>
                Category Name
            </th>
            <th>
                Editing
            </th>
            <th>
                Deleting
            </th>
        </thead>
        <tbody>
        @if($categories->count() > 0 )
        @foreach($categories as $category)
            <tr>
                <td>
                    {{$category->name}}
                </td>
                <td>
                    <a href="{{route('category.edit', ['id' => $category->id]) }}" class=" btn btn-primary">
                        Editing
                    </a>
                </td>
                <td>
                    <a href="{{route('category.delete', ['id' => $category->id]) }}" class=" btn btn-danger">
                        Deleting
                    </a>
                </td>
            </tr>
        @endforeach
            @else
            <tr>
                <td colspan="4" class="text-center"> No Category</td>
            </tr>
        @endif
        </tbody>
    </table>

@endsection

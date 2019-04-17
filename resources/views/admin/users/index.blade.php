@extends('layouts.app')
@section('content')
    <div class="card-header">User</div>
    <table class="table table-hover">
        <thead>
        <th>
            Image
        </th>
        <th>
             Name
        </th>
        <th>
            Permissions
        </th>
        <th>
            Delete
        </th>
        </thead>
        <tbody>
        @if ($users->count() >0 )
            @foreach($users as $user)
                <tr>
                    <td>
                        <img src="http://localhost:8000/{{ $user->profile->avatar }} " alt="" width="60px" height="60px" style="border-radius:50% ;">
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        @if($user->admin)
                            <a class="btn btn-danger btn-group-sm " href="{{ route('user.not_admin', ['id' => $user->id ]) }}" >Remove permission</a>
                        @else
                            <a class="btn btn-success btn-group-sm " href="{{ route('user.admin', ['id' => $user->id ]) }}" >Make admin</a>
                        @endif
                    </td>
                    <td>
                        @if(Auth::id() !== $user->id)
                            <a class="btn btn-danger btn-group-sm " href="{{ route('user.delete', ['id' => $user->id ]) }}" >Delete</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center"> No Users</td>
            </tr>
        @endif
        </tbody>
    </table>

@endsection

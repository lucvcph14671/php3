@extends('adminMaster')
@section('title','trang list user')
@section('conten')
    <a class="m-2 btn btn-info" href="{{route('admin.user.create')}}">Add User</a>
    <table class="table table-light ">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>IMG</th>
                <th>Phone</th>
                <th>Quyền</th>
                <th>Edit</th>
                <th>cấp quyền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($db as $index => $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td><img src="{{asset($user->avatar)}}" alt="" width="100"></td>
                    <td>{{ $user->phone }}</td>
                    @if ($user->role === 0)
                        <td class="btn btn-outline-danger">Thành viên</td>
                    @elseif ($user->role === 1)
                        <td class="btn btn-outline-info">Admin</td>
                    @else
                        <td class="btn btn-outline-warning">CTV</td>
                    @endif
                    <td>
                        <a class="btn btn-success btn-sm rounded" href="{{route('admin.user.edit', $user->id)}}">Edit</a>
                        <form action="{{route('admin.user.delete', $user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm mt-2">delete</button>
                        </form>
                    </td>
                    @if ($user->role === 1)
                    <td >
                        <a class="btn btn-outline-danger btn-sm mt-2" name="" href="{{route('admin.user.role', $user->id)}}">Cấp Thành viên</a>
                        </td>
                @elseif ($user->role === 0)
                    <td>
                        <a class="btn btn-outline-info btn-sm mt-2" name="st" href="{{route('admin.user.role', $user->id)}}"> Cấp Admin</a>
                       </td>
                @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$db->links()}}
@endsection

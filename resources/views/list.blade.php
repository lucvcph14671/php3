@extends('adminMaster')
@section('conten')
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <tr
            @for ($i = 0; $i < 3; $i++) : >
                <td>#{{ $i }}</td>
                <td>001</td>
                <td>Sản phẩm{{ $i }}</td>
                <td>0978942425</td>
                <td>luc@gmail.com</td>
            </tr @endfor;>
    </tbody>
</table>
@endsection

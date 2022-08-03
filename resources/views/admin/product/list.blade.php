@extends('adminMaster')
@section('title','Trang list Product')
@section('conten')
    <a class="m-2 btn btn-info" href="{{route('admin.product.create')}}">Add Product</a>
    <form action="" method="get">
        <input type="text" class="form-control" value="" name="serach" placeholder="Tìm kiếm">
    </form>
    <table class="table table-light ">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>IMG</th>
                <th>Trạng thái</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($db as $index => $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}đ</td>
                    <td><img src="{{asset($product->thumbnail_url )}}" alt="" width="100"></td>
                    @if ($product->status === 1)
                        <td >
                            <a class="btn btn-outline-danger btn-sm mt-2" name="" href="{{route('admin.product.status', $product->id)}}">Khóa</a>
                            </td>
                    @elseif ($product->status === 0)
                        <td>
                            <a class="btn btn-outline-info btn-sm mt-2" name="st" href="{{route('admin.product.status', $product->id)}}">Mở</a>
                           </td>
                    @endif
                    <td>
                        <form action="{{route('admin.product.delete', $product->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm mt-2">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$db->links()}}
@endsection

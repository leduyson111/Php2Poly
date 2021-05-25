@extends('layouts.main')
@section('title', 'Danh sách sản phẩm')
@section('main-content')
<table class="table table-stripped">
<a class= "btn btn-primary" href="{{BASE_URL.'admin/san-pham/new-product'}}">Tạo mới</a> <br>
    <thead>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Tên danh mục</th>
        <th>Ảnh sản phẩm</th>
        <th>Mô tả</th>
        <th>Hành động </th>
        
    </thead>
    <tbody>
    @foreach($products as $item)

        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->category->cate_name}}</td>
            <td><img src="{{BASE_URL.$item->image}}" alt="Error" width="150px" height="120px"></td>
            <td>{{$item->short_desc}}</td>
            <td>
                <a href="{{BASE_URL.'/admin/san-pham/edit-product/'}}{{$item->id}}" class="btn btn-info">Sửa</a>
                <a onclick="return confirm('Bạn muốn xóa sản phẩm này !')"  href="{{BASE_URL.'/admin/san-pham/delete-product/'}}{{$item->id}}"  class="btn btn-danger">Xóa</a>
            </td>
        </tr>
    @endforeach
            <tr>
                <td colspan="3">
                    @for($i = 1; $i <= $totalPage; $i++)
                        <a href="{{BASE_URL . "admin/san-pham?keyword=$keyword&page=$i" }}">{{$i}}<a>
                    @endfor
                </td>
            </tr>



    </tbody>
</table>

@endsection
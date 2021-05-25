@extends('layouts.main')
@section('title', 'Danh sách danh mục')
@section('main-content')
<table class="table table-stripped">
<a class= "btn btn-primary" href="{{BASE_URL.'admin/danh-muc/new-cate'}}">Tạo mới</a> <br>
    <thead>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Mô tả</th>
        <th>Hiển thị menu</th>
        <th>Số sản phẩm</th>
        <th>
           Hành động
        </th>
    </thead>
    <tbody>
        @foreach ($cates as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td class="cate-name">{{$c->cate_name}}</td>
                <td>{{$c->desc}}</td>
                <td>{{$c->show_menu == 1 ? "Có" : "Không"}}</td>
                <td>{{count($c->products)}}</td>
                <td>
                    <a class="btn btn-info" href="{{BASE_URL.'/admin/danh-muc/edit-cate/'}}{{$c->id}}">Sửa</a>
                    <a class="btn btn-danger" href="{{BASE_URL.'/admin/danh-muc/remove-cate/'}}{{$c->id}}" >Xóa</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('page-script')
<script>
    $('.cate-name').click(function(){
        alert($(this).text());
    });
</script>
@endsection
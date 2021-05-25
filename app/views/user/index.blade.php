@extends('layouts.main')
@section('title', 'Danh sách thanh viên')
@section('main-content')
    <table class="table table-stripped">
        <a class= "btn btn-primary" href="{{BASE_URL.'/admin/user/add-user'}}">Tạo mới</a> <br>
        <thead>
        <th>ID</th>
        <th>Tên thành viên</th>
        <th>Avatar</th>
        <th>Email</th>
        <th>
            Hành động
        </th>
        </thead>
        <tbody>
        @foreach($users as $u)
        <tr>
           <td>{{$u->id}}</td>
            <td>{{$u->name}}</td>
            <td><img width="200px" src='<?= BASE_URL . $u->avatar ?>' alt="Error"></td>
            <td>{{$u->email}}</td>

            <td>
                <a  href="{{BASE_URL.'/admin/user/edit-user/'}}{{$u->id}}" class="btn btn-primky">Sửa</a>
                <a   href="{{BASE_URL.'/admin/user/delete-user/'}}{{$u->id}}"  onclick="return confirm('Bạn có đồng ý xóa tài khoản này không')  " class="btn btn-danger">Xóa</a>
            </td>
            
        </tr>

        @endforeach

        </tbody>
    </table>
@endsection

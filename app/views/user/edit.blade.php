@extends('layouts.main')
@section("title","Sửa thông tin thành viên")
@section('main-content')
@php
    $roles = [
        ['id' => 0, 'name' => 'Member'],
        ['id' => 200, 'name' => 'Admin'],
    ];
@endphp
<form action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="">Name</label>
        <input class="form-control" value="{{$model->name}}" type="text" name="name">
    </div>
    <div>
        <label for="">Email</label>
        <input class="form-control" value="{{$model->email}}"  type="text" name="email">
    </div>
    <div>
        <label for="">Password</label>
        <input class="form-control" value="{{$model->password}}"   type="password" name="password">
    </div>
    <div>
        <label for="">Avatar</label>
        <input class="form-control" type="file" name="file">
        
    </div>
    <br>
    <img width="200px" src="{{BASE_URL.$model->avatar}}" alt="Error">
    <br>

    <div>
        <label for="">Chưc vụ</label>
        <select class="form-control" name="role" >
            <?php foreach($roles as $r): ?>
            <option  value="<?= $r['id']?>"><?= $r['name']?></option>
            <?php endforeach?>
        </select>
    </div>
    <br>
    <div>
        <button class="btn btn-google" type="submit">Tạo mới</button>
    </div>
 
@endsection


 
@extends('layouts.main')
@section("title","Thêm thành viên")
@section('main-content')
@php
    $roles = [
        ['id' => 0, 'name' => 'Member'],
        ['id' => 200, 'name' => 'Admin'],
        
    ];
@endphp
<form action="save-user" method="post" enctype="multipart/form-data">
    <div>
        <label for="">Name</label>
        <input class="form-control" type="text" name="name">

        <?php
            if (isset($err["name"]) && $err["name"]) {
                echo "<p style='color:red'>".$err["name"]."</p>";
            }
        ?>
    </div>
    <div>
        <label for="">Email</label>
        <input class="form-control" type="text" name="email">
        <?php
            if (isset($err["email"]) && $err["email"]) {
                echo "<p style='color:red'>".$err["email"]."</p>";
            }
        ?>
    </div>
    <div>
        <label for="">Password</label>
        <input class="form-control" type="password" name="password">
        <?php
            if (isset($err["password"]) && $err["password"]) {
                echo "<p style='color:red'>".$err["password"]."</p>";
            }
        ?>
    </div>
    <div>
        <label for="">Avatar</label>
        <input class="form-control" type="file" name="file">
        <?php
            if (isset($err["image"]) && $err["image"]) {
                echo "<p style='color:red'>".$err["image"]."</p>";
            }
        ?>
  
    </div>
    <div>
        <label for="">Role</label>
        <select class="form-control" name="role" >
            <?php foreach($roles as $r): ?>
            <option value="<?= $r['id']?>"><?= $r['name']?></option>
            <?php endforeach?>
        </select>
    </div>
    <br>
    <div>
        <button class="btn btn-google" type="submit">Tạo mới</button>
    </div>
 
@endsection


 
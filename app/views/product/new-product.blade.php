@extends('layouts.main')
@section("title","Thêm sản phẩm")
@section('main-content')

<form style="margin-left: 15px;" action="save-product" method="post" enctype="multipart/form-data">
    <div>
        <label for=""> Tên sản phẩm</label>
        <input class="form-control" type="text"  name="name">
        <?php
            if (isset($err["name"]) && $err["name"]) {
                echo "<p style='color:red'>".$err["name"]."</p>";
            }
        ?>
    </div>

    <div>
        <label for="">Ảnh sản phẩm</label>
        <input class="form-control" type="file" name="file">
        <?php
            if (isset($err["image"]) && $err["image"]) {
                echo "<p style='color:red'>".$err["image"]."</p>";
            }
        ?>
    </div>

    <div>
        <label for="">Danh mục sản phẩm</label>
        <select class="form-control" name="cate_id" id="">
        @foreach($category as $c)
            <option value="{{$c->id}}">{{$c->cate_name}}</option>
        @endforeach
        </select>
    </div>

    <div>
        <label for="">Mô tả</label>
       <textarea class="form-control" name="short_desc" id="" cols="30" rows="10"></textarea>
       <?php
            if (isset($err["short_desc"]) && $err["short_desc"]) {
                echo "<p style='color:red'>".$err["short_desc"]."</p>";
            }
        ?>
    </div>

     
    <div>
        <label for=""> Gía sản phẩm</label>
        <input class="form-control" type="text"  name="price">
        <?php
            if (isset($err["price"]) && $err["price"]) {
                echo "<p style='color:red'>".$err["price"]."</p>";
            }
        ?>
    </div>
     <br>

    <div>
        <button class="btn btn-danger"  type="submit">Lưu lại</button>
    </div>

</form>
@endsection


 
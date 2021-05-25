@extends('layouts.main')
@section("title","Sửa sản phẩm")
@section('main-content')

<form style="margin-left: 15px;" action="{{BASE_URL. 'admin/san-pham/edit-product'}}/<?= $model->id ?>" method="post" enctype="multipart/form-data">
    <div>
        <label for=""> Tên sản phẩm</label>
        <input class="form-control" type="text" value="{{$model->name}}"  name="name"> 
        <?php
            if (isset($err["name"]) && $err["name"]) {
                echo "<p style='color:red'>".$err["name"]."</p>";
            }
        ?>
    </div>

    <div>
        <label for="">Ảnh sản phẩm</label>
        <input class="form-control"  type="file" name="file">
    </div>

    <div>
         <br>
        <img width="150px" src="{{BASE_URL.$model->image}}" alt="">
        <br>
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
       <textarea class="form-control" name="short_desc" id="" cols="30" rows="10">{{$model->name}}</textarea>
    </div>

     
    <div>
        <label for=""> Gía sản phẩm</label>
        <input class="form-control" value="{{$model->price}}" type="text"  name="price">
    </div>
     <br>

    <div>
        <button class="btn btn-danger"  type="submit">Lưu lại</button>
    </div>

</form>
 
@endsection


 
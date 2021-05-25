@extends('layouts.main')
@section("title","Tạo mới danh mục")
@section('main-content')

<form action="" method="post">
    <div>
        <label for=""> Tên danh mục</label>
        <input type="text" class="form-control"  name="cate_name">
        <?php
            if (isset($err["cate_name"]) && $err["cate_name"]) {
                echo "<p style='color:red'>".$err["cate_name"]."</p>";
            }
        ?>
    </div>

    <div>
        <label for="">Mô tả</label>
       <textarea name="desc" class="form-control"  id="" cols="30" rows="10"></textarea>
       <?php
            if (isset($err["desc"]) && $err["desc"]) {
                echo "<p style='color:red'>".$err["desc"]."</p>";
            }
        ?>
    </div>

    <div>
        <label for=""> Hiển thị ở menu</label>
        <input  value="1"   type="checkbox" name="show_menu">
    </div>

    <div>
        <button  class="btn btn-info"  type="submit">Lưu lại</button>
    </div>

</form>
 
@endsection


 
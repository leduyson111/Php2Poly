@extends("layouts.main")
@section("title", 'Sửa danh mục')
@section("main-content")

<form action="" method="post">

    <div>
        <label for="">Tên danh mục</label>
        <input class="form-control"  type="text" name="cate_name" value="<?=$model->cate_name ?>">
    </div>
    <div>
        <label for="">Mô tả</label>
        <textarea class="form-control"  name="desc" cols="50" rows="5"><?= $model->desc ?></textarea>
    </div>
    <div>
        <label for="">Hiển thị ở menu?</label>
        <input type="checkbox"
            <?php if($model->show_menu == 1):?>
            checked
            <?php endif?>
            name="show_menu" value="1">
    </div>
    <div>
        <button class="btn btn-info" type="submit">Lưu</button>
    </div>
</form>
@endsection

@extends('layouts.main')
@section("title","Thêm đơn hàng")
@section('main-content')

<?php 
    $roles = [
        ['id' =>0 , 'name' => 'Tiền mặt'],
        ['id' =>1, 'name' =>'Chuyển khoản'],
    ];
?>


<form  action="{{BASE_URL.'admin/edit-order'}}/<?= $model->id ?>" method="post">
    <div class="form-group">
        <label for=""> Tên khách hàng:</label>
        <input class="form-control" type="text" value="{{$model->customer_name}}"  name="customer_name">
    </div>

    <div class="form-group">
        <label for=""> Email:</label>
        <input class="form-control" type="text" value="{{$model->customer_email}}"   name="customer_email">
    </div>

    <div class="form-group">
        <label for="">Số điện thoại:</label>
        <input class="form-control" type="text" value="{{$model->customer_phone_number}}"   name="customer_phone_number">
    </div>

    <div class="form-group ">
            <label >Thanh toán: </label>
            <select name="payment_method" >
                <?php foreach($roles as $role ): ?>
                <option value="<?php echo $role['id']  ?>"> <?= $role['name'] ?> </option>
                <?php endforeach ?>
            </select>
    </div>
    
    <div class="form-group">
        <label for="">Địa chỉ:</label>
    <textarea class="form-control"   name="customer_address" id="" cols="30" rows="10"> {{$model->customer_address}}</textarea>
    </div>
    
    <br>
    <div class="form-group">
        <button class="btn btn-danger"  type="submit">Lưu lại</button>
    </div>

</form>
 
@endsection


 
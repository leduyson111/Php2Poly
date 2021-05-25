@extends('layouts.main')
@section('title', 'Danh sách đơn hàng')
@section('main-content')
<table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">STT  </th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Ngày đặt hàng</th>
            <th scope="col">Xem chi tiết</th>
            <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
        <?php $num= 1; foreach($order as $ord){ ?>
            <tr>
                <td><?= $num++ ?></td>
                <td><?= $ord->customer_name ?></td>
                <td><?= $ord->customer_phone_number ?></td>
                <td><?= $ord->customer_address ?></td>
                <td><?= $ord->created_at ?></td>
                <td> <a href="{{BASE_URL.'/admin/order/order-detail/'}}{{$ord->id}}">Xem chi tiết đơn hàng</a>  <td>
                    <a href="{{BASE_URL.'/admin/order/edit-order/'}}{{$ord->id}}"  class = "btn btn-waring">Sửa</a>
                    <a href="{{BASE_URL.'/admin/order/delete-order/'}}{{$ord->id}}" onclick="return confirm('Bạn có chắc muốn xóa không')" class = "btn btn-danger">Xóa</a>
                </td>
            </tr>
           <?php } ?>
        </tbody>
        </table>
@endsection
 
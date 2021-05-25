@extends('layouts.main')
@section('title', 'Đơn hàng chi tiết')
@section('main-content')
 
<table class="table table-hover" style="width: 400px;">
        <thead>
            <tr>
                <th scope="col">Tên sản phẩm  </th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td > {{$product->name}}</td>
                </tr>
            @endforeach
           
        </tbody>
    </table>

    <table class="table table-hover" style="width: 500px;">
        <thead>
            <tr>
                <th scope="col">Đơn giá  </th>
                <th scope="col">Số lượng  </th>
                

            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            @foreach($details as $detail)
                <tr>
                    <td > {{$detail->unit_price}}</td>
                    <td > {{$detail->quantity}}</td>
                </tr>
                <?php  $total  += $detail->unit_price *   $detail->quantity ?>

            @endforeach
           
        </tbody>
    </table>

<div style="margin-left: 40px">
    <h6 style="color:red">Tổng tiền : <?= number_format($total) ?> VNĐ </h6>
</div>
@endsection
 
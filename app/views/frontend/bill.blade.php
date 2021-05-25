@extends('frontend.layouts.main')
@section('title',"Thông tin thanh toán")
@section('content')
<h3 style="text-align: center;padding-bottom:30px; color:red">Biên lai của bạn</h3>

<div style=" font-size: 15px; margin-left:150px; "  class="row">
    <div  class="well col-xs-10 col-sm-10 col-md-10 col-xs-offset-10 col-sm-offset-10 col-md-offset-10 ">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <address>
                    <strong>Full name: {{ $order->customer_name }}</strong>
                    <br>
                    Address: {{ $order->customer_address }}
                    <br>
                    Email: {{ $order->customer_email }}
                    <br>
                    <abbr >Phone:</abbr> {{ $order->customer_phone_number }}
                </address>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                <p>
                    <em>Date : {{ $order->created_at }}</em>
                </p>
               
            </div>
        </div>
        <div class="row">
            <div class="text-center">
                <h1>Receipt</h1>
            </div>
            </span>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Image </th>
                        <th>Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody>

                <?php $i = 0;
                
                // print_r($list_qty_product);
                // exit;
                
                ?>
                @foreach($products as $product)
                    <tr>
                        <td ><em>{{$product->name}}</em></h4></td>
                        <td  style="text-align: center"> <img width="150px" src="{{$product->image}}" alt="">  </td>
                        <td class=" text-center">${{number_format ($product->price) }}</td>
                        <td class=" text-center">   {{ $qtt =  $list_qty_product[$i++] }}  </td>
                         <td class=" text-center">${{ $qtt * $product->price  }}</td>
                    </tr>

                @endforeach
                    
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td class="text-right"><h4><strong>Total: </strong></h4></td>
                        <td class="text-center text-danger"><h4><strong>${{number_format ($order->total_price) }}</strong></h4></td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-bottom:60px; background-color: #00BBA6;" href="{{BASE_URL}}" class="btn btn-success btn-lg btn-block">
               Mua hàng tiếp<span class="glyphicon glyphicon-chevron-right"></span>
            </a></td>
        </div>
    </div>
</div>


@endsection


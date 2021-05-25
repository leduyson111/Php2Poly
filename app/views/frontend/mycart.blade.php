@extends('frontend.layouts.main')
@section("title","Giỏ hàng")
@section('content')

<div class="breadcrumbs_area">
        <div class="row">
<div class="col-12">
    <div class="breadcrumb_content">
        <ul>
            <li><a href="index.html">home</a></li>
            <li><i class="fa fa-angle-right"></i></li>
            <li>Shopping Cart</li>
        </ul>

    </div>
</div>
</div>
</div>
<div class="shopping_cart_area">

<form action="{{BASE_URL.'update-cart'}}" method="post"> 
        <div class="row">
            <div class="col-12">
                <div class="table_desc">
                    <div class="cart_page table-responsive">
                        <table>
                    <thead>
                        <tr>
                            <th class="product_remove">Delete</th>
                            <th class="product_thumb">Image</th>
                            <th class="product_name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product_quantity">Quantity</th>
                            <th class="product_total">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <?php 
                            $totalPrice =  0 ;

                        foreach($list_products as  $pr) { 
                            foreach($_SESSION['cart'][ $pr->id] as $carts){
                        ?>
                        <tr>
                            <td class="product_remove"><a href="{{BASE_URL.'delete-add'}}/<?= $pr->id ?>"><i class="fa fa-trash-o"></i></a></td>
                            <td class="product_thumb"><a href="#"><img src="{{BASE_URL.$pr->image}}" alt=""></a ></td>
                            <td class="product_name"><a href="#">{{$pr->name}}</a>  </td>
                            <td class="product-price">£ <?=  number_format( $pr->price) ?></td>
                            <td class="product_quantity"><input min="0" max="100" value="<?=  $carts; ?>" name="qty[<?= $pr->id ?>]" type="number"></td>
                            <td class="product_total">£ <?= number_format($pr->price *   $carts ) ?></td>
                        </td>
                        </tr>
                  <?php 
                    $totalPrice  += $pr->price *   $carts;
                } 

                } ?>
                    </tbody>
                </table>   
                    </div>  
                    <div class="cart_submit">
                        <button type="submit">update cart</button>
                    </div>      
                </div>
                </div>
            </div>
            <!--coupon code area start-->
        <div class="coupon_area">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                     
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code">
                        <h3>Cart Totals</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Subtotal</p>
                                <p class="cart_amount">£ <?= number_format( $totalPrice) ?></p>
                            </div>
                          
                            <div class="cart_subtotal">
                                <p>Total</p>
                                <p class="cart_amount">£ <?= number_format( $totalPrice) ?></p>
                            </div>
                            <div class="checkout_btn">
                                <a href="{{BASE_URL. 'checkout'}}">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--coupon code area end-->
    </form> 
</div>


@endsection
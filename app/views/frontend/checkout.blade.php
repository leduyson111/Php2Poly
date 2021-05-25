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
                    <li>checkout</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<div class="Checkout_section">
    <div class="checkout_form">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <form name="checkout" action="{{BASE_URL.'checkout'}}" method="post">
                        <h3>Billing Details</h3>
                        <div class="row">

                            <div class="col-lg-6 mb-30">
                                <label>Tên khách hàng <span>*</span></label>
                                <input type="text" placeholder="Tên khách hàng" name="customer_name">
                                <?php
                                    if (isset($err["customer_name"]) && $err["customer_name"]) {
                                        echo "<p style='color:red'>".$err["customer_name"]."</p>";
                                    }
                                ?>    
                            </div>
                            <div class="col-lg-6 mb-30">
                                <label>Địa chỉ Email  <span>*</span></label>
                                <input type="text" placeholder="Địa chỉ email" name="customer_email"> 
                                <?php
                                    if (isset($err["customer_email"]) && $err["customer_email"]) {
                                        echo "<p style='color:red'>".$err["customer_email"]."</p>";
                                    }
                                ?>   
                            </div>
                            <div class="col-12 mb-30">
                                <label>Số điện thoại <span>*</span> </label>
                                <input type="text" placeholder="Số điện thoại" name="customer_phone_number">     
                                <?php
                                    if (isset($err["customer_phone_number"]) && $err["customer_phone_number"]) {
                                        echo "<p style='color:red'>".$err["customer_phone_number"]."</p>";
                                    }
                                ?> 
                            </div>
                            <div class="col-12 mb-30">
                                <label for="payment_method">Hình thức thanh toán <span>*</span></label>
                                <select name="payment_method" id="payment_method"> 
                                    <option value="0">Thanh toán tiền mặt</option>    
                                    <option value="1">Chuyển khoản</option>   
                                </select>
                            </div>

                            <div class="col-12 mb-30">
                                <label>Địa chỉ khách hàng  <span>*</span></label>
                                <input placeholder="Địa chỉ khách hàng" name="customer_address" type="text">
                                <?php
                                    if (isset($err["customer_address"]) && $err["customer_address"]) {
                                        echo "<p style='color:red'>".$err["customer_address"]."</p>";
                                    }
                                ?>      
                            </div>
                         
                            <div class="col-12 mb-30">
                                <button type="submit" class="btn  btn-danger" >Đặt hàng</button>
                            </div>
                               	    	    	    	    	    	    
                        </div>
                    </form>    
                </div>
               
            </div> 
        </div>        
</div>

@endsection
@extends('frontend.layouts.main')
@section("title","Đăng nhập")
@section('content')
<div class="breadcrumbs_area">
    <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li>login</li>
                    </ul>

                </div>
            </div>
        </div>
</div>

<div class="customer_login">
    <div class="row">
                <!--login area start-->
                <div class="col-lg-7 col-md-7">
                    <div class="account_form">
                        <h2>login</h2>
                        <form action="{{BASE_URL . 'login'}}" method="post" >
                            <p>   
                                <label>Username or email <span>*</span></label>
                                <input type="text" name="email">
                                </p>
                                <p>   
                                <label>Passwords <span>*</span></label>
                                <input type="password" name="password">
                                </p>   
                            <div class="login_submit">
                                <button type="submit">login</button>
                                <a href="#">Lost your password?</a>
                            </div>
                        </form>
                        </div>    
                </div>
                <!--login area start-->

                <!--register area start-->
                
                <!--register area end-->
            </div>
</div>
@endsection
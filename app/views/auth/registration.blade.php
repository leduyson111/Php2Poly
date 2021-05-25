@extends('frontend.layouts.main')
@section("title","Đăng kí")
@section('content')
<div class="tab-pane fade active show" id="account-details">
    <h3>Registration </h3>
    <div class="login">
        <div class="login_form_container">
            <div class="account_login_form">
                <form action="{{BASE_URL . 'registration'}}" method="post" enctype="multipart/form-data">
                   
                    <label>Họ và tên</label>
                    <input type="text" name="name" placeholder="Họ và tên">

                    <label>Ảnh thành viên</label>
                    <input type="file" name="file">

                    <label>Email</label>
                    <input type="text" placeholder="Email" name="email">

                    <label>Mật khẩu </label>
                    <input type="password" placeholder="Mật khẩu" name="password">
                    
                    <div class="save_button primary_btn default_button">

                        <button  class="btn btn-danger" type="submit">Save</button>
                    </div>
                    <br><br>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
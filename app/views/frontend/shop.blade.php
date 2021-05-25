@extends('frontend.layouts.main')
@section("title","Sản phẩm")
@section('content')
<div class="featured_product">
            <div class="block_title">
                <h3>Sản phẩm của shop</h3>
            </div>
            <div class="row">
                <div class="product_active owl-carousel">
                @foreach($products as $product) 
                <div class="col-lg-3">
                
                    <div class="single_product">
                        <div class="product_thumb">
                            <a href="{{BASE_URL.'single-product'}}/<?= $product->id ?>"><img src="{{BASE_URL.$product->image}}" alt=""></a>
                            <div class="img_icone">
                                <img src="{{FRONTEND_URL}}img\cart\span-new.png" alt="">
                            </div>
                            <div class="product_action">
                                <a onclick="return confirm('Bạn chọn sản phẩm này thêm vào giỏ hàng ')" href="{{BASE_URL. 'mycart'}}/<?= $product->id ?>" href="#"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <span class="product_price">$50.00</span>
                            <h3 class="product_title"><a href="{{BASE_URL.'single-product'}}/<?= $product->id ?>"> {{  $product->name  }} </a></h3>
                        </div>
                        <div class="product_info">
                            <ul>
                                <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                            </ul>
                        </div>
                    </div>
                
                </div>
                @endforeach
                </div>
            </div>
        </div>

@endsection
@extends('frontend.layouts.main')
@section("title","Trang chủ")
@section('content')

<div class="row pos_home">
    <div class="col-lg-3 col-md-8 col-12">

    <div class="sidebar_widget catrgorie mb-35">
    <h3>Danh mục</h3>
    <ul>

    @foreach($category as $cate)
    @if($cate->show_menu == 1)
    <a style="color:#ffffff; padding: 7px 11px 5px 0; font-size:13px" href='{{ BASE_URL."category" }}/{{ $cate->id }} '> <li >{{ $cate->cate_name  }}   </li>  </a>  
      @endif
    @endforeach
 
    </ul>
    </div>
    <!--categorie menu end-->

    <!--wishlist block start-->

    <!--wishlist block end-->

    <!--newsletter block start-->
    <div class="sidebar_widget newsletter mb-35">
    <div class="block_title">
    <h3>newsletter</h3>
    </div>
    <form action="#">
    <p>Sign up for your newsletter</p>
    <input placeholder="Your email address" type="text">
    <button type="submit">Subscribe</button>
    </form>
    </div>
    <!--newsletter block end-->

    <!--sidebar banner-->
    <div class="sidebar_widget bottom ">
    <div class="banner_img">
    <a href="#"><img src="{{FRONTEND_URL}}img\banner\banner9.jpg" alt=""></a>
    </div>
    </div>
    <!--sidebar banner end-->

    </div>
    <div class="col-lg-9 col-md-12">

        <!--new product area start-->
    <div class="new_product_area">
        <div class="block_title">
            <h3>Sản phẩm mới</h3>
        </div>
        <div class="row">
            <div class="product_active owl-carousel">
            @foreach($products as $product) 
                <div class="col-lg-3">
                
                    <div class="single_product">
                        <div class="product_thumb">
                            <a href="{{BASE_URL.'single-product'}}/<?= $product->id ?>"><img src="{{$product->image}}" alt="{{$product->name}}"></a>
                            <div class="img_icone">
                                <img src="{{FRONTEND_URL}}img\cart\span-new.png" alt="">
                            </div>
                            <div class="product_action">
                                <a onclick="return confirm('Bạn chọn sản phẩm này thêm vào giỏ hàng ')" href="{{BASE_URL. 'mycart'}}/<?= $product->id ?>"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <span class="product_price">${{ number_format($product->price)}}</span>
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
        <!--new product area start-->


        <!--featured product start-->
        <div class="featured_product">
            <div class="block_title">
                <h3>Sản phẩm nổi bật</h3>
            </div>
            <div class="row">
                <div class="product_active owl-carousel">
                        
                @foreach($productPrice as $productss) 
                <div class="col-lg-3">
                
                    <div class="single_product">
                        <div class="product_thumb">
                            <a href="{{BASE_URL.'single-product'}}/<?= $productss->id ?>"><img src="{{$productss->image}}" alt=""></a>
                            <div class="img_icone">
                                <img src="{{FRONTEND_URL}}img\cart\span-hot.png" alt="">
                            </div>
                                <div class="product_action">
                                  <a onclick="return confirm('Bạn chọn sản phẩm này thêm vào giỏ hàng ')" href="{{BASE_URL.'mycart'}}/<?= $productss->id ?>"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a> 
                                </div>
                        
                         
                        </div>
                      
                        <div class="product_content">
                            <span class="product_price">${{ number_format($productss->price)}}</span>
                            <h3 class="product_title"><a href="{{BASE_URL.'single-product'}}/<?= $productss->id ?>"> {{  $product->name  }} </a></h3>
                        </div>
                        <div class="product_info">
                            <ul>
                                <li><a href="" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view">View Detail</a></li>
                            </ul>
                        </div>
                    </div>
                
                </div>
            @endforeach
                </div>
            </div>
        </div>
        <!--featured product end-->

    </div>

    </div>


@endsection

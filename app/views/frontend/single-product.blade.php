@extends('frontend.layouts.main')
@section('title',"Chi tiết sản phẩm")
@section('content')
<div class="product_details">
<div class="row">
    <div class="col-lg-5 col-md-6">
        <div class="product_tab fix"> 
            <div class="product_tab_button">    
                <ul class="nav" role="tablist">
                @foreach ($model->galleries as $proImg)
                    <li >
                        <a class="active"  data-toggle="tab" href="#p_tab1" role="tab" aria-controls="{{$model->name}}" aria-selected="false"><img src="{{$proImg->img_url}}" alt="{{$model->name}}"></a>
                    </li>                           
                @endforeach

                </ul>
            </div> 
            <div class="tab-content produc_tab_c">
        
                <div class="tab-pane fade show active" id="{{$model->name}}" role="tabpanel" >
                    <div class="modal_img">
                        <a href="#"><img src="{{BASE_URL.$model->image}}" alt="{{$model->name}}"></a>
                        <div class="img_icone">
                            <img src="{{FRONTEND_URL}}img/cart/span-new.png" alt="">
                        </div>
                        <div class="view_img">
                            <a class="large_view" href="{{$model->image}}"><i class="fa fa-search-plus"></i></a>
                        </div>    
                    </div>
                </div>
         
                 
            </div>

        </div> 
    </div>
    <div class="col-lg-7 col-md-6">
        <div class="product_d_right">
            <h1>{{$model->name}}</h1>
                <div class="product_ratting mb-10">
                <ul>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                    <li><a href="#"> Write a review </a></li>
                </ul>
            </div>
            <div class="product_desc">
                <p>{{$model->short_desc}}</p>
            </div>

            <div class="content_price mb-15">
                <span>${{ number_format($model->price)}}</span>
                <span class="old-price">$130.00</span>
            </div>
            <div class="box_quantity mb-20">
                <form action="{{BASE_URL.'update-cart-qty'}}" method="post">
                    <label>quantity</label>
                    <input min="0" max="100" value="1" name="qty[<?= $model->id ?>]" type="number">
                    <button type="submit"  ><i class="fa fa-shopping-cart"></i> add to cart</button>
                </form> 
                
            </div>
                

            
            <div class="product_stock mb-20">
                <p>299 items</p>
                <span> In stock </span>
            </div>
            <div class="wishlist-share">
                <h4>Share on:</h4>
                <ul>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>           
                    <li><a href="#"><i class="fa fa-vimeo"></i></a></li>           
                    <li><a href="#"><i class="fa fa-tumblr"></i></a></li>           
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>        
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>        
                </ul>      
            </div>

        </div>
    </div>
</div>
</div>
<div class="new_product_area product_page">
    <div class="row">
        <div class="col-12">
            <div class="block_title">
                <h3> Related Products</h3>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="single_p_active owl-carousel">
          
          @foreach($productRandom as $product)
            <div class="col-lg-3">
                <div class="single_product">
                    <div class="product_thumb">
                        <a href="{{BASE_URL.'single-product/'}}<?= $product->id ?>"><img src="{{BASE_URL.$product->image}}" alt="{{$product->name}}"></a>
                        <div class="hot_img">
                            <img src="{{FRONTEND_URL}}img\cart\span-new.png" alt="">
                        </div>
                        <div class="product_action">
                            <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                    <div class="product_content">
                        <span class="product_price">${{ number_format($product->price) }}   </span>
                        <h3 class="product_title"><a href="{{BASE_URL.'single-product/'}}<?= $product->id ?>">{{$product->name  }}      </a></h3>
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
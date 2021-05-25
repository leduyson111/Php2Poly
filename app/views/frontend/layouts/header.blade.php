<div class="header_area">
<!--header top-->
    <div class="header_top">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="switcher">
                    <ul>
                        <li class="languages">
                            <a href="#"><img src="{{FRONTEND_URL}}img\logo\fontlogo.jpg" alt=""> English <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown_languages">
                                <li>
                                    <a href="#"><img src="{{FRONTEND_URL}}img\logo\fontlogo.jpg" alt=""> English</a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{FRONTEND_URL}}img\logo\fontlogo2.jpg" alt=""> French </a>
                                </li>
                            </ul>
                        </li>

                        <li class="currency"><a href="#"> Currency : $ <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown_currency">
                                <li><a href="#"> Dollar (USD)</a></li>
                                <li><a href="#"> Euro (EUR)  </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="header_links">
                    <ul>
                   
                        <li><a href="{{BASE_URL. 'admin'}}" title="wishlist">Quản trị viên</a></li>
                        <li><a href="{{BASE_URL. 'mycart'}}" title="My cart">My cart</a></li>
                        <li><a href="{{BASE_URL. 'registration'}}" title="Registration">Registration</a></li>

                        <?php 
                        if(!empty($_SESSION[AUTH])){   ?>
                            <li><a href="{{BASE_URL. 'logout'}}" title="My account">Logout</a></li>
                        <?php   }else{ ?>
                        <li><a href="{{BASE_URL. 'login'}}" title="Login">Login</a></li>
                        <?php   }  ?>

                      
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--header top end-->

    <!--header middel-->
    <div class="header_middel">
        <div class="row align-items-center">
            <!--logo start-->
            <div class="col-lg-3 col-md-3">
                <div class="logo">
                    <a href="{{ BASE_URL  }} "><img src="{{FRONTEND_URL}}img\logo\logo.jpg.png" alt=""></a>
                </div>
            </div>
            <!--logo end-->
            <div class="col-lg-9 col-md-9">
                <div class="header_right_info">
                    <div class="search_bar">
                        <form action="" method="get">
                            <input name="keyword" 
                            @isset($_GET['keyword'])
                            value="{{$_GET['keyword']}}"
                            @endisset
                             placeholder="Search..." type="text">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    
                    <div class="shopping_cart">
                    <?php 
                         @$totalq = 0;
                         @$carts  =  $_SESSION['cart'];

                         if (!empty($carts)) {
                             foreach ($carts as $key => $value) {
                                 $value['qty'] ;
                                 $totalq += $value['qty'];
                             }
                         }
                    ?>
                        <a href="{{BASE_URL. 'mycart'}}"><i class="fa fa-shopping-cart"></i>   {{  $totalq }} Sản phẩm </a>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->
    <div class="header_bottom">
        <div class="row">
            <div class="col-12">
                <div class="main_menu_inner">
                    <div class="main_menu d-none d-lg-block">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{BASE_URL}}">Home</a></li>
                                <li><a href="{{BASE_URL .'shop'}}">shop</a> </li>
                                <li><a href="#">women</a> </li>
                                <li><a href="#">men</a> </li>
                                <li><a href="#">pages</a> </li>
                                <li><a href="#">blog</a> </li>
                                <li><a href="#">contact us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
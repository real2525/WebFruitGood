<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fruit | Fruit </title>

    <!-- Google Font -->
   <!-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet"-->

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" type="text/css">

    
</head>

<body>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@quang.com</li>
                                <li>Free Shipping khi mua trên 500k</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
                                <a href="https://www.pinterest.com/"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <image src="{{URL::to('public/frontend/image/language.png')}}" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                {{-- kiểm tra id khách hàng nếu chưa bắt đăng nhập --}}
                                <?php
                                    $customer_id = Session::get('customer_id');
                                    if ($customer_id != NULL) {

                                        ?>
                                        <a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-user"></i>Đăng Xuất</a>
                                        <?php
                                    }else{
                                        ?>

                                        <a href="{{URL::to('/login-checkout')}}"><i class="fa fa-user"></i>Đăng Nhập</a>
                                        <?php 
                                    }      
                                        ?>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="{{-- header__logo --}}">
                        <a href="{{URL::to('/trang-chu')}}"><image style="width: 650px;height: 120px;margin-left: 5px;" src="{{URL::to('public/frontend/image/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{URL::to('/trang-chu')}}">Trang Chủ</a></li>
                            <li><a href="#">Các Trang</a>
                                <ul class="header__menu__dropdown">
                                    <?php
                                    $customer_id = Session::get('customer_id');
                                    if ($customer_id != NULL) {

                                        ?>
                                        <li><a href="{{URL::to('/show-cart')}}">Giở Hàng</a></li>
                                        <?php
                                    }else{
                                        ?>

                                        <li><a href="{{URL::to('/login-checkout')}}">Giở Hàng</a></li>
                                        <?php 
                                    }      
                                        ?>
                                    
                                     <?php
                                    $customer_id = Session::get('customer_id');
                                    $shipping_id = Session::get('shipping_id');
                                    if ($customer_id != NULL && $shipping_id ==NULL ) {

                                        ?>
                                        <li><a href="{{URL::to('/checkout')}}">Thanh Toán</a></li>
                                        <?php
                                    }elseif($customer_id != NULL && $shipping_id !=NULL ){
                                        ?>
                                        <li><a href="{{URL::to('/payment')}}">Thanh Toán</a></li>
                                        <?php 
                                    }else{      
                                        ?>
                                    <li><a href="{{URL::to('/login-checkout')}}">Thanh Toán</a></li>
                                    <?php
                                    }
                                    ?>
                                    <li><a href="{{URL::to('/admin')}}">Quản Lý</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Tin Tức</a></li>
                            <li><a href="./contact.html">Liên hệ</a></li>

                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            {{-- kiểm tra id khách hàng nếu chưa bắt đăng nhập --}}
                             <?php
                                    $customer_id = Session::get('customer_id');
                                    if ($customer_id != NULL) {

                                        ?>
                                        <li><a href="#"><i class="fa fa-heart"></i> <span></span></a></li>
                                        <li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-bag"></i> <span></span></a></li>
                                        <?php
                                    }else{
                                        ?>

                                        <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-heart"></i> <span></span></a></li>
                                        <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-shopping-bag"></i> <span></span></a></li>
                                        <?php 
                                    }      
                                        ?>

                        </ul>
                        <div class="header__cart__price">Tiền hàng: <span>{{Cart::subtotal(0).' '.'VNĐ'}}</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Sản Phẩm</span>
                        </div>
                        @foreach($category as $key =>$cate)
                            <ul>
                                <li><a href="{{URL::to('danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                            </ul>
                        @endforeach
                    </div>
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Thương Hiệu</span>
                        </div>
                        @foreach($brand as $key =>$brand)
                            <ul>
                                <li><a href="{{URL::to('thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>
                            </ul>
                        @endforeach
                    </div>
                </div>


                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{URL::to('/tim-kiem')}}" method="POST">
                                {{csrf_field()}}
                                <input type="text" placeholder="Nhập Thứ Bạn Cần Tìm?" name="keywords_submit">
                                <button name="seach_items" type="submit" class="site-btn">Tìm</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="{{URL::to('public/frontend/image/hero/banner.jpg')}}">
                        <div class="hero__text">
                            <span></span>
                            <h2></h2>
                            <p></p>
                            <br><br><br><br>
                            <a href="{{URL::to('/trang-chu')}}" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    {{-- <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{('public/frontend/image/categories/cat-1.jpg')}}">
                            <h5><a href="#">Trái Cây Khô</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{('public/frontend/image/categories/cat-2.jpg')}}">
                            <h5><a href="#">Trái Cây Miền Tây</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{('public/frontend/image/categories/cat-3.jpg')}}">
                            <h5><a href="#">Trái Cây Miền Nam</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{('public/frontend/image/categories/cat-4.jpg')}}">
                            <h5><a href="#">Trái Cây Miền Bắc</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{('public/frontend/image/categories/cat-5.jpg')}}">
                            <h5><a href="#">Trái Cây Văn Phòng</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Categories Section End -->
    <!-- Featured Section Begin -->

    @yield('content')
  <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <a href="#"><image width="500" height="250" href="#" src="{{URL::to('public/frontend/image/banner/banner-1.jpg')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <a href="#"><image width="500" height="250" src="{{URL::to('public/frontend/image/banner/banner-2.jpg')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
   {{--  <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản Phẩm Mới Nhất</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <image src="{{URL::to('public/frontend/image/latest-product/lp-1.jpg')}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <image src="{{URL::to('public/frontend/image/latest-product/lp-1.jpg')}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản Phẩm Top</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <image src="{{URL::to('public/frontend/image/latest-product/lp-1.jpg')}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <image src="{{URL::to('public/frontend/image/latest-product/lp-1.jpg')}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Đánh Giá Sản Phẩm</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <image src="{{URL::to('public/frontend/image/latest-product/lp-1.jpg')}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <image src="{{URL::to('public/frontend/image/latest-product/lp-1.jpg')}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    
    <!-- Blog Section End -->
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{URL::to('/trang-chu')}}"><image width="100" height="100" src="{{URL::to('public/frontend/image/logo.png')}}" alt=""></a>
                        </div>
                        <ul>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@quang.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Liên Kết Hữu Ích</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Tham Gia Với Chúng Tôi</h6>
                        <p>Để Lại Địa Chỉ E-mail của bạn để nhận thông báo về sản phẩm mới nhất</p>
                        <form action="#">
                            <input type="text" placeholder="Nhập E-mail của bạn">
                            <button type="submit" class="site-btn">Đăng Ký</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.linkedin.com"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.pinterest.com"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('public/frontend/js/mixitup.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>



</body>

</html>
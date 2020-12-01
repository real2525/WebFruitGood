@extends('layout')
@section('content')
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản Phẩm Nổi Bậc</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($all_product as $key => $product)
                <div class="col-lg-4 col-md-4 col-sm-6 mix">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{URL::to('public/upload/product/'.$product->product_image)}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}"><i class="fa fa-bookmark"></i></a></li>
                                 <?php
                                    $customer_id = Session::get('customer_id');
                                    if ($customer_id != NULL) {

                                        ?>
                                        <li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i></a></li>
                                        <?php
                                    }else{
                                        ?>
                                        <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-shopping-cart"></i></a></li>
                                        <?php 
                                    }      
                                        ?>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{($product->product_name)}}</a></h6>
                            <h5>{{number_format($product->product_price).' '.'VNĐ'}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- Featured Section End -->

  
@endsection
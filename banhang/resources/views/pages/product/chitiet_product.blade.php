@extends('layout')
@section('content')
<!-- Product Details Section Begin -->
    @foreach($chitiet_product as $key => $value)
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{URL::to('public/upload/product/'.$value->product_image)}}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="{{URL::to('public/frontend/image/product/details/product-details-2.jpg')}}"
                                src="{{URL::to('public/frontend/image/product/details/thumb-1.jpg')}}" alt="">
                            <img data-imgbigurl="{{('public/frontend/image/product/details/product-details-3.jpg')}}"
                                src="{{URL::to('public/frontend/image/product/details/thumb-2.jpg')}}" alt="">
                            <img data-imgbigurl="{{URL::to('public/frontend/image/product/details/product-details-5.jpg')}}"
                                src="{{URL::to('public/frontend/image/product/details/thumb-3.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{($value->product_name)}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>


                        <form action="{{URL::to('/save-cart')}}" method="POST">
                            {{csrf_field()}}
                            <div class="product__details__price">{{number_format($value->product_price).' '.'VNĐ'}}</div>
                            <p>{{($value->product_desc)}}</p>
                            <div class="buttons_added">
                              <input class="minus is-form" type="button" value="-"/>
                              <input name="qty" class="input-qty" max="99" min="1" type="number" value="1"/>
                              <input type="hidden" name="productid_hidden" value="{{$value->product_id}}"/>
                              <input class="plus is-form" type="button" value="+"/>
                            </div>
                            <button type="submit" class="primary-btn">Thêm Vào Giỏ</button>
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>

                        </form>

                        




                        <ul>
                            <li><b>Tình Trạng:</b> <span>Còn Hàng</span></li>
                            <li><b>Mã Sản Phẩm:</b> <span>{{($value->product_id)}}</span></li>
                            <li><b>Danh Mục:</b> <span>{{($value->category_name)}}</span></li>
                             <li><b>Thương Hiệu:</b> <span>{{($value->brand_name)}}</span></li>
                            <li><b>Chia Sẻ:</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Mô Tả</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Đánh Giá <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Thông Tin Sản Phẩm</h6>
                                    <p>{!!$value->product_content!!}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Các Đánh Giá</h6>
                                    <p>Quá Ngon</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản Phẩm Liên Quan</h2>
                    </div>
                </div>
                <div class="categories__slider owl-carousel">
                    @foreach($related_product as $key => $lienquan)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{URL::to('public/upload/product/'.$lienquan->product_image)}}">
                            <h5><a href="{{URL::to('chi-tiet-san-pham/'.$lienquan->product_id)}}">{{($lienquan->product_name)}}</a></h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

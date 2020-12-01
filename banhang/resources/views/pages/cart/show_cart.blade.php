@extends('layout')
@section('content')
 <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                     <div class="section-title related__product__title">
                        <h2>Giỏ Hàng</h2>
                     </div>
                    <div class="shoping__cart__table">
                        {{-- lấy ra những gì đã thềm vào giỏ hàng --}}
                        <?php
                        $content = Cart::content();
                        
                        ?>
                        {{--  --}}
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản Phẩm</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng Giá</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($content as $v_content)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{URL::to('public/upload/product/'.$v_content->options->image)}}" width="50px" alt="">
                                        <h5>{{($v_content->name)}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{number_format($v_content->price).' '.'VNĐ'}}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <form action="{{URL::to('/update-cart')}}" method="POST">
                                            {{csrf_field()}}
                                            <div class="buttons_added">
                                              <input class="minus is-form" type="button" value="-"/>

                                              <input name="cart_quantity" class="input-qty" max="99" min="1" type="number" value="{{$v_content->qty}}"/>

                                              <input type="hidden" name="rowId_cart" value="{{$v_content->rowId}}" />


                                              <input class="plus is-form" type="button" value="+"/>
                                            <input class="site-btn" type="submit" name="update_qty" value="Cập Nhập">
                                            </div>
                                        </form>
                                        
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?php
                                        $subtotal = $v_content->price *$v_content->qty;
                                        echo number_format($subtotal).' '.'VNĐ'
                                        ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a class="icon_close" href="{{URL::to('/delete-cart/'.$v_content->rowId)}}"></a> 
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{URL::to('/trang-chu')}}" class="primary-btn cart-btn">Tiếp Tục Mua Sắm</a>
                    </div>
                </form>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Mã Khuyến Mãi</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">Nhập</button>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Tổng Tiền Giỏ Hàng</h5>
                        <ul>
                            <li>Sản Phẩm<span>{{Cart::subtotal(0).' '.'VNĐ'}}</span></li>
                        </ul>
                        <ul>
                            <li>Phí Ship<span>0</span></li>
                        </ul>
                        <ul>
                            <li>Thuế<span>{{Cart::discount(0)}}</span></li>
                        </ul>
                        <ul>
                            <li>Mã Giảm Giá<span>không</span></li>
                        </ul>
                        <ul>
                            <li>Tổng Cộng<span>{{Cart::subtotal(0).' '.'VNĐ'}}</span></li>
                        </ul>
                        {{-- kiểm tra id khách hàng nếu chưa bắt đăng nhập --}}
                        <?php
                                    $customer_id = Session::get('customer_id');
                                    if ($customer_id != NULL) {

                                        ?>
                                        <a href="{{URL::to('/checkout')}}" class="primary-btn">Xác Nhận</a>
                                        <?php
                                    }else{
                                        ?>

                                        <a href="{{URL::to('/login-checkout')}}" class="primary-btn">Xác Nhận</a>
                                        <?php 
                                    }      
                                        ?>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
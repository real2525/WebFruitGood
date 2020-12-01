@extends('layout')
@section('content')
<!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Thanh Toán Giỏ Hàng</h2>
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
                        <div class="row">
                            <h3 style="margin-top: 20px;">Chọn hình thức thanh toán</h3>
                                <div class="checkout__input__checkbox">
                                    <form action="{{URL::to('/order-place')}}" method="POST">
                                        {{csrf_field()}}
                                            <label for="payment">
                                                Thanh toán bằng ATM
                                                <input type="checkbox" id="payment" name="payment_option" value="1">
                                                
                                                <img src="{{asset('public/frontend/image/payment2.png')}}" width="30px" height="30px">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="checkout__input__checkbox">
                                            <label for="paypal">
                                                Thanh toán khi nhận hàng
                                                <input type="checkbox" id="paypal" name="payment_option" value="2">

                                                <img src="{{asset('public/frontend/image/payment1.png')}}" width="30px" height="30px">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <input style="margin-top: 35px; margin-left: 20px; width: 100px;height: 50px" class="site-btn" type="submit" name="sent_order_place" value="Đặt hàng">
                                    </form>
                                    <div class="shoping__cart__btns">
                                        <a href="{{URL::to('/trang-chu')}}" class="primary-btn cart-btn">Tiếp Tục Mua Sắm</a>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
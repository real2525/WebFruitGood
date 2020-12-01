@extends('admin_layout')
@section('admin_content')
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
          <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Liệt Kê Đơn Hàng</h5>
                    <span class="label">
                         <?php
                                $message = Session::get('message');
                                if ($message) {
                                   echo '<span class="" >'.$message.'</span>';
                                   Session::put('message',null);
                                }
                         ?>
                    </span>
                  </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                      <thead>
                        <tr>
                          <th>Tên Người Đặt</th>
                          <th>Tổng Giá Tiền</th>
                          <th>Tình Trạng</th>
                          <th>Hiển Thị</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($all_order as $key => $order)
                        <tr class="gradeX">
                          <td>{{$order->customer_name}}</td>
                          <td>{{$order->order_total}}</td>
                          <td>{{$order->order_status}}</td>
                          <td class="taskOptions">
                            <a href="{{URL::to('/view-order',$order->order_id)}}" class="tip-top" data-original-title="Update"><i class="icon-ok"></i></a>
                            <a href="{{URL::to('/delete-order',$order->order_id)}}" onclick="return confirm('Bạn Có Muốn Xoá?')" class="tip-top" data-original-title="Delete"><i class="icon-remove"></i></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
          </div>
        </div>
      </div>
    </div>
<!--js phân trang tìm kiếm-->

<script src="{{asset('public/backend/js/jquery.min.js')}}"></script> 
<script src="{{asset('public/backend/js/matrix.tables.js')}}"></script>
@endsection
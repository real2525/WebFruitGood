@extends('admin_layout')
@section('admin_content')
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
          <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Liệt Kê Danh Mục Sản Phẩm</h5>
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
                          <th>Tên Danh Mục</th>
                          <th>Hiển Thị</th>
                          <th>Mô Tả</th>
                          <th style="width:50px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($all_category_product as $key => $cate_pro)
                        <tr class="gradeX">
                          <td>{{$cate_pro->category_name}}</td>
                          <td>
                            <?php
                              if($cate_pro->category_status==0)
                              {
                              ?>
                                <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><span class="fa-eye-styling fa fa-eye-slash"></span></a>
                              <?php 
                              }else{
                              ?>
                                  <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"><span class="fa-eye-styling fa fa-eye" ></span></a>
                              <?php
                                  }
                              ?>
                          </td>
                          <td>{{$cate_pro->category_desc}}</td>
                          <td class="taskOptions">
                            <a href="{{URL::to('/edit-category-product',$cate_pro->category_id)}}" class="tip-top" data-original-title="Update"><i class="icon-ok"></i></a>
                            <a href="{{URL::to('/delete-category-product',$cate_pro->category_id)}}" onclick="return confirm('Bạn Có Muốn Xoá?')" class="tip-top" data-original-title="Delete"><i class="icon-remove"></i></a></td>
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
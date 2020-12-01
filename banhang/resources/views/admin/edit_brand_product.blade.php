@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Cập Nhập Thương Hiệu Sản Phẩm</h5>
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
        @foreach($edit_brand_product as $key => $edit_value)
        <div class="widget-content nopadding">
          <form action="{{URL::to('/update-brand-product',$edit_value->brand_id)}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="control-group">
              <label class="control-label">Tên Thương Hiệu :</label>
              <div class="controls">
                <input type="text" name="brand_product_name" required="" value="{{$edit_value->brand_name}}"  class="span11" placeholder="Nhập Tên Danh Mục Sản Phẩm"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mô Tả Thương Hiệu :</label>
              <div class="controls">
                 <textarea style="resize: none;" name="brand_product_desc" class="span11" required="" rows="6" placeholder="Nhập Mô Tả Danh Mục">{{$edit_value->brand_desc}}</textarea>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="update_brand_product" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
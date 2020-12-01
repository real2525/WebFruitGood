@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Cập Nhập Danh Mục Sản Phẩm</h5>
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
        @foreach($edit_category_product as $key => $edit_value)
        <div class="widget-content nopadding">
          <form action="{{URL::to('/update-category-product',$edit_value->category_id)}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="control-group">
              <label class="control-label">Tên Danh Mục :</label>
              <div class="controls">
                <input type="text" name="category_product_name" required="" value="{{$edit_value->category_name}}"  class="span11" placeholder="Nhập Tên Danh Mục Sản Phẩm"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mô Tả Danh Mục :</label>
              <div class="controls">
                 <textarea style="resize: none;" name="category_product_desc" required="" class="span11" rows="6" placeholder="Nhập Mô Tả Danh Mục">{{$edit_value->category_desc}}</textarea>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="update_category_product" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
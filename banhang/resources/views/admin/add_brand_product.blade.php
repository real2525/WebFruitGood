@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thêm Thương Hiệu Sản Phẩm</h5>
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
        <div class="col-md-12">
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
        </div>
        <div class="widget-content nopadding">
          <form action="{{URL::to('/save-brand-product')}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="control-group">
              <label class="control-label">Tên Thương Hiệu :</label>
              <div class="controls">
                <input data-validation="length" data-validation-length="min3" data-validation-error-msg="nhập ít nhất 3 ký tự" type="text" name="brand_product_name" class="span11" placeholder="Nhập Tên Danh Mục Sản Phẩm"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mô Tả Thương Hiệu :</label>
              <div class="controls">
                 <textarea style="resize: none;" name="brand_product_desc" class="span11" rows="6" placeholder="Nhập Mô Tả Danh Mục"></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Hiện Ẩn</label>
              <div class="controls">
                <select name="brand_product_status" >
                  <option value="0">Ẩn</option>
                  <option value="1">Hiện</option>
                </select>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="add_brand_product" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thêm Sản Phẩm</h5>
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
          <form action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{csrf_field()}}
            <div class="control-group">
              <label class="control-label">Tên Sản Phẩm :</label>
              <div class="controls">
                <input type="text" name="product_name" class="span11" placeholder="Nhập Tên Sản Phẩm"/>
              </div>
            <div class="control-group">
              <label class="control-label">Giá Sản Phẩm :</label>
              <div class="controls">
                <div class="input-append">
                  <input type="text" name="product_price" placeholder="500.000" class="span11">
                  <span class="add-on">VNĐ</span> </div>
                </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Hình Ảnh Sản Phẩm :</label>
              <div class="controls">
                <input type="file" name="product_image" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mô Tả Sản Phẩm :</label>
              <div class="controls">
                 <textarea style="resize: none;" name="product_desc" class="span11" rows="6" placeholder="Mô Tả Sản Phẩm"></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nội Dung Sản Phẩm :</label>
              <div class="controls">
                 <textarea name="product_content" id="ckeditor1" class="" rows="6" placeholder="Nhập Nội Dung Sản Phẩm"></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Danh Mục Sản Phẩm :</label>
              <div class="controls">
                <select name="product_cate" >
                  @foreach($cate_product as $key =>$cate_product)
                    <option value="{{($cate_product->category_id)}}">{{($cate_product->category_name)}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Thương hiệu</label>
              <div class="controls">
                <select name="product_brand" >
                  @foreach($brand_product as $key =>$brand_product)
                    <option value="{{($brand_product->brand_id)}}">{{($brand_product->brand_name)}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Hiện Ẩn</label>
              <div class="controls">
                <select name="product_status" >
                  <option value="0">Ẩn</option>
                  <option value="1">Hiện</option>
                </select>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="add_product" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
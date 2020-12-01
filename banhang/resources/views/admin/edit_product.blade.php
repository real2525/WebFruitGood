@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Cập Nhập Sản Phẩm</h5>
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
          @foreach($edit_product as $key => $pro)
          <form action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{csrf_field()}}
            <div class="control-group">
              <label class="control-label">Tên Sản Phẩm :</label>
              <div class="controls">
                <input type="text" name="product_name" required="" class="span11" value="{{($pro->product_name)}}" />
              </div>
            <div class="control-group">
              <label class="control-label">Giá Sản Phẩm :</label>
              <div class="controls">
                <div class="input-append">
                  <input type="text" name="product_price" required="" value="{{($pro->product_price)}}" class="span11">
                  <span class="add-on">VNĐ</span> </div>
                </div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Hình Ảnh Sản Phẩm :</label>
              <div class="controls">
                <input type="file" name="product_image" required="" />
                <img src="{{URL::to('public/upload/product/'.$pro->product_image)}}" width="100" height="100">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mô Tả Sản Phẩm :</label>
              <div class="controls">
                 <textarea style="resize: none;" name="product_desc" class="span11" required="" rows="6" >{{($pro->product_desc)}}</textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nội Dung Sản Phẩm :</label>
              <div class="controls">
                 <textarea name="product_content" id="ckeditor1" class="span11" required="" rows="12">{{($pro->product_content)}}</textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Danh Mục Sản Phẩm :</label>
              <div class="controls">
                <select name="product_cate" >
                  @foreach($cate_product as $key =>$cate)
                    @if($cate->category_id == $pro->category_id)
                    <option selected value="{{($cate->category_id)}}">{{($cate->category_name)}}</option>
                    @else
                    <option value="{{($cate->category_id)}}">{{($cate->category_name)}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Thương hiệu</label>
              <div class="controls">
                <select name="product_brand" >
                  @foreach($brand_product as $key =>$brand)
                    @if($brand->brand_id == $pro->brand_id)
                    <option selected value="{{($brand->brand_id)}}">{{($brand->brand_name)}}</option>
                    @else
                    <option value="{{($brand->brand_id)}}">{{($brand->brand_name)}}</option>
                    @endif
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
            @endforeach
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
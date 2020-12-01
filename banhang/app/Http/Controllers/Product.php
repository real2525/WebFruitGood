<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\AddProductRequests;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
use Illuminate\Foundation\Http\FormRequest;

session_start();
class Product extends Controller
{

    /*kiểm tra nếu admin mới cho truy cập*/
    public function AuthenLogin(){
        $admin_id =Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        }else 
            return Redirect::to('admin')->send();

    }

    public function add_product (){
        $this->AuthenLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
    public function all_product (){
        $this->AuthenLogin();
        //lấy ra sản phẩm thuộc danh mục nào và thương hiệu nào
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();
        $manager_product = view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);
    }
    public function save_product (AddProductRequests $request){
        $this->AuthenLogin();
        $data = array();
        $data ['product_name'] = $request->product_name;
        $data ['product_price'] = $request->product_price;
        $data ['product_desc'] = $request->product_desc;
        $data ['product_content'] = $request->product_content;
        $data ['category_id'] = $request->product_cate;
        $data ['brand_id'] = $request->product_brand;
        $data ['product_status'] = $request->product_status;
        $get_image =$request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image; 
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm thành công');
            return Redirect::to('all-product');        
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm thất bại');
        return Redirect::to('all-product');
    }

    public function unactive_product ($product_id){
        $this->AuthenLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Hiện Sản Phẩm Thành Công');
        return Redirect::to('all-product');
    }
    public function active_product ($product_id){
        $this->AuthenLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Ẩn Sản Phẩm Thành Công');
        return Redirect::to('all-product');
    }


    public function edit_product($product_id){
        $this->AuthenLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)
        ->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }


    public function update_product(Request $request ,$product_id){
        $this->AuthenLogin();
        $data = array();
        $data ['product_name'] = $request->product_name;
        $data ['product_price'] = $request->product_price;
        $data ['product_desc'] = $request->product_desc;
        $data ['product_content'] = $request->product_content;
        $data ['category_id'] = $request->product_cate;
        $data ['brand_id'] = $request->product_brand;
        $data ['product_status'] = $request->product_status;
        $get_image =$request->file('product_image');
        
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image; 
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhập sản phẩm thành công');
            return Redirect::to('all-product');        
        }
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhập sản phẩm thất bại');
        return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        $this->AuthenLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xoá sản phẩm thành công');
        return Redirect::to('all-product');
    }


    //end function admin page
    public function chi_tiet($product_id){
        $cate_product  = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $chitiet_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')->where('tbl_product.product_id',$product_id)->get();
        foreach ($chitiet_product as $key => $value) {
            $category_id =$value->category_id;
        }

        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();
        return view('pages.product.chitiet_product')->with('category',$cate_product)->with('brand',$brand_product)->with('chitiet_product',$chitiet_product)->with('related_product',$related_product);
    }
}
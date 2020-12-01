<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\AddBrandRequests;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();
class BrandProduct extends Controller
{
    /*kiểm tra nếu admin mới cho truy cập*/
    public function AuthenLogin(){
        $admin_id =Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        }else 
            return Redirect::to('admin')->send();

    }

    public function add_brand_product (){
        $this->AuthenLogin();
        return view('admin.add_brand_product');
    }
    public function all_brand_product (){
        $this->AuthenLogin();
        $all_brand_product = DB::table('tbl_brand_product')->get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }
    public function save_brand_product (AddBrandRequests $request){
        $this->AuthenLogin();
        $data = array();
        $data ['brand_name'] = $request->brand_product_name;
        $data ['brand_desc'] = $request->brand_product_desc;
        $data ['brand_status'] = $request->brand_product_status;
        DB::table('tbl_brand_product')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('add-brand-product');
    }

    public function unactive_brand_product ($brand_product_id){
        $this->AuthenLogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        Session::put('message','Hiện Thương Hiệu Thành Công');
        return Redirect::to('all-brand-product');
    }
    public function active_brand_product ($brand_product_id){
        $this->AuthenLogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        Session::put('message','Ẩn Thương Hiệu Thành Công');
        return Redirect::to('all-brand-product');
    }


    public function edit_brand_product($brand_product_id){
        $this->AuthenLogin();
        $edit_brand_product = DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
    }


    public function update_brand_product(Request $request,$brand_product_id){
        $this->AuthenLogin();
        $data = array();
        $data ['brand_name'] = $request->brand_product_name;
        $data ['brand_desc'] = $request->brand_product_desc;
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update($data);
        Session::put('message','Cập nhập thương hiệu thành công');
        return Redirect::to('all-brand-product');


    }
    public function delete_brand_product($brand_product_id){
        $this->AuthenLogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->delete();
        Session::put('message','Xoá thương hiệu thành công');
        return Redirect::to('all-brand-product');
    }


    //End function Admin page
    public function show_brand_home($brand_id){
        $cate_product  = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
       $brand_by_id = DB::table('tbl_product')->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')->where('tbl_product.brand_id',$brand_id)->get();
       //xô thương hiệu
       $brand_name = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id',$brand_id)->limit(1)->get();
        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name);
    }
}
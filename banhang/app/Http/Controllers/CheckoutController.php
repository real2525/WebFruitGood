<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
use Cart;

class CheckoutController extends Controller
{
    public function login_checkout(){
    	
		return view('pages.checkout.login_checkout');
    }
    public function register_checkout(){
    	
		return view('pages.checkout.register_checkout');
    }
    public function AuthenLogin(){
        $admin_id =Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        }else 
            return Redirect::to('admin')->send();

    }
    public function add_customer(Request $request){
    	
		$data = array();
		$data['customer_name'] = $request->customer_name;
		$data['customer_email'] = $request->customer_email;
		$data['customer_password'] = md5($request->customer_password);
		$data['customer_phone'] = $request->customer_phone;


		$customer_id = DB::table('tbl_customer')->insertGetId($data);
		Session::put('customer_id',$customer_id);
		Session::put('customer_name',$request->customer_name);
		return Redirect::to('/checkout');

    }
    public function checkout(){
    	$cate_product  = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
    	return view('pages.checkout.checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function save_checkout(Request $request){
    	$data = array();
		$data['shipping_name'] = $request->shipping_name;
		$data['shipping_city'] = $request->shipping_city;
		$data['shipping_address'] = $request->shipping_address;
		$data['shipping_phone'] = $request->shipping_phone;
		$data['shipping_email'] = $request->shipping_email;
		$data['shipping_note'] = $request->shipping_note;

		$shipping_id = DB::table('tbl_shipping')->insertGetId($data);
		Session::put('shipping_id',$shipping_id);
		return Redirect::to('payment');


    }

    public function logout_checkout(){
    	Session::flush();
    	return Redirect::to('/login-checkout');
    }
    public function login_customer(Request $request){
    	$name = $request->account_name;
    	$password = md5($request->account_password);
    	$result = DB::table('tbl_customer')->where('customer_name',$name)->where('customer_password',$password)->first();
    	
    	if($result)
    	{
    		Session::put('customer_id',$result->customer_id);
    		return Redirect::to('/checkout');
    	}else{
    		return Redirect::to('/login-checkout');
    	}

    	


    }

    public function payment(){
        $cate_product  = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
    	return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function order_place(Request $request){
        //insert payment_method
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id =DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id =DB::table('tbl_order')->insertGetId($order_data);

        //insert order_details
        $content= Cart::content();
        foreach ($content as $v_content) {
        $order_details_data['order_id'] = $order_id;
        $order_details_data['product_id'] = $v_content->id;
        $order_details_data['product_name'] = $v_content->name;
        $order_details_data['product_price'] = $v_content->price;
        $order_details_data['product_sales_quantity'] = $v_content->qty;
        DB::table('tbl_order_details')->insert($order_details_data);
        }

        if($data['payment_method']==1){
            echo 'Thanh toàn bằng ATM';
        }else{
            Cart::destroy();

            $cate_product  = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
            return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product);
        }

    }


    public function manage_order(){
        $this->AuthenLogin();
        //lấy ra sản phẩm thuộc danh mục nào và thương hiệu nào
        $all_order = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->select('tbl_order.*','tbl_customer.customer_name','tbl_customer.customer_phone','tbl_customer.customer_email')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manage_order',$manager_order);
    }

    public function view_order($orderId){
         $this->AuthenLogin();
        //lấy ra sản phẩm thuộc danh mục nào và thương hiệu nào
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_customer.*','tbl_shipping.*','tbl_order_details.*')->first();
        $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id);
        return view('admin_layout')->with('admin.view_order',$manager_order_by_id);

        // echo '<pre>';
        // print_r($order_by_id);
        // echo '</pre>';
    }

    public function delete_order($orderId){
        $this->AuthenLogin();
        DB::table('tbl_order')->where('order_id',$orderId)->delete();
        Session::put('message','Xoá sản phẩm thành công');
        return Redirect::to('manage-order');
    }
}

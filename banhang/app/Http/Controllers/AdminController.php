<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    /*kiểm tra nếu admin mới cho truy cập*/
    public function AuthenLogin(){
        $admin_id =Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        }else 
            return Redirect::to('admin')->send();

    }


     public function index(){
    	return view('admin_login');
    }
    public function show_dashboard(){
        $this->AuthenLogin();
    	return view('admin.dashboard');
    }
    public function dashboard(Request $request){
    	$admin_name = $request->admin_name;
    	$admin_password = md5($request->admin_password);

    	$result = DB::table('tbl_admin')->where('admin_name',$admin_name)->where('admin_password',$admin_password)->first();
    	if ($result) {
    		Session::put('admin_name',$result->admin_name);
    		Session::put('admin_id',$result->admin_id);
    		return Redirect::to('/dashboard');
    	}
    	else{

			Session::put('message','*Password or Username fail*');
			return Redirect::to('/admin');


    	}
    	return view('admin.dashboard');
    }
    public function logout(){
        $this->AuthenLogin();
    	Session::put('admin_name',null);
    	Session::put('admin_id',null);
    	return Redirect::to('/admin');
    }

}

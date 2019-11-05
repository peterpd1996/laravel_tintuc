<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getlogin()
    {
    	# code...

    	return view('admin/login');
    }
    public function postlogin(Request $request)
    {
    	
    	$this->validate($request,[
    		'email' => 'required',
    		'password' => 'required|min:3|max:20',
    	],[
    		'email.required' => "Ban khong duoc de trong email !!",
    		'password.required' =>'Ban khong duoc de trong password !!',
    		'password.min' => "Password phai it nhat 3 ki tu !!",
    		'password.max' => 'Password khong duoc qua 20 ki tu !!'
    	]);
    		$email = $request->email;
    	 	$password = $request ->password;
    	if(Auth::attempt(['email' => $email, 'password' => $password]))
    	{
    		return redirect('admin/theloai/');
    	}
    	else
    	{
    		return redirect('admin/dangnhap')->with('thongbao','Tai khoan hoac mat khau khong chinh xác !!!');
    	}
    }
    public function logout()
    {
    	Auth::logout();
    	return redirect('admin/dangnhap');
    }
}

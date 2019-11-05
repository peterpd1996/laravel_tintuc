<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   	public function __construct()
   	{

   		$this->logincheck();
   	}
    public function logincheck()
    {


    	if (Auth::check()) {
    		# code...
    		@dd(Auth::user());
    		View::share('user_login',Auth::user());

    		// ten bien user
    		// Auth::user lấy user hiện tại 
    	}
    	else
    	{
    		echo "khong duoc roi!!";
    	}
    	

    }
}

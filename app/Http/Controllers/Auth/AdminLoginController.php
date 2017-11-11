<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\AdminLoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
      $this->middleware('guest:admin');
    }

    //use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('adminlogin');
    }

    public function login(AdminLoginRequest $request){
        $credentials = array(
            'username' => $request->get('username'),
            'password' => $request->get('password')
        );

        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('home.root');
        }
        else{
            return back();
        }
    }
}

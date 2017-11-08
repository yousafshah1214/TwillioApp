<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/dashboard';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
    * Function for redirecting user after login
    *
    */
    protected function redirectTo(){
      return $this->redirectTo;
    }

    public function index(){
      return view('login');
    }

    public function login(Request $request){
        $credentials = array(
          'username' => $request->get('username'),
          'password' => $request->get('password'),
          'status' => 1
        );
        $remember = false;

        if(Auth::attempt($credentials, $remember)){
          return redirect()->intended('user/dashboard');
        }
        else{
          return back();
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';


    public function __construct(){
        return $this->middleware('guest:admin');
    }

    public function showLoginForm(){
        return view('auth.admin.login');
    }

    public function login(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        $remember=$request->input('remember_token');

        if(Auth::guard('admin')
            ->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$remember)){

            return redirect()->intended(route('dashboard'));
        }

        return redirect()->back()->withInput($request->only('email','remember'));
    }


    protected function guard()
    {
        return Auth::guard('admin');
    }

}

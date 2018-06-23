<?php

namespace App\Http\Controllers;

use Cart;
use Auth;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $orders=$user->orders()->paginate(2);


        $orders->transform(function ($order,$key){
            $order->cart=unserialize($order->cart);
            return $order;
        });

        return view('home',[
            'user'=>$user,
            'orders'=>$orders,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    public function __construct(){
        return $this->middleware('auth:admin');
    }
    public function getDashboard(){
        $users=User::all();
        $orders=Order::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.dashboard',[
            'users'=>$users,
            'orders'=>$orders
        ]);
    }

}

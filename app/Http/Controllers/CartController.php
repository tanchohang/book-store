<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\Order;
use App\Cart;
use App\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCart(){
        $oldCart = Session::get('cart');
        $cart  = new Cart($oldCart);
        return view('frontend.cart',['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function addToCart(Request $request,$id){
        $product=Book::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect()->route('cart');

    }
    public function removeItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('cart');
    }



    public  function checkout(Request $request){
        if(!Session::has('cart')){
            return view('frontend.cart');
        }

        $oldCart =Session::get('cart');
        $cart = new Cart($oldCart);
        $total=$cart->totalPrice;
//        $quantity=$request->input('quantity');
        return view('frontend.checkout',[
            'total'=>$total,
//            'quantity'=>$quantity
        ]);
    }

    public function postCheckout(Request $request){

        $request->validate([
            'phone'=>'required',
            'address'=>'required'
        ]);

        $user=Auth::user();

        $order=new Order();
        $cart=Session::get('cart');
        $order->cart=serialize($cart);
        $order->address=$request->input('address');
        $order->phone=$request->input('phone');

        $user->orders()->save($order);
        Session::forget('cart');

        return redirect()->route('home');


    }


    public function emptyCart(){
        Session::forget('cart');
    }
}

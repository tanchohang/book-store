<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use Cart;
use App\Order;
use Toastr;
use App\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    ///////MANUAL CART SYSTEM

    /*public function getCart(){
        $oldCart = Session::get('cart');
        $cart  = new Cart($oldCart);
        return view('frontend.cart',[
            'products' => $cart->items,
            'totalPrice' => $cart->totalPrice,
            'totalQty'=>$cart->totalQty

        ]);
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

    public function updateCart(Request $request,$id){

        $request->validate([
            'quantity'=>'required'
        ]);

        $quantity=$request->quantity;
        $product=Book::find($id);

    foreach ($request->all() as $id=>$val){
        dd($id);
        }
        $oldcart=Session::get('cart');
        $cart=new Cart($oldcart);
        $cart->update($quantity,$id,$product);
        $request->session()->put('cart',$cart);

        return response()->json(Session::get('cart'));

    }


    public  function checkout(Request $request){
        if(!Session::has('cart')){
            return view('frontend.cart');
        }




        $quantity=$request->input('quantity');

        $oldCart =Session::get('cart');
//        $oldCart->items[$item_id]['qty']=$quantity;

        $cart = new Cart($oldCart);

        $total=$cart->totalPrice;

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

        return redirect()->back();
    }*/


    public function getCart()
    {
//        dd(Session::get('totalPrice'));
        return view('frontend.cart');
    }

    public function addToCart($id)
    {
        $book = Book::find($id);
        Cart::add($id, $book->title, 1, $book->price,['img'=>$book->imgUrl]);

        Toastr::success($book->title." added to cart", $title = "Added To Cart");
        return redirect()->back();
    }

    public function removeItem($id)
    {
        Cart::remove($id);

        Toastr::success("Removed from cart");

        return redirect()->route('cart');
    }

    public function updateCart(Request $request, $id)
    {
        $validator=$request->validate([
            'quantity'=>'required|numeric|between:1,5',
        ]);

        Cart::update($id, $request->input('quantity'));

        return response()->json(['success'=>'true']);

    }

    public function destroyCart()
    {
//        Cart::destroy();
        Session::forget('cart');
        return redirect()->back();
    }

    public function getCheckout()
    {
            return view('frontend.checkout');


    }
    public function postCheckout(Request $request)
    {

        $request->validate([
            'phone' => 'required',
            'address' => 'required'
        ]);

        $user = Auth::user();


        $order = new Order();
        $cart = Session::get('cart');
        $order->cart = serialize($cart);
        $order->address = $request->input('address');
        $order->phone = $request->input('phone');

        $user->orders()->save($order);

        Toastr::success("Ordere has been submitted");


        $this->destroyCart();
        Session::forget('cart');

        return redirect()->route('home');
    }
}

<?php

namespace App\Http\Controllers;
use App\Book;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function welcome(){
        $books=Book::orderby('created_at','desc')->paginate(10);
        return view('welcome',[
            'books'=>$books
        ]);
    }

    public function detailView($id){
        $book=Book::find($id);
        return view('frontend.product-detail',[
            'book'=>$book
        ]);
    }

    public function getContact(){
        return view('frontend.contact');
    }

    public function postContact(Request $request){
        return "form posted";
    }

    public function getAbout(){
        return view('frontend.about');
    }
}

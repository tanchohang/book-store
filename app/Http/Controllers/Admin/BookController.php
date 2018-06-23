<?php

namespace App\Http\Controllers\Admin;
use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Toastr;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $books=Book::orderBy('created_at', 'desc')->paginate(8);

        return view('admin.index',[
            'books'=>$books
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'isbn'=>'required',
            'author'=>'required',
            'price'=>'required',
            'description'=>'required',
            'coverImg'=>'required|file|image|mimes:jpeg,png,gif'
        ]);

        /////File Operation//////
        $file=$request->file('coverImg');
        $extension='.'.$file->getClientOriginalExtension();
        $filename='book-cover-'.time().$extension;

        $path=$file->storeAs('uploads',$filename);

        $book=new Book();

        $book->title=$request->title;
        $book->author=$request->author;
        $book->isbn=$request->isbn;
        $book->price=$request->price;
        $book->description=$request->description;
        $book->imgUrl=$path;

        $book->save();

        Toastr::success('Book Item created successfully');

        return redirect()->route('admin.books');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book=Book::find($id);

        return view('admin.single',[
            'book'=>$book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=Book::find($id);

        return view('admin.edit',[
            'book'=>$book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'isbn'=>'required',
            'author'=>'required',
            'price'=>'required',
            'description'=>'required',
            'coverImg'=>'nullable|file|image|mimes:jpeg,png,gif'
        ]);

        $book=Book::find($id);


        /////File Operation//////
         if($request->hasFile('coverImg')){
            $file = $request->file('coverImg');
            $extension = '.' . $file->getClientOriginalExtension();
            $filename = 'book-cover-' . time() . $extension;

            $path = $file->storeAs('public/uploads', $filename);
            $book->imgUrl=$filename;
         }


        $book->title=$request->title;
        $book->author=$request->author;
        $book->isbn=$request->isbn;
        $book->price=$request->price;
        $book->description=$request->description;

        $book->save();
        Toastr::success('Book Item saved successfully');


        return redirect('admin/books');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book=Book::find($id);


        $book->delete();
        Toastr::success('Book Item deleted successfully');

        return redirect()->route('books.index');

    }
}

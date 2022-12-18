<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::all();
        return view('home', compact('books'));
    }

//    public function search(Request $request)
//    {
//        if($request->has('search')){
//            $books = Book::where('title','%'.$request->search.'%')->get();
//        } else {
//            $books = Book::all();
//        }
//        return view('home',['title'=>$books]);
//    }
}

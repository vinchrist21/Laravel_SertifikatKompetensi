<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        //menampilkan data book di halaman adminview
        $books = Book::all();
        return view('admin/adminview')->with('books', $books);
    }

    public function create()
    {
        //pindah ke halaman adminadd
        return view('admin.adminadd');
    }

}

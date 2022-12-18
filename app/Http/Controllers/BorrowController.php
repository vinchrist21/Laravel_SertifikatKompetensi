<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan data-data yang ada di tabel "borrows"
        $users = User::all();
        $books = Book::all();
        $borrows = Borrow::all();

        return view('admin/borrow/borrowindex', compact('users', 'books', 'borrows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menampilkan dropdown user dan buku dari tabel lain
        $users = User::all();
        $books = Book::all();

        //Carbon = library untuk mengambil tanggal secara online
        $borrow_date = Carbon::now()->format('Y-m-d');
        $return_date = Carbon::now()->addDays(7)->format('Y-m-d');

        return view('admin/borrow/borrowadd', compact( 'users','books', 'borrow_date', 'return_date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan pemasukan data ke database
        $input = $request->all();
        Borrow::create($input);
        return redirect('admin/borrow')->with('flash_message', 'Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {

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
        //melakukan update pergantian status
        $borrow = Borrow::find($id);
        $input = $request->all();
        $borrow->update($input);

        return redirect('admin/borrow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        //
        $borrow->delete();

        return redirect()->route('admin/borrow/borrowindex');
    }
}

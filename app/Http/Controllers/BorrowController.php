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
        //
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
        //
        $users = User::all();
        $books = Book::all();

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
        //
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
        //
        $users = User::pluck('email', 'id');
        $books = Book::pluck('title', 'id');

        $borrow->load('users', 'books');

        return view('admin/borrow/borrowedit', compact('borrow', 'users', 'books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrow $borrow)
    {
        //
        $borrow->update($request->validated());

        return redirect()->route('admin/borrow/borrowindex');
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

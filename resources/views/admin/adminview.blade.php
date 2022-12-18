@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card-body">
                    <a href="{{ route('borrow.index') }}"
                       class="btn btn-info btn-sm" title="Add New Book Catalog">
                        <i class="fa fa-folder" aria-hidden="true"></i> Data Peminjam Buku
                    </a>
                    <a href="{{ route('borrow.create') }}"
                       class="btn btn-info btn-sm" title="Add New Book Catalog">
                        <i class="fa fa-plus" aria-hidden="true"></i> Input Peminjaman Buku
                    </a>
                    <div class="card" style="margin-top: 15px">
                        <div class="card-header">Book Catalog</div>

                        <div class="card-body">
                            <a href="{{ url('/admin/adminadd') }}"
                               class="btn btn-warning btn-sm" title="Add New Book Catalog">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New Book Catalog
                            </a>
                            <br/>
                            <br/>
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Publisher</th>
                                        <th>Publication Year</th>
                                        <th>ISBN</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($books as $book)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->publisher }}</td>
                                            <td>{{ $book->publication_year }}</td>
                                            <td>{{ $book->isbn }}</td>
                                            <td>
                                                <a href="{{ url('/admin/adminedit/' . $book->id) }}" title="Edit Book"><button class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                {{--                                            <form method="POST" action="{{ url('/admin/adminview/' . $book->id) }}" accept-charset="UTF-8" style="display:inline">--}}
                                                {{--                                                {{ method_field('DELETE') }}--}}
                                                {{--                                                {{ csrf_field() }}--}}
                                                {{--                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Book" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>--}}
                                                {{--                                            </form>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

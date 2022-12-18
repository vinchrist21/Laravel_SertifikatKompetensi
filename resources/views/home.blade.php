@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">Book Catalog</div>
                            <div class="card-body">
{{--                                <form class="navbar navbar-light bg-light" method="GET">--}}
{{--                                    <nav action="/home/search" class="form-inline">--}}
{{--                                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">--}}
{{--                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--                                    </nav>--}}
{{--                                </form>--}}
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
    </div>
</div>
@endsection

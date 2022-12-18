@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
{{--                <a--}}
{{--                    --}}{{--                            href="{{ url('/admin/create') }}" --}}
{{--                    class="btn btn-info btn-sm" title="Add New Book Catalog">--}}
{{--                    <i class="fa fa-folder" aria-hidden="true"></i> Data Peminjam Buku--}}
{{--                </a>--}}
{{--                <a--}}
{{--                    --}}{{--                            href="{{ url('/admin/create') }}" --}}
{{--                    class="btn btn-info btn-sm" title="Add New Book Catalog">--}}
{{--                    <i class="fa fa-plus" aria-hidden="true"></i> Input Peminjaman Buku--}}
{{--                </a>--}}
{{--                <div class="card" style="margin-top: 15px">--}}
{{--                    <div class="card-header">Book Catalog</div>--}}

                    <div class="card-body">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Book Name</th>
                                    <th>Borrower</th>
                                    <th>Borrow Date</th>
                                    <th>Return Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($borrows as $borrow)
                                            @foreach ($books as $book)
                                                @if ($borrow->book_id == $book->id)
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $book->title }}
                                                    </td>
                                                @endif
                                            @endforeach

                                            @foreach ($users as $user)
                                                @if ($borrow->user_id == $user->id)
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $user->email }}
                                                    </td>
                                                @endif
                                            @endforeach
                                                <td>{{ $borrow->borrow_date }}</td>
                                        <td>{{ $borrow->return_date }}</td>
                                        <td>
                                            @if($borrow->status == 0)
                                                Pinjaman sudah tidak aktif
                                            @endif
                                            @if($borrow->status == 1)
                                                Pinjaman sedang berjalan
                                            @endif
                                        </td>
{{--                                        <td>--}}
{{--                                            <a href="{{ route('borrow.edit') }}" title="Edit Book"><button class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}
{{--                                            <form method="POST" action="{{ route('borrow.destroy') }}" accept-charset="UTF-8" style="display:inline">--}}
{{--                                                {{ method_field('DELETE') }}--}}
{{--                                                {{ csrf_field() }}--}}
{{--                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Book" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>--}}
{{--                                            </form>--}}
{{--                                        </td>--}}
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
@endsection

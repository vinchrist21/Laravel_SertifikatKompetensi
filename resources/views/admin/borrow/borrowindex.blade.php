@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
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
                                        <td>
                                            {{--jika status == 1, tampilkan tombol action--}}
                                            @if($borrow->status ==1)
                                                {{--memanggil function yg ada di web.php agar yg semula valuenya 1 menjadi 0--}}
                                                <form method="POST" action="{{ url('/admin/borrow/borrowindex/'.$borrow->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('Patch') }}
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="status" id="status" class="form-input rounded-md shadow-sm mt-1 block w-full" value= 0 />
                                                    <button type="submit" class="btn btn-success btn-sm" title="Delete Book" onclick="return confirm(&quot;Confirm edit?&quot;)">Finish</button>
                                                </form>
                                            @endif
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
@endsection

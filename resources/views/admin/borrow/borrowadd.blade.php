@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Add Book Page</div>
        <div class="card-body">

{{--            <form action="{{ url('borrow/borrowadd') }}" method="post">--}}
            <form action="{{ route('borrow.store') }}" method="post">
                {!! csrf_field() !!}
                <div class="px-4 py-5 bg-white sm:p-6">
                    <label for="book_id" class="block font-medium text-sm text-gray-700">Book</label>
                    <select name="book_id" id="book_id" class="form-control block rounded-md shadow-sm mt-1 block w-full">
                        @foreach($books as $book)
                            <option value="{{ $book->id }}">{{$book->title . ' (' . $book->publication_year .')'}}</option>
                        @endforeach
                    </select>
                    @error('book_id')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="px-4 py-5 bg-white sm:p-6">
                    <label for="user_id" class="block font-medium text-sm text-gray-700">User</label>
                    <select name="user_id" id="user_id" class="form-control block rounded-md shadow-sm mt-1 block w-full" >
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{$user->email . ' (' . $user->name .')'}}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="px-4 py-5 bg-white sm:p-6">
                    <label for="loan_date" class="block font-medium text-sm text-gray-700">Borrow Date</label>
                    <input type="date" name="borrow_date" id="borrow_date" class="form-input rounded-md shadow-sm mt-1 block w-full"
                           value="{{ $borrow_date }}" readonly/>
                    @error('loan_date')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="px-4 py-5 bg-white sm:p-6">
                    <label for="return_date" class="block font-medium text-sm text-gray-700">Return Date</label>
                    <input type="date" name="return_date" id="return_date" class="form-input rounded-md shadow-sm mt-1 block w-full"
                           value="{{ $return_date }}" readonly/>
                    @error('return_date')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="px-4 py-5 bg-white sm:p-6">
                    <input type="hidden" name="status" id="status" class="form-input rounded-md shadow-sm mt-1 block w-full"
                           value=1 />
                    @error('status')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@endsection

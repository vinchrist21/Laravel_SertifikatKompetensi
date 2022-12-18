@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Edit Buku</div>
        <div class="card-body">

            <form action="{{ url('admin/adminedit/' .$books->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$books->id}}" id="id" />
                <label>Title</label></br>
                <input type="text" name="title" id="title" value="{{$books->title}}" class="form-control"></br>
                <label>Author</label></br>
                <input type="text" name="author" id="author" value="{{$books->author}}" class="form-control"></br>
                <label>Publisher</label></br>
                <input type="text" name="publisher" id="publisher" value="{{$books->publisher}}" class="form-control"></br>
                <label>Publication Year</label></br>
                <input type="text" name="publication_year" id="publication_year" value="{{$books->publication_year}}" class="form-control"></br>
                <label>ISBN</label></br>
                <input type="text" name="isbn" id="isbn" value="{{$books->isbn}}" class="form-control"></br>
                <input type="submit" value="Edit" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop

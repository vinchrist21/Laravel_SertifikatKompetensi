@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Add Book Page</div>
        <div class="card-body">

            <form action="{{ url('admin/adminadd') }}" method="post">
                {!! csrf_field() !!}
                <label>Title</label></br>
                <input type="text" name="title" id="title" class="form-control"></br>
                <label>Author</label></br>
                <input type="text" name="author" id="author" class="form-control"></br>
                <label>Publisher</label></br>
                <input type="text" name="publisher" id="publisher" class="form-control"></br>
                <label>Publication Year</label></br>
                <input type="text" name="publication_year" id="publication_year" class="form-control"></br>
                <label>ISBN</label></br>
                <input type="text" name="isbn" id="isbn" class="form-control"></br>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@endsection

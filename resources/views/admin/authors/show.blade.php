@extends('admin.layouts.app')
@section('content')
<div class="right_col" role="main">
	<a class="btn btn-outline-dark" href="{{ asset('admin/author') }}" role="button">Go back</a>
    <h1>{{ $author->name }}</h1>
	<p>{{ $author->email }}</p>
    {{-- <small>Written on {{ $author->created_at }}</small> --}}
    <hr>
    {{-- <a class="btn btn-outline-success" href="{{ asset('/author/' . $author->id . '/edit') }}" role="button">Edit</a> --}}

    {{-- <form action="{{ action('AdminAuthorController@destroy',$author->id) }}" method="author" role="form" > --}}
    <form action="" method="author" role="form" >
        {{ method_field('DELETE') }}
        {{ csrf_field()}}
        <div class="form-group">
            <button type="Delete" class="btn btn-danger">Delete</button>
        </div>
    </form>
</div>
@endsection


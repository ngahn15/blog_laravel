@extends('admin.layouts.app')
@section('content')

<div class="right_col" role="main">
	<a class="btn btn-outline-dark" href="{{ asset('admin/post') }}" role="button">Go back</a>
    @if (count($post)>0)
        <h1>{{ $post->title }}</h1>
    	<p>{{ $post->description }}</p>
        <small>Written on {{ $post->created_at }}</small>
        <hr>
        <a class="btn btn-outline-success" href="{{ asset('admin/post/' . $post->id . '/edit') }}" role="button">Edit</a>

        <form action="{{ action('Admin\AdminPostsController@destroy',$post->id) }}" method="POST" role="form" >
            {{ method_field('DELETE') }}
            {{ csrf_field()}}
            <div class="form-group">
                <button type="Delete" class="btn btn-danger">Delete</button>
            </div>
        </form>
    @else
        <p>Post not found</p>
    @endif
</div>
@endsection


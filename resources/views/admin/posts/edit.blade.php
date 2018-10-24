@extends('admin.layouts.app')
@section('content')
<div class="right_col" role="main">
    <a class="btn btn-outline-dark" href="{{ asset('admin/post') }}" role="button">Go back</a>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->description }}</p>
    <small>Written on {{ $post->created_at }}</small>
    <hr>

    <div class="">
        <label>
          <input type="checkbox" class="js-switch" name="status" value="{{ $post->status }}" @if ($post->status == 1)
            checked 
        @endif>
        </label>
    </div>

    <form action="{{ action('Admin\AdminPostsController@update',$post->id) }}" method="POST" role="form" >
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
    <form action="{{ action('Admin\AdminPostsController@destroy',$post->id) }}" method="POST" role="form" >
        {{ method_field('DELETE') }}
        {{ csrf_field()}}
        <div class="form-group">
            <button type="Delete" class="btn btn-danger">Delete</button>
        </div>
    </form>
</div>
@endsection

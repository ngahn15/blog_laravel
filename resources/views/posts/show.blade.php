@extends('layouts.app')
@section('content')
	<a class="btn btn-outline-dark" href="{{ asset('/') }}" role="button">Go back</a>
    @if (Auth::check())
    <a class="btn btn-outline-success float-right" href="{{ asset('/post/' . $post->id . '/edit') }}" role="button">Edit</a>
    @endif
    
    <h1 class="mt-5">
        {{ $post->title }}
    </h1>
    <p class="text-right">Written on {{ $post->created_at }}</p>

    <img src="{{ asset('image/uploads/'.$post->image) }}" alt="post img" class="pull-left img-responsive postImg img-thumbnail margin10"><br><br>
	<p>{{ $post->description }}</p>
    
    

    

@endsection


@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if (count($posts)>0)
        
        <table class="table table-hover">
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>
                        <img width="50px" class="media-object" src="{{ asset('image/uploads/'.$post->image) }}">
                    </td>
                    <td>
                        <h3>
                            <a href="{{ asset('/post/' . $post->id) }}">{{ $post->title }}</a>
                        </h3>
                    </td>
                    <td><small>Written on {{ $post->created_at }}</small></td>
                    <td>
                        <small>By <a href="{{ asset('/profile/' . $post->user->id) }}">{{ $post->user->name }}</a></small>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{$posts->links()}} --}}
    @else
        <p>Post not found</p>
    @endif
    
@endsection


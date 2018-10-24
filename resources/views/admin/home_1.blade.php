@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    {{-- You are logged in! --}}
                    {{-- <a href="{{ asset('post/create') }}">Create Post</a>
                    <table class="table table-hover">
                        <h3>Your posts</h3>
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($posts as $post)
                            <th>{{ $post->title }}</th>
                            <th>
                                <a class="btn btn-outline-success" href="{{ asset('/post/' . $post->id . '/edit') }}" role="button">Edit</a>
                            </th>
                            <th></th>
                        @endforeach
                    </table>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection

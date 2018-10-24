@extends('admin.layouts.app')
@section('content')
	<h1>Posts</h1>
	@if (count($posts)>0)
	{{ "heheh" }}
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>created_at</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($posts as $post)
			<tr>
				<td><a href="{{ asset('admin/post/' . $post->id) }}">{{ $post->title }}</a></td>
				<td><a href="{{ asset('admin/author/' . $post->user->id) }}">{{ $post->user->name }}</a></td>
				<td><small>Written on {{ $post->created_at }}</small></td>
				<td><small>
					{{-- <form action="{{ action('Admin\AdminPostsController@destroy',$post->id) }}" method="POST" role="form" > --}}
					<form action="" method="POST" role="form" >
				        {{ method_field('DELETE') }}
				        {{ csrf_field()}}
						<a class="btn btn-info" href="{{ asset('admin/post/'.$post->id.'/edit') }}" role="button">Edit</a>
				        <button type="Delete" class="btn btn-danger">Delete</button>
				    </form>
				</small></td>
			</tr>
			@endforeach
		</tbody>
	</table>
		{{-- {{$posts->links()}} --}}
	@else
		<p>Post not found</p>
	@endif
	
@endsection


		

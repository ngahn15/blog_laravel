@extends('admin.layouts.app')
@section('content')
	<div >
		<h1>Categories</h1>
		<a class="btn btn-info" href="{{ asset('admin/category/create') }}" role="button">Create</a>

		@if (count($cates)>0 )
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Tiêu đề</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($cates as $cate)
					<tr>
						<td>
							<a href="{{ asset('admin/category/'.$cate->id) }}">{{ $cate->title }}</a>
						</td>
						<td>
							<form action="{{ action('Admin\AdminCategoryController@destroy',$cate->id) }}" method="POST" role="form" >
						        {{ method_field('DELETE') }}
						        {{ csrf_field()}}
								<a class="btn btn-info" href="{{ asset('admin/category/'.$cate->id.'/edit') }}" role="button">Edit</a>
						        <button type="Delete" class="btn btn-danger">Delete</button>
						    </form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{-- {{$posts->links()}} --}}
		@else
			<p>not found</p>
		@endif
	</div>
@endsection

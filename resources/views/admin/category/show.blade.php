@extends('admin.layouts.app')
@section('content')
	<h1>Categories</h1>
	<a class="" href="{{ asset('admin/category') }}" role="button">Go back</a>

	@if (count($cate)>0 )
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Tiêu đề</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
					</td>
					<td>
						<a class="btn btn-info" href="{{ asset('admin/category/'.$cate->id.'/edit') }}" role="button">Edit</a>
						<form action="{{ action('Adim\CategoryController@destroy',$cate->id) }}" method="POST" role="form" >
					        {{ method_field('DELETE') }}
					        {{ csrf_field()}}
							<a href="{{ asset('admin/category/'.$cate->id) }}">{{ $cate->title }}</a>
				            <button type="Delete" class="btn btn-danger">Delete</button>
					    </form>
					</td>
				</tr>
			</tbody>
		</table>
	@else
		<p>not found</p>
	@endif
	
@endsection

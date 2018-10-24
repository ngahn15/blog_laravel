@extends('admin.layouts.app')
 
@section('content')
	<a class="" href="{{ asset('admin/category') }}" role="button">Go back</a>

<form action="{{ action('Admin\AdminCategoryController@update',$cate->id) }}" method="POST" role="form" enctype="multipart/form-data">
    <legend class="mt-5">Create cate</legend>
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Title <span class="require">*</span></label>
        <input value="{{ $cate->title }}" type="text" class="form-control" name="title" />
        <p class="form-text text-danger"> </p>
    </div>
    		    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-default">Cancel</button>
    </div>
    		    
</form>

@stop
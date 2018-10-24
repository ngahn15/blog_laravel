@extends('admin.layouts.app')
 
@section('content')
<form action="{{ asset('admin/category') }}" method="POST" role="form" enctype="multipart/form-data">
    <legend class="mt-5">Create Post</legend>
    {{ csrf_field()}}
    <div class="form-group">
        <label for="title">Title <span class="require">*</span></label>
        <input type="text" class="form-control" name="title" />
        <p class="form-text text-danger"> </p>
    </div>
    		    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-default">Cancel</button>
    </div>
    		    
</form>

@stop
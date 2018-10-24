@extends('layouts.app')
 
@section('content')
<form action="{{ action('PostsController@update',$post->id) }}" method="POST" role="form" enctype="multipart/form-data">
    <legend class="mt-5">Edit post</legend>
    {{ method_field('PUT') }}
    {{ csrf_field()}}
    {{-- <input name="_method" type="hidden" value="PUT"> --}}
    <div class="form-group">
        <label for="title">Title <span class="require">*</span></label>
        <input type="text" class="form-control" name="title" value="{{ $post->title }}" />
        <p class="form-text text-danger"> </p>
    </div>
    		    
    <div class="form-group">
        <label for="description">Description <span class="require">*</span></label>
        <textarea rows="5" class="form-control" name="description" value="">{{ $post->description }}</textarea>
        <p class="form-text text-danger"></p>
    </div>

    {{-- <div class="form-group">
      <label for="">Image:</label>
      <img src="{{ asset('public/img/uploads/'.$post->img) }}" width="210px" alt="" class="img-responsive thumbnail">
      <input value="{{ $post->img }}" type="file" class="form-control-file" name="fileImage" id="" placeholder="" aria-describedby="fileHelpId">
    </div> --}}
    		    
    <div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-default">Cancel</button>
    </div>
    		    
</form>

@stop
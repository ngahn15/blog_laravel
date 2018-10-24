@extends('layouts.app')
 
@section('content')
<a class="btn btn-outline-dark" href="{{ asset('/post') }}" role="button">Go back</a>
<form action="{{ action('PostsController@update',$post->id) }}" method="POST" role="form" enctype="multipart/form-data">
    <legend class="mt-5">Edit post</legend>
    {{ method_field('PUT') }}
    {{ csrf_field()}}
    {{-- <input name="_method" type="hidden" value="PUT"> --}}
    <div class="form-group">
        <label for="input" class="control-label">Danh muc :</label>
        <div class="">
            <select name="cate" id="input" class="form-control" required="required">
                @foreach ($cates as $cate)
                    <option value="{{ $cate->id }}">{{ $cate->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
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

    <div class="form-group">
      <label for="">Image:</label>
      <img src="{{ asset('public/img/uploads/'.$post->img) }}" width="210px" alt="" class="img-responsive thumbnail">
      <input type="text" class="form-control" name="fileImage" value="{{ $post->image }}" />
        <p class="form-text text-danger"> </p>
      <input value="{{ $post->img }}" type="file" class="form-control-file" name="fileImage" id="" placeholder="" aria-describedby="fileHelpId">
    </div>
    		    
    <div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
    <a class="btn btn-default" href="{{ asset('/post') }}" role="button">Cancel</a>
    </div>
    		    
</form>

@stop
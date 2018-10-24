@extends('layouts.app')
 
@section('content')
<form action="{{ url('post') }}" method="POST" role="form" enctype="multipart/form-data">
    <legend class="mt-5">Create Post</legend>
    {{ csrf_field()}}
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
        <input type="text" class="form-control" name="title" />
        <p class="form-text text-danger"> </p>
    </div>
    		    
    <div class="form-group">
        <label for="description">Description <span class="require">*</span></label>
        <textarea id='article-ckeditor' rows="5" class="form-control" name="description" ></textarea>
        <p class="form-text text-danger"></p>
    </div>

    <div class="form-group">
      <label for="">Image:</label>
      <input type="file" class="form-control-file" name="fileImage" id="" placeholder="" aria-describedby="fileHelpId">
    </div>
    		    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
        <button class="btn btn-default">Cancel</button>
    </div>
    		    
</form>

@stop
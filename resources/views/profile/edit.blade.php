@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="">
                <div class="card-header">Edit Profile</div>
                <img class="card-img-top" src="..." alt="Card image cap">
                <form action="{{ action('UserController@update',$info->id) }}" method="POST" role="form">
                	{{ method_field('PUT') }}
    				{{ csrf_field()}}
                	<div class="form-group row">
                		<label for="" class="col-md-4 col-form-label text-md-right">Name:</label>
                		<div class="col-md-6">
                			<input name="name" type="text" class="form-control" id="">
                		</div>
                	</div>
                	
                	<div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                	
                
                	<button type="submit" class="btn btn-primary">Save</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection

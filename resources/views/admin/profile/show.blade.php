@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="width: 18rem;">
                <div class="card-header">Profile</div>
                <img class="card-img-top" src="..." alt="Card image cap">
                 <div class="card-body">
                    <h5 class="card-title">{{ $info->name }}</h5>
                    <p class="card-text">{{ $info->email }}</p>
                    <a href="{{ asset('/profile/'. $info->id . '/edit') }}" class="btn btn-primary">Edit</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

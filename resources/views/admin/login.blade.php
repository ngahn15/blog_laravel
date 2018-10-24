@extends('admin.layouts.app')
@section('content')
<div class="login_wrapper login">
    <div class="animate form login_form">
        <section class="login_content">
            <form method="POST" action="{{ asset('admin/login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h1>Login Form</h1>
                    <div>
                        <input name="username" type="text" class="form-control" placeholder="Username" required="" />
                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                <div>
                    <input name="password" type="password" class="form-control" placeholder="Password" required="" />
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                    <a class="reset_pass" href="#">Lost your password?</a>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">New to site?
                        <a href="{{ asset('admin/register') }}" class="to_register"> Create Account </a>
                    </p>

                    <div class="clearfix"></div>
                    <br />

                </div>
            </form>
        </section>
    </div>
</div>
@endsection
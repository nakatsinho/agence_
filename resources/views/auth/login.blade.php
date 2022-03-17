@extends('layouts.auth.login')

@section('content')

<div class="az-signin-header">
    <h2>Welcome back!</h2>
    <h4>Please sign in to continue</h4>

    <form method="GET" action="{{ route('home') }}">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" placeholder="Enter your email" name="co_usuario" >
            @error('co_usuario')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><!-- form-group -->
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Enter your password" name="ds_senha" >
            @error('ds_senha')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><!-- form-group -->
        <button class="btn btn-az-primary btn-block" type="submit">Sign In</button>
    </form>
</div>
<div class="az-signin-footer">
          <p><a href="{{ route('password.request') }}">Forgot password?</a></p>
          <p>Don't have an account? <a href="{{ route('register') }}">Create an Account</a></p>
        </div><!-- az-signin-footer -->
@endsection

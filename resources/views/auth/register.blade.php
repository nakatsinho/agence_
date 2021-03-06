@extends('layouts.auth.register')

@section('content')
<div class="az-signup-wrapper">
    <div class="az-column-signup-left">
        <div>
            <i class="typcn typcn-chart-bar-outline"></i>
            <h1 class="az-logo">AG<span>EN</span>CE</h1>
            <h5>Responsive Modern Dashboard &amp; Admin Template</h5>
            <p>We are excited to launch our new company and product Agence. After being featured in too many magazines to
                mention and having created an online stir, we know that BootstrapDash is going to be big. We also hope
                to win Startup Fictional Business of the Year this year.</p>
            <p>Browse our site and see for yourself why you need Agence.</p>
            <a href="#" class="btn btn-outline-indigo">Learn More</a>
        </div>
    </div><!-- az-column-signup-left -->
    <div class="az-column-signup">
    <h1 class="az-logo">AG<span>EN</span>CE</h1>
        <div class="az-signup-header">
            <h2>Get Started</h2>
            <h4>It's free to signup and only takes a minute.</h4>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label>Firstname &amp; Lastname</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div><!-- form-group -->
                <div class="form-group">
                    <label>Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>" placeholder="Enter your email">
                    @enderror
                </div><!-- form-group -->
                <div class="form-group">
                    <label>Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div><!-- form-group -->
                <button class="btn btn-az-primary btn-block" type="submit">Create Account</button>
                <div class="row row-xs">
                    <div class="col-sm-6"><button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with
                            Facebook</button></div>
                    <div class="col-sm-6 mg-t-10 mg-sm-t-0"><button class="btn btn-primary btn-block"><i
                                class="fab fa-twitter"></i> Signup with Twitter</button></div>
                </div><!-- row -->
            </form>
        </div><!-- az-signup-header -->
        <div class="az-signup-footer">
            <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
        </div><!-- az-signin-footer -->
    </div><!-- az-column-signup -->
</div>
@endsection
@extends('layouts.header',['title'=>' Login'])

@section('title', 'Login to Mobile LM')

<body class="account-body">

<!-- Log In page -->
<div class="row vh-100">
    <div class="col-lg-3  pr-0">
        <div class="card mb-0 shadow-none">
            <div class="card-body">

                @if(isset(Auth::user()->email))
                    <script>window.location="/home"</script>
                @endif

                <div class="px-3">
                    <div class="media">
                        <a href="/login" class="logo logo-admin"><img src="{{asset('images/logo-sm.png')}}" height="55" alt="logo" class="my-3"></a>
                        <div class="media-body ml-3 align-self-center">
                            <h4 class="mt-0 mb-1">Login on Mobile LM</h4>
                            <p class="text-muted mb-0">Sign in to continue to Mobile LM.</p>
                        </div>
                    </div>

                    <form class="form-horizontal my-4" action="{{ route('login') }}" method="POST">

                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="username">{{ __('E-Mail Address') }}</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                </div>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="username" placeholder="Enter email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>Failed to login, please make sure your email is correct</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="userpassword">{{ __('Password') }}</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>
                                </div>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" placeholder="Enter password" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>Failed to login, please make sure your password is correct</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-sm-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customControlInline"> {{ __('Remember Me') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-0 row">
                            <div class="col-12 mt-2">
                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" >{{ __('Login') }}<i class="fas fa-sign-in-alt ml-1"></i></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 p-0 d-flex justify-content-center">
        <div class="accountbg d-flex align-items-center">
            <div class="account-title text-white text-center">
                <img src="{{asset('images/logo-sm.png')}}" alt="" class="thumb-sm">
                <h4 class="mt-3">Welcome To Mobile LM</h4>
                <div class="border w-25 mx-auto border-primary"></div>
                <h2 class="">Make Your App a Success</h2>
            </div>
        </div>
    </div>
</div>
<!-- End Log In page -->

@extends('layouts.footer')

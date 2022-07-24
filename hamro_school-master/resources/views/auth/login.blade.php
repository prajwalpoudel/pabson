@extends('front.layouts.master')
@section('title')
    Hamro School | Login
@endsection
@section('content')
    <section>
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-6 col-md-9 col-sm-12">
                    <div class="log_wrap">
                        <h4>Sign In</h4>

                        <div class="login-form">
                            <form method="POST" action="{{ route('auth.login') }}">
                                @csrf

                                <div class="form-group">
                                    <label>User Name or Email </label>
                                    <input id="username"
                                           type="text"
                                           class="form-control {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="username"
                                           value="{{ old('username') }}"
                                           required autocomplete autofocus>
                                    @if ($errors->has('username') || $errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username')}}</strong>
                                    </span>
                                    @endif
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email')}}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="social-login mb-3">
                                    <ul>
                                        <li>
                                            <input id="remember" class="checkbox-custom" name="remember"
                                                   type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="reg" class="checkbox-custom-label">Remember Me</label>
                                        </li>
                                        {{--                                        <li class="right"><a href="#" class="theme-cl">Forget Password?</a></li>--}}
                                    </ul>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md full-width pop-login">Login</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection

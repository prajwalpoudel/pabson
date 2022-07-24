@extends('front.layouts.master')
@section('title')
    Hamro School | Register
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="sec-heading center">
                        <h2><span class="theme-cl">Register</span></h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="custom-tab customize-tab tabs_creative">
                    <ul class="nav nav-tabs pb-2 b-0" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a href="{{ route('auth.register.school') }}" class="nav-link {{ request()->route()->getName() == 'auth.register.school' ? 'active' : null}}">As a School</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('auth.register.student') }}" class="nav-link {{ request()->route()->getName() == 'auth.register.student' ? 'active' : null}}">As a Student</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('auth.register.teacher') }}" class="nav-link {{ request()->route()->getName() == 'auth.register.teacher' ? 'active' : null}}">As a Teacher</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="login-form mt-4">
                            @yield('register')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

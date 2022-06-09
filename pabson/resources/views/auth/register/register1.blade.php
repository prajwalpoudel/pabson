@extends('front.layouts1.master')

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('front') }}/styles/register.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('front') }}/styles/register_responsive.css">
    <style>
        .select2-selection--single {
            height: calc(2.25rem + 2px)!important;
            padding-top: 4px;
        }
        .select2-selection__rendered {
            color: #999!important;
        }
    </style>
@endpush

@section('breadcrumbs')
    <ul>
        <li><a href="{{ route('search') }}">Home</a></li>
        <li>Register</li>
    </ul>
@endsection

@section('content')
    <div class="register">
        <div class="container">
            <div class="row">
                <!-- Register Main Content -->
                <div class="col-lg-12">
                    <div class="register_container">
                        <div class="register_title">Register</div>
                        <div class="register_tabs_container">
                            <div class="tabs d-flex flex-row align-items-center justify-content-start">
                                <a href="{{ route('auth.register.school') }}" class="tab {{ request()->route()->getName() == 'auth.register.school' ? 'active' : null}}">as a school</a>
                                <a href="{{ route('auth.register.student') }}" class="tab {{ request()->route()->getName() == 'auth.register.student' ? 'active' : null}}">as a student</a>
                                <a href="{{ route('auth.register.teacher') }}" class="tab {{ request()->route()->getName() == 'auth.register.teacher' ? 'active' : null}}">as a teacher</a>
                            </div>
                            <div class="tab_panels">
                                <!-- Description -->
                                <div class="tab_panel active">
                                    @yield('register')
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

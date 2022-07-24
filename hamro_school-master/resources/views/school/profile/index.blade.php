@extends('school.layouts.app')

@section('title', 'School | Profile')

@section('content')

    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">School Profile</h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('school.profile.edit', $user->id) }}" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                            Edit
                        </a>
                    </div>
                </div>
            </div>

            <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name : </label>
                        <span class="pl-2"> {{ $user->school->name ?? null }}</span>
                    </div>

                    <div class="col-md-6">
                        <label for="">Principal : </label>
                        <span class="pl-2"> {{ $user->school->principal_name ?? null }}</span>
                    </div>

                    <div class="col-md-6">
                        <label for="">Email : </label>
                        <span class="pl-2">  {{ $user->email ?? null }}</span>
                    </div>

                    <div class="col-md-6">
                        <label for="">Username : </label>
                        <span class="pl-2">  {{ $user->username ?? null }}</span>
                    </div>

                    <div class="col-md-6">
                        <label for="">Principal Email : </label>
                        <span class="pl-2">{{ $user->school->principal_email ?? null }}</span>
                    </div>

                    <div class="col-md-6">
                        <label for="">Phone : </label>
                        <span class="pl-2">{{ $user->phone ?? null }}</span>
                    </div>

                    <div class="col-md-6">
                        <label for="">Address : </label>
                        <span class="pl-2">{{ $user->school->address ?? null }}</span>
                    </div>

                    <div class="col-md-6">
                        <label for="">Website Link : </label>
                        <span class="pl-2">{{ $user->school->website_link ?? null }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

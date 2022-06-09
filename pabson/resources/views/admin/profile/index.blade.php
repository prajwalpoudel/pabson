@extends('admin.layouts.master')

@section('content')
    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Admin Profile</h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('admin.profile.edit', $admin->id) }}" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                            Edit
                        </a>
                    </div>
                </div>
            </div>

            <div class="kt-portlet__body">
                <div class="row">
                    <label for="">First Name : </label>
                    <span class="pl-2">{{ $admin->first_name }}</span>
                </div>

                <div class="row">
                    <label for="">Last Name : </label>
                    <span class="pl-2">{{ $admin->last_name }}</span>
                </div>

                <div class="row">
                    <label for="">Email : </label>
                    <span class="pl-2">{{ $admin->email }}</span>
                </div>

                <div class="row">
                    <label for="">Phone : </label>
                    <span class="pl-2">{{ $admin->phone }}</span>
                </div>

                <div class="row">
                    <label for="">Address : </label>
                    <span class="pl-2">{{ $admin->address }}</span>
                </div>
            </div>
        </div>
    </section>
@endsection

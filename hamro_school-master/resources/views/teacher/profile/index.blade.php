@extends('teacher.layouts.master')

@section('title', 'Teacher | Profile')

@section('content')

    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Teacher Profile</h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('teacher.profile.edit', $teacher->id) }}" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                            Edit
                        </a>
                    </div>
                </div>
            </div>

            <div class="kt-portlet__body">
                <div class="row">
                    <label for="">First Name : </label>
                    <span class="pl-2"> {{ $teacher->first_name }}</span>
                </div>

                <div class="row">
                    <label for="">Last Name : </label>
                    <span class="pl-2"> {{ $teacher->last_name }}</span>
                </div>

                <div class="row">
                    <label for="">Email : </label>
                    <span class="pl-2">  {{ $teacher->email }}</span>
                </div>

                <div class="row">
                    <label for="">Phone : </label>
                    <span class="pl-2">{{ $teacher->phone }}</span>
                </div>

                <div class="row">
                    <label for="">Address : </label>
                    <span class="pl-2">{{ $teacher->address }}</span>
                </div>

            </div>
        </div>

    </section>

@endsection

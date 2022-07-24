@extends('teacher.layouts.master')

@section('title', 'Teacher | Edit Profile')

@section('content')
    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Profile</h3>
                </div>
            </div>
            {!! Form::model($teacher, ['route' => ['teacher.profile.update', $teacher->id], 'method' => 'patch', 'class' => 'kt-form kt-form--label-right', 'id' => 'profile-form']) !!}
            @include('teacher.profile.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>

@endsection


@extends('teacher.layouts.master')

@section('content')
    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Create Blog</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['teacher.blog.store'], 'method' => 'post', 'files' => 'true', 'class' => 'kt-form kt-form--label-right', 'id' => 'blog-form']) !!}
            @include('teacher.blog.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

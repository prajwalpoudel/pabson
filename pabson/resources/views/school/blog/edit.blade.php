@extends('school.layouts.app')

@section('content')
    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Blog</h3>
                </div>
            </div>
            {!! Form::model($blog, ['route' => ['school.blog.update',$blog->id], 'method' => 'patch', 'files' => 'true', 'class' => 'kt-form kt-form--label-right', 'id' => 'blog-form']) !!}
            @include('school.blog.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

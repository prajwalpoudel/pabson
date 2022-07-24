@extends('teacher.layouts.master')

@section('content')
    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Create Education Material</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['teacher.education_material.store'], 'method' => 'post', 'files' => 'true', 'class' => 'kt-form kt-form--label-right', 'id' => 'education_material-form']) !!}
            @include('teacher.educationMaterial.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

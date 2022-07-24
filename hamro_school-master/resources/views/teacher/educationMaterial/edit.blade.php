@extends('teacher.layouts.master')

@section('content')
    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Education Material</h3>
                </div>
            </div>
            {!! Form::model($education_material, ['route' => ['teacher.education_material.update',$education_material->id], 'method' => 'patch', 'files' => 'true', 'class' => 'kt-form kt-form--label-right', 'id' => 'education_material-form']) !!}
            @include('teacher.educationMaterial.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

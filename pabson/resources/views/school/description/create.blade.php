@extends('school.layouts.app')

@section('content')
    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Create School Description</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['school.description.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'school_description-form']) !!}
            @include('school.description.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

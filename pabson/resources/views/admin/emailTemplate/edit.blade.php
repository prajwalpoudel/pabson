@extends('admin.layouts.master')

@section('content')
    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Email Template</h3>
                </div>
            </div>
            {!! Form::model($emailTemplate, ['route' => ['admin.email-template.update',$emailTemplate->id], 'method' => 'patch', 'class' => 'kt-form kt-form--label-right', 'id' => 'email-template-form']) !!}
            @include('admin.emailTemplate.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

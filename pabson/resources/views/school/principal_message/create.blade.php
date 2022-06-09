@extends('school.layouts.app')

@section('content')
    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Create Principal Message</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['school.principal_message.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'principal_message-form']) !!}
            @include('school.principal_message.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

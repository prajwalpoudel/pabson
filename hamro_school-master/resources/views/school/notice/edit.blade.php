@extends('school.layouts.app')

@section('content')
    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Notice</h3>
                </div>
            </div>
            {!! Form::model($notice, ['route' => ['school.notice.update',$notice->id], 'method' => 'patch', 'files' => 'true', 'class' => 'kt-form kt-form--label-right', 'id' => 'notice-form']) !!}
            @include('school.notice.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

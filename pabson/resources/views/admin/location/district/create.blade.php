@extends('admin.layouts.master')

@section('content')
    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Create District</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.district.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'district-form']) !!}
            @include('admin.location.district.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

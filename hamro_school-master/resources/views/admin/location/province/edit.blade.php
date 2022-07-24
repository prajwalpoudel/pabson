@extends('admin.layouts.master')

@section('content')
    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Province</h3>
                </div>
            </div>
            {!! Form::model($province, ['route' => ['admin.province.update',$province->id], 'method' => 'patch', 'class' => 'kt-form kt-form--label-right', 'id' => 'province-form']) !!}
            @include('admin.location.province.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

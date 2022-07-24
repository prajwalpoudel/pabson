@extends('admin.layouts.master')

@section('content')
    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit District</h3>
                </div>
            </div>
            {!! Form::model($district, ['route' => ['admin.district.update',$district->id], 'method' => 'patch', 'class' => 'kt-form kt-form--label-right', 'id' => 'district-form']) !!}
            @include('admin.location.district.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

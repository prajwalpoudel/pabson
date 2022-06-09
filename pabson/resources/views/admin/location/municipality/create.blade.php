@extends('admin.layouts.master')

@section('content')
    <section id="municipality-create">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Create Municipality</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.municipality.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'municipality-form']) !!}
            @include('admin.location.municipality.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

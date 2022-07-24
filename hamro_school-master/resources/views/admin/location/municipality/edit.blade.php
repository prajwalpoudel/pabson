@extends('admin.layouts.master')

@section('content')
    <section id="municipality-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Municipality</h3>
                </div>
            </div>
            {!! Form::model($municipality, ['route' => ['admin.municipality.update',$municipality->id], 'method' => 'patch', 'class' => 'kt-form kt-form--label-right', 'id' => 'municipality-form']) !!}
            @include('admin.location.municipality.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@extends('admin.layouts.master')

@section('content')
    <section id="subject-create">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Create Subject</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.academics.subject.store'],'enctype'=>'multipart/form-data', 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'subject-form']) !!}
            @include('admin.academics.subject.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>

@endsection

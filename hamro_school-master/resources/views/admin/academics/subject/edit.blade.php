@extends('admin.layouts.master')

@section('content')
    <section id="subject-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Subject</h3>
                </div>
            </div>
            {!! Form::model($subject, ['route' => ['admin.academics.subject.update',$subject->id], 'method' => 'patch', 'enctype'=>'multipart/form-data','class' => 'kt-form kt-form--label-right', 'id' => 'subject-form']) !!}
            @include('admin.academics.subject.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@extends('admin.layouts.master')

@section('content')
    <section id="grade-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Grade</h3>
                </div>
            </div>
            {!! Form::model($grade, ['route' => ['admin.academics.grade.update',$grade->id], 'method' => 'patch', 'class' => 'kt-form kt-form--label-right', 'id' => 'grade-form']) !!}
            @include('admin.academics.grade.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

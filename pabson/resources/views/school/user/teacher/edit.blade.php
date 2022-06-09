@extends('school.layouts.app')

@section('content')
    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Teacher</h3>
                </div>
            </div>
            {!! Form::model($teacher, ['route' => ['school.teacher.update',$teacher->id], 'files' => 'true', 'method' => 'patch', 'class' => 'kt-form kt-form--label-right', 'id' => 'teacher-form']) !!}
            @include('school.user.teacher.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#subject').select2({
                placeholder: "Select Subject",
                allowClear: true
            });
        });
    </script>

@endpush

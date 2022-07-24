@extends('admin.layouts.master')

@section('content')
    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Create Teacher</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.user.teacher.store'], 'method' => 'post', 'files' => 'true', 'class' => 'kt-form kt-form--label-right', 'id' => 'teacher-form']) !!}
            @include('admin.user.teacher.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#school').select2({
                    placeholder: "Select School",
                    allowClear: true
                }
            );
            $('#subject').select2({
                placeholder: "Select Subject",
                allowClear: true
            });
        });
    </script>

@endpush

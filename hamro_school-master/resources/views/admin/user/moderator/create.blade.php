@extends('admin.layouts.master')

@section('content')
    <section id="moderator-create">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Create Moderator</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.user.moderator.store'], 'method' => 'post', 'files' => 'true', 'class' => 'kt-form kt-form--label-right', 'id' => 'moderator-form']) !!}
            @include('admin.user.moderator.form', ['formAction' => 'Save', 'formMethod' => 'Post'])
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

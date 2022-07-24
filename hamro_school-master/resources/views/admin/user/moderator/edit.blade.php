@extends('admin.layouts.master')

@section('content')
<section id="moderator-edit">
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                </span>
                <h3 class="kt-portlet__head-title">Edit Moderator</h3>
            </div>
        </div>
        {!! Form::model($moderator, ['route' => ['admin.user.moderator.update',$moderator->id], 'files' => 'true', 'method' => 'put', 'class' => 'kt-form kt-form--label-right', 'id' => 'moderator-form']) !!}
        @include('admin.user.moderator.form', ['formAction' => 'Update', 'formMethod' => 'Put'])
        {!! Form::close() !!}

        <div class="row p-4">
            <div class="col-md-12">
                <form action="{{route('admin.user.moderator.reset',$moderator->user_id)}}" method="post">
                    @csrf
                    <button class="btn btn-warning">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('#subject').select2({
            placeholder: "Select Subject",
            allowClear: true
        });
    });
</script>
@endpush
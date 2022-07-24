@extends('teacher.discussion.main')
@section('discussion')
    {!! Form::model(null, ['route' => ['teacher.my-post.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'discussion-form']) !!}
    @include('teacher.discussion.myPost.form', ['formAction' => 'Post'])
    {!! Form::close() !!}
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#subject').select2({
                    placeholder: "Select Subject",
                    allowClear: true
                }
            );
        });
    </script>
@endpush

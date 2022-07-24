@extends('teacher.discussion.main')
@section('discussion')
    {!! Form::model($discussion, ['route' => ['teacher.my-post.update', $discussion->id], 'method' => 'put', 'class' => 'kt-form kt-form--label-right', 'id' => 'discussion-form']) !!}
    @include('teacher.discussion.myPost.form', ['formAction' => 'Update'])
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

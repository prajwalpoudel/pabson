@extends('student.discussion.main')
@section('discussion')
    {!! Form::model(null, ['route' => ['student.my-post.store'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'discussion-form']) !!}
        @include('student.discussion.myPost.form', ['formAction' => 'Post'])
    {!! Form::close() !!}
@endsection

@extends('student.discussion.main')
@section('discussion')
    {!! Form::model($discussion, ['route' => ['student.my-post.update', $discussion->id], 'method' => 'put', 'class' => 'kt-form kt-form--label-right', 'id' => 'discussion-form']) !!}
    @include('student.discussion.myPost.form', ['formAction' => 'Update'])
    {!! Form::close() !!}
@endsection

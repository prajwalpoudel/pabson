@extends('student.discussion.main')

@section('discussion')
    {!! Form::model($comment, ['route' => ['student.discussion.comment.update', $comment->id], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'comment-form']) !!}
    @include('student.discussion.comment.index', ['formAction' => 'Update'])
    {!! Form::close() !!}
@endsection

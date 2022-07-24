@extends('teacher.discussion.main')

@section('discussion')
    {!! Form::model($comment, ['route' => ['teacher.discussion.comment.update', $comment->id], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'comment-form']) !!}
    @include('teacher.discussion.comment.index', ['formAction' => 'Update'])
    {!! Form::close() !!}
@endsection

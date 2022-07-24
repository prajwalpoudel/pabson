@extends('student.layouts.master')

@section('title', 'Student | Dashboard')

@section('content')

    @if(session()->has('system_error'))
        <p style="color: red">{{ session()->get('system_error') }}</p>
    @endif
    <h3>This is a student dashboard section.</h3>
@endsection

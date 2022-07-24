@extends('teacher.layouts.master')

@section('title', 'Teacher | Dashboard')

@section('content')

    @if(session()->has('system_error'))
        <p style="color: red">{{ session()->get('system_error') }}</p>
    @endif
    <h3>This is a teacher dashboard section.</h3>
@endsection

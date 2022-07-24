@extends('teacher.layouts.master')
@section('title')
    Teacher | {{ $notice->title }}
@endsection
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                        </span>
                <h3 class="kt-portlet__head-title">
                    {{ $notice->title }}
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <span>Posted on {{ $notice->posted_on }} </span>
            <div class="kt-img-centered mt-2 mb-1">
                <img src="{{ getImageUrl($notice->image) }}" alt="" height="300" width="98%">
            </div>
            <p>{!! $notice->description !!}</p>
        </div>
        <div class="kt-portlet__foot">
            <a href="{{ route('teacher.notice.index') }}" class="btn btn-primary"><< Back</a>
        </div>
    </div>
@endsection


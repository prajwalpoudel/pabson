@extends('school.layouts.app')
@section('title')
    School | {{ $blog->name }}
@endsection
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                        </span>
                <h3 class="kt-portlet__head-title">
                    {{ $blog->name }}
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <span>Posted on {{ $blog->posted_on }} </span>
            <div class="kt-img-centered mt-2 mb-1">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/1200px-Image_created_with_a_mobile_phone.png" alt="" height="300" width="800">
            </div>
            <p>{!! $blog->description !!}</p>
        </div>
        <div class="kt-portlet__foot">
            <a href="{{ route('school.blog.index') }}" class="btn btn-primary"><< Back</a>
        </div>
    </div>
@endsection


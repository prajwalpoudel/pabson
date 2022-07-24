@extends('front.layouts1.master')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('front') }}/styles/course.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('front') }}/styles/course_responsive.css">
@endpush

@section('breadcrumbs')
    <ul>
        <li><a href="{{ route('search') }}">Home</a></li>
        <li><a href="{{ route('search') }}">Schools</a></li>
        <li>School Detail</li>
    </ul>
@endsection

@section('content')
    <div class="course">
        <div class="container">
            <div class="row">
                <!-- Course -->
                <div class="col-lg-12">

                    <div class="course_container">
                        <div class="course_title">{{ $school->name }}</div>
                        <div class="course_info d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">

                            <!-- Course Info Item -->
                            <div class="course_info_item">
                                <div class="course_info_title">Address:</div>
                                <div class="course_info_text"><p>{{ $school->address }}</p></div>
                            </div>

                            <!-- Course Info Item -->
                            <div class="course_info_item">
                                <div class="course_info_title">Estd:</div>
                                <div class="course_info_text"><p>2010 A.D.</p></div>
                            </div>

                            <!-- Course Info Item -->
                            <div class="course_info_item">
                                <div class="course_info_title">Phone:</div>
                                <div class="course_info_text"><p>{{ $school->phone }}</p></div>
                            </div>

                            <!-- Course Info Item -->
                            @if($school->website_link)
                                <div class="course_info_item">
                                    <div class="course_info_title">Website Link:</div>
                                    <div class="course_info_text"><p>{{ $school->website_link }}</p></div>
                                </div>
                            @endif
                        </div>

                        <!-- Course Image -->
                        <div class="course_image"><img src="images/course_image.jpg" alt=""></div>

                        <!-- Course Tabs -->
                        <div class="course_tabs_container">
                            <div class="tabs d-flex flex-row align-items-center justify-content-start">
                                <div class="tab active">description</div>
                            </div>
                            <div class="tab_panels">

                                <!-- Description -->
                                <div class="tab_panel active">
                                    <div class="tab_panel_content">
                                        <div class="tab_panel_text">
                                            {!! $school->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

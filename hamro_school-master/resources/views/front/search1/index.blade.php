@extends('front.layouts1.master')

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('front') }}/styles/courses.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('front') }}/styles/courses_responsive.css">
@endpush

@section('breadcrumbs')
    <ul>
        <li><a href="{{ route('search') }}">Home</a></li>
        <li>Schools</li>
    </ul>
@endsection

@section('content')
    <div class="courses">
        <div class="container">
            <div class="row">
                <!-- School Sidebar -->
                <div class="col-lg-3">
                    @include('front.search.sidebar')
                </div>
                <!-- School Main Content -->
                <div class="col-lg-9">
                    <div class="courses_search_container">
                        {!! Form::model(request()->all(), ['route' => 'search', 'method' => 'get', 'class' => 'courses_search_form d-flex flex-row align-items-center justify-content-start', 'id' => 'courses_search_form']) !!}
                        {!! Form::text('keyword', null, ['class' => 'courses_search_input', 'placeholder' => 'Search School']) !!}
                        @if(request()->input('province_id'))
                            {!! Form::hidden('province_id', old('province_id', null)) !!}
                        @endif
                        @if(request()->input('district_id'))
                            {!! Form::hidden('district_id', old('district_id', null)) !!}
                        @endif
                        @if(request()->input('municipality_id'))
                            {!! Form::hidden('municipality_id', old('municipality_id', null)) !!}
                        @endif
                        <button action="submit" class="courses_search_button ml-auto">search now</button>
                        {!! Form::close() !!}
                    </div>
                    <div class="courses_container">
                        <div class="row courses_row">

                            <!-- School -->
                            @forelse($schools as $school)
                                <div class="col-lg-6 course_col">
                                    <div class="course">
                                        {{--                                    <div class="course_image"><img src="images/course_4.jpg" alt=""></div>--}}
                                        <div class="course_body">
                                            <h3 class="course_title"><a
                                                    href="{{ route('search.detail', encrypt($school->id)) }}">{{ $school->name }}</a>
                                            </h3>
                                            <div class="course_teacher">Mr. {{ $school->user->full_name ?? null }}</div>
                                            <div class="course_text">
                                                {{ \Illuminate\Support\Str::limit(strip_tags($school->description), 200) }}
                                            </div>
                                        </div>
                                        <div class="course_footer">
                                            <div
                                                class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                                <div class="course_info">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                    <span>{{ $school->phone }}</span>
                                                </div>
                                                <div class="course_info ml-auto">
                                                    <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                                    <span>{{ $school->address }}</span>
                                                </div>
{{--                                                <div class="course_price ml-auto">$130</div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-12">
                                    <div class="no-school">
                                        <p><strong>No School Found</strong></p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                        <div class="row pagination_row">
                            <div class="col">
                                <div
                                    class="pagination_container d-flex flex-row align-items-center justify-content-start">
                                    {{ $schools->links() }}
                                    {{--                                    <ul class="pagination_list">--}}
                                    {{--                                        <li class="active"><a href="#">1</a></li>--}}
                                    {{--                                        <li><a href="#">2</a></li>--}}
                                    {{--                                        <li><a href="#">3</a></li>--}}
                                    {{--                                        <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>--}}
                                    {{--                                    </ul>--}}
                                    <div class="courses_show_container ml-auto clearfix">
                                        @if($schools->count())
                                            <div class="courses_show_text">Showing <span class="courses_showing">{{$schools->firstItem()}}-{{$schools->lastItem()}}</span>
                                                of <span class="courses_total">{{ $schools->total() }}</span> results
                                            </div>
                                        @endif
                                        {{--                                        <div class="courses_show_content">--}}
                                        {{--                                            <span>Show: </span>--}}
                                        {{--                                            <select id="courses_show_select" class="courses_show_select">--}}
                                        {{--                                                <option>10</option>--}}
                                        {{--                                                <option>20</option>--}}
                                        {{--                                                <option>30</option>--}}
                                        {{--                                                <option>40</option>--}}
                                        {{--                                            </select>--}}
                                        {{--                                        </div>--}}
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

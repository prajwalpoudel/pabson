@extends('front.layouts.master')
@section('title')
    Hamro School | Home
@endsection
@section('content')
    <section class="mt-1">
        <div class="container">
            <!-- Row -->
            <div class="row">
                @include('front.home.search.sidebar')

                <div class="col-lg-8 col-md-12 col-sm-12 order-1 order-lg-2 order-md-1">

                    <!-- Row -->
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            We found <strong>{{ $schools->total() }}</strong> schools for you
                        </div>
{{--                        <div class="col-lg-6 col-md-6 col-sm-12 ordering">--}}
{{--                            <div class="filter_wraps">--}}
{{--                                <div class="dropdown show">--}}
{{--                                    <a class="btn btn-custom dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                        Recent Courses--}}
{{--                                    </a>--}}
{{--                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}
{{--                                        <a class="dropdown-item" href="#">Popular Courses</a>--}}
{{--                                        <a class="dropdown-item" href="#">Recent Courses</a>--}}
{{--                                        <a class="dropdown-item" href="#">Featured Courses</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <!-- /Row -->

                    <div class="row">

                        @foreach($schools as $school)
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="education_block_list_layout">

                                <div class="education_block_thumb n-shadow">
                                    <a href="{{ route('school.detail', encrypt($school->id)) }}"><img src="{{ getImageUrl($school->logo,'700x500') }}" class="img-fluid" alt=""></a>
                                </div>

                                <div class="list_layout_ecucation_caption">

                                    <div class="education_block_body">
                                        <h4 class="bl-title"><a href="{{ route('school.detail', encrypt($school->id)) }}">{{ $school->name }}</a></h4>
                                        <p>{{ $school->address }}</p>
                                        <p><i class="fa fa-user"></i> {{ $school->principal_name }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endforeach


                    </div>

                    <!-- Row -->
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12 col-md-12 col-sm-12">--}}

{{--                            <!-- Pagination -->--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-12 col-md-12 col-sm-12">--}}
{{--                                    <ul class="pagination p-center">--}}
{{--                                        <li class="page-item">--}}
{{--                                            <a class="page-link" href="#" aria-label="Previous">--}}
{{--                                                <span class="ti-arrow-left"></span>--}}
{{--                                                <span class="sr-only">Previous</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                        <li class="page-item active"><a class="page-link" href="#">3</a></li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">...</a></li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">18</a></li>--}}
{{--                                        <li class="page-item">--}}
{{--                                            <a class="page-link" href="#" aria-label="Next">--}}
{{--                                                <span class="ti-arrow-right"></span>--}}
{{--                                                <span class="sr-only">Next</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- /Row -->

                </div>
            </div>
            <!-- Row -->

        </div>
    </section>
@endsection

@extends('front.layouts.master')
@section('title')
Hamro School | Home
@endsection

@section('content')
<!-- ============================ Hero Banner  Start================================== -->
<div class="image-cover hero_banner shadow rlt bg-light">
    <div class="container">
        <!-- Type -->
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="banner-search-2 transparent">
                    <h1 class="big-header-capt cl_2 mb-1 f_1">The Avenue of Exploration</h1>

                    <div class="mt-4">
                        <a href="{{ route('auth.register.school') }}" class="btn btn-modern dark">Register<span><i class="ti-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>


            <div class="flixio">
                <img src="{{ asset('front/') }}/assets/img/1234.png" alt="logo">

            </div>

        </div>
    </div>
</div>
<section>
    <div class="container p-4">
        <div class="row justify-content-center">
            <img src="{{ asset('front/assets/img/banner2.gif') }}" alt="IST Secondary School banner">
        </div>
    </div>
</section>
<!-- ============================ Hero Banner End ================================== -->

<!-- ============================ Featured Courses Start ================================== -->
<section>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">

                    <h3><span class="theme-cl"></span>Workshops, Seminars and Trainings </h3>

                </div>
            </div>
        </div>

        <div class="row">

            <!-- Cource Grid 1 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="education_block_grid style_2">

                    <div class="education_block_thumb n-shadow">
                        <a href="{{ route('coming.soon') }}"><img src="{{ asset('front/') }}/assets/img/EFFECTIVEPRINCIPAL.jpg" class="img-fluid" alt=""></a>
                    </div>

                    <div class="education_block_body">
                        <h4 class="bl-title"><a href="{{ route('coming.soon') }}">The Effective Principal: From words to work. </a></h4>
                    </div>
                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="{{ route('coming.soon') }}"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                            <h5><a href="instructor-detail.html">Mr.abc</a></h5>
                        </div>

                    </div>

                </div>
            </div>

            <!-- Cource Grid 1 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="education_block_grid style_2">

                    <div class="education_block_thumb n-shadow">
                        <a href="{{ route('coming.soon') }}"><img src="{{ asset('front/') }}/assets/img/supervision.jpg" class="img-fluid" alt=""></a>
                    </div>


                    <div class="education_block_body">
                        <h4 class="bl-title"><a href="{{ route('coming.soon') }}">Instructional Supervision and Evaluation </a></h4>
                    </div>

                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="{{ route('coming.soon') }}"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                            <h5><a href="{{ route('coming.soon') }}">Mr.abc</a></h5>
                        </div>

                    </div>

                </div>
            </div>

            <!-- Cource Grid 1 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="education_block_grid style_2">

                    <div class="education_block_thumb n-shadow">
                        <a href="{{ route('coming.soon') }}"><img src="{{ asset('front/') }}/assets/img/changemanagement.jpg" class="img-fluid" alt=""></a>
                    </div>

                    <div class="education_block_body">
                        <h4 class="bl-title"><a href="{{ route('coming.soon') }}">Accepting and Implementing Change Management </a></h4>
                    </div>
                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="{{ route('coming.soon') }}"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                            <h5><a href="{{ route('coming.soon') }}">Mr.abc</a></h5>
                        </div>

                    </div>

                </div>
            </div>

            <!-- Cource Grid 1 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="education_block_grid style_2">

                    <div class="education_block_thumb n-shadow">
                        <a href="{{ route('coming.soon') }}"><img src="{{ asset('front/') }}/assets/img/effectiveschool.jpg" class="img-fluid" alt=""></a>
                    </div>

                    <div class="education_block_body">
                        <h4 class="bl-title"><a href="{{ route('coming.soon') }}">Principal���s Role: Creating an Effective School </a></h4>
                    </div>
                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="{{ route('coming.soon') }}"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                            <h5><a href="{{ route('coming.soon') }}">Mr.abc</a></h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cource Grid 1 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="education_block_grid style_2">

                    <div class="education_block_thumb n-shadow">
                        <a href="{{ route('coming.soon') }}"><img src="{{ asset('front/') }}/assets/img/assessment.jpg" class="img-fluid" alt=""></a>
                    </div>

                    <div class="education_block_body">
                        <h4 class="bl-title"><a href="{{ route('coming.soon') }}">Empowering students through assessments </a></h4>
                    </div>
                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="{{ route('coming.soon') }}"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                            <h5><a href="{{ route('coming.soon') }}">Mr.abc</a></h5>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Cource Grid 1 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="education_block_grid style_2">

                    <div class="education_block_thumb n-shadow">
                        <a href="{{ route('coming.soon') }}"><img src="{{ asset('front/') }}/assets/img/managing.jpg" class="img-fluid" alt=""></a>
                    </div>

                    <div class="education_block_body">
                        <h4 class="bl-title"><a href="{{ route('coming.soon') }}">Teacher leader: Managing Main Stream Classroom </a></h4>
                    </div>
                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="{{ route('coming.soon') }}"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                            <h5><a href="{{ route('coming.soon') }}">Mr.abc</a></h5>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Cource Grid 1 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="education_block_grid style_2">

                    <div class="education_block_thumb n-shadow">
                        <a href="course-detail.html"><img src="{{ asset('front/') }}/assets/img/project.jpg" class="img-fluid" alt=""></a>
                    </div>

                    <div class="education_block_body">
                        <h4 class="bl-title"><a href="course-detail.html">Effective Teacher: Problem, project and design based teaching </a></h4>
                    </div>
                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                            <h5><a href="instructor-detail.html">Mr.abc</a></h5>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Cource Grid 1 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="education_block_grid style_2">

                    <div class="education_block_thumb n-shadow">
                        <a href="course-detail.html"><img src="{{ asset('front/') }}/assets/img/adol.jpg" class="img-fluid" alt=""></a>
                    </div>

                    <div class="education_block_body">
                        <h4 class="bl-title"><a href="course-detail.html">Infancy to Adolescence: They change, you change </a></h4>
                    </div>
                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                            <h5><a href="instructor-detail.html">Mr.abc</a></h5>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Cource Grid 1 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="education_block_grid style_2">

                    <div class="education_block_thumb n-shadow">
                        <a href="course-detail.html"><img src="{{ asset('front/') }}/assets/img/counselling.jpg" class="img-fluid" alt=""></a>
                    </div>

                    <div class="education_block_body">
                        <h4 class="bl-title"><a href="course-detail.html">Getting to Solutions : The heat of counseling </a></h4>
                    </div>
                    <div class="education_block_footer">
                        <div class="education_block_author">
                            <div class="path-img"><a href="instructor-detail.html"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                            <h5><a href="instructor-detail.html">Mr.abc</a></h5>
                        </div>

                    </div>

                </div>
            </div>


        </div>


    </div>
</section>
<div>
    <div class="container p-4">
        <div class="row justify-content-center">
            <img src="{{ asset('front/assets/img/banner2.gif') }}" alt="IST Secondary School banner">
        </div>
    </div>
</div>
<!-- ============================ Featured Courses End ================================== -->

<!-- ============================ Featured Category Start ================================== -->
<section class="bg-light">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">

                    <h3><span class="theme-cl"></span> Teachers' Discussion Forums </h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 p-0">

                <div class="arrow_slide three_slide-dots arrow_middle">

                    <!-- Single Slide -->
                    @foreach($subjects->take(6) as $subject)
                    <div class="singles_items">
                        <div class="edu_cat">
                            <div class="pic">
                                <a class="pic-main" href="#" style="background-image: url({{ $subject->imageurl }});"></a>
                            </div>
                            <div class="edu_data">
                                <h4 class="title"><a href="#">{{$subject->grade->name}} - {{$subject->name}}</a></h4>

                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>

        </div>

    </div>
</section>
<div>
    <div class="container p-4">
        <div class="row justify-content-center">
            <img src="{{ asset('front/assets/img/banner2.gif') }}" alt="IST Secondary School banner">
        </div>
    </div>
</div>
<!-- ============================ Featured Category End ================================== -->

<!-- ========================== About Facts List Section =============================== -->
<section>
    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="list_facts_wrap">


                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="list_facts_wrap_img"> </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
<!-- ========================== About Facts List Section =============================== -->

<!-- ========================== Featured Courses Section =============================== -->
<section class="gray">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">

                    <h3><span class="theme-cl"></span> Online Resources for Students </h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                <div class="filters filter-button-group mb-4">

                    @foreach($grades as $grade)
                    <div data-filter=".{{str_slug($grade->name)}}" class="btn btn-primary dark d-inline-block {{$loop->first ? 'active':''}} m-1">{{$grade->display_name}}</div>
                    @endforeach


                </div>
                <div class="grid-isotope">
                    @foreach($subjects as $subject)
                    <div class="single-item {{str_slug($subject->grade->name)}}">
                        <div class="edu_cat">
                            <div class="pic">
                                <a class="pic-main" href="#" style="background-image: url({{ $subject->imageurl }});"></a>
                            </div>
                            <div class="edu_data">
                                <h4 class="title"><a href="#">{{$subject->grade->name}} - {{$subject->name}}</a></h4>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

</section>
<section>
    <div class="container p-4">
        <div class="row justify-content-center">
            <img src="{{ asset('front/assets/img/banner2.gif') }}" alt="IST Secondary School banner">
        </div>
    </div>
</section>
<!-- ========================== Featured Courses Section =============================== -->

<!-- ============================ Testimonial Start ================================== -->
<section style="background:url({{ asset('front/') }}/assets/img/testimonial.png)">

</section>
<!-- ============================ Testimonial End ================================== -->

<!-- ========================== Brand Section =============================== -->
<section class="pt-2">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">

                    <h3><span class="theme-cl"></span>Hamro School Family</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="single_brand" id="brand-slide">
                    <!-- single -->
                    @foreach($schools as $school)
                    <div class="single_brands">
                        <a href="{{ route('school.detail', encrypt($school->id)) }}">
{{--                             <img src="{{ getImageUrl($school->logo, '200x65') }}" class="img-fluid" alt=""/>--}}
                            <img src="{{ asset('front/') }}/assets/img/lo444.png" class="img-fluid" alt="" />

                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========================== Brand Section =============================== -->

<!-- ============================== Start Newsletter ================================== -->
<section class="newsletter theme-bg inverse-theme">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 col-sm-12">
                <div class="text-center">

                    <p>Subscribe our newsletter & get latest news and updation !</p>
                    <form class="sup-form">
                        <input type="email" class="form-control sigmup-me" placeholder="Your Email Address" required="required">
                        <input type="submit" class="btn btn-theme" value="Get Started">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================================= End Newsletter =============================== -->
@endsection

@push('script')
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
    $(document).ready(function() {
        $('.grid-isotope').isotope({
            layoutMode: 'fitRows'
        });
        $('.filter-button-group').on('click', 'div', function() {
            var filterValue = $(this).attr('data-filter');
            $('.grid-isotope').isotope({
                filter: filterValue,
                layoutMode: 'fitRows'
            });
            $('.filter-button-group div').removeClass('active');
            $(this).addClass('active');
        });

        $('.filters div.active').trigger('click');
    })


    // filter items on button click
</script>
<style>
    .grid-isotope {
        width: 100%;
    }

    .single-item {
        width: 300px;
        margin-left: 5px;
        margin-right: 5px;
    }



    .filters {
        width: 100%;
        text-align: center;
    }


    .filters div:hover {
        color: #a6a6a6;
    }

    .filters div.active {
        color: #ccc;
        border: 1px solid #ccc;
    }
</style>
@endpush

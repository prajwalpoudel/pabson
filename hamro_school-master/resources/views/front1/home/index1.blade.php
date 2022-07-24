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
                            <a href="{{ route('auth.register.school') }}" class="btn btn-modern dark">Register<span><i
                                        class="ti-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>


                <div class="flixio">
                    <img src="{{ asset('front/assets/img/banner.png') }}" alt="logo">

                </div>

            </div>
        </div>
    </div>

    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Featured Courses Start ================================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="sec-heading center">
                        {{--                        <p>New &amp; Trending</p>--}}
                        <h2><span class="theme-cl">Teacher Discussion Forums</span></h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($discussions as $discussion)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="education_block_grid style_2">
                            <div class="education_block_thumb n-shadow">
                                <a href="course-detail.html">
                                    <img src="https://via.placeholder.com/700x500" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="education_block_body">
                                <h4 class="bl-title">
                                    <a href="{{ route('auth.login') }}">
                                        {{ $discussion->title }}
                                    </a>
                                </h4>
                            </div>

                            <div class="cources_facts">
                                <ul class="cources_facts_list">
                                    @if(!is_null($discussion->discussionSubjects))
                                        <li class="facts-1">Math</li>
                                    @else
                                        @foreach($discussion->discussionSubjects as $subject)
                                            <li class="facts-1">{{ $subject->name }}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>

                            <div class="education_block_footer">
                                <div class="education_block_author">
                                    <div class="path-img"><a href="instructor-detail.html"><img
                                                src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a>
                                    </div>
                                    <h5><a href="instructor-detail.html">{{ $discussion->user->full_name }}</a></h5>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="text-center">
                        <a href="#" class="btn btn-theme btn-browse-btn">Browse More</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Featured Courses End ================================== -->

    <section>
        <div class="container bg-light p-4">
            <div class="row justify-content-center">
                <img src="{{ asset('front/assets/img/banner2.gif') }}" alt="IST Secondary School banner">
            </div>
        </div>
    </section>

    <!-- ============================ Featured Category Start ================================== -->
    <section class="bg-light">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="sec-heading center">
                        {{--                        <p>Popular Category</p>--}}
                        <h2><span class="theme-cl">Trainings</span></h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 p-0">

                    <div class="arrow_slide three_slide-dots arrow_middle">

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="edu_cat">
                                <div class="pic">
                                    <a class="pic-main" href="#"
                                       style="background-image:url(https://www.qriyo.com/blog/wp-content/uploads/2018/02/Personality-development.jpg);"></a>
                                </div>
                                <div class="edu_data">
                                    <h4 class="title"><a href="#">Personality Development</a></h4>
                                    <ul class="meta">
                                        <li class="video"><i class="ti-video-clapper"></i>23 Videos</li>
                                        <li class="lessions"><i class="ti-book"></i>54 Lessions</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="edu_cat">
                                <div class="pic">
                                    <a class="pic-main" href="#"
                                       style="background-image:url(https://thumbs.dreamstime.com/b/group-diverse-people-holding-health-fitness-icons-group-diverse-people-holding-health-fitness-icons-127382644.jpg);"></a>
                                </div>
                                <div class="edu_data">
                                    <h4 class="title"><a href="#">Health & Fitness</a></h4>
                                    <ul class="meta">
                                        <li class="video"><i class="ti-video-clapper"></i>23 Videos</li>
                                        <li class="lessions"><i class="ti-book"></i>54 Lessions</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="edu_cat">
                                <div class="pic">
                                    <a class="pic-main" href="#"
                                       style="background-image:url(https://us.123rf.com/450wm/pratyaksa/pratyaksa1607/pratyaksa160700007/59777608-software-development-programmer-working-on-computer-programming-mechanism-concept-.jpg);"></a>
                                </div>
                                <div class="edu_data">
                                    <h4 class="title"><a href="#">Computer Programming</a></h4>
                                    <ul class="meta">
                                        <li class="video"><i class="ti-video-clapper"></i>23 Videos</li>
                                        <li class="lessions"><i class="ti-book"></i>54 Lessions</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="edu_cat">
                                <div class="pic">
                                    <a class="pic-main" href="#"
                                       style="background-image:url(https://zoetalentsolutions.com/wp-content/uploads/2020/09/Business-Communication-Skills-Training-Course.png);"></a>
                                </div>
                                <div class="edu_data">
                                    <h4 class="title"><a href="#">Communication and Writing</a></h4>
                                    <ul class="meta">
                                        <li class="video"><i class="ti-video-clapper"></i>23 Videos</li>
                                        <li class="lessions"><i class="ti-book"></i>54 Lessions</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ============================ Featured Category End ================================== -->

    <section>
        <div class="container bg-light p-4">
            <div class="row justify-content-center">
                <img src="{{ asset('front/assets/img/banner3.gif') }}"
                     alt="Universal College banner">
            </div>
        </div>
    </section>
    <!-- ========================== About Facts List Section =============================== -->
    <section>
        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="list_facts_wrap">
                        <div class="sec-heading mb-3">
                            <h2><span class="theme-cl">Promote Your Institution</span></h2>
                        </div>
                        <div class="list_facts">
                            <div class="list_facts_icons"><i class="ti-desktop"></i></div>
                            <div class="list_facts_caption">
                                <h4>Nemo enim ipsam voluptatem quia.</h4>
                                <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure</p>
                            </div>
                        </div>
                        <div class="list_facts">
                            <div class="list_facts_icons"><i class="ti-heart"></i></div>
                            <div class="list_facts_caption">
                                <h4>Nemo enim ipsam voluptatem quia.</h4>
                                <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure</p>
                            </div>
                        </div>
                        <div class="list_facts">
                            <div class="list_facts_icons"><i class="ti-harddrives"></i></div>
                            <div class="list_facts_caption">
                                <h4>Nemo enim ipsam voluptatem quia.</h4>
                                <p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure</p>
                            </div>
                        </div>

                    </div>
                    <a href="#" class="btn btn-modern">Know More<span><i class="ti-arrow-right"></i></span></a>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="list_facts_wrap_img">
                        <img src="{{ asset('front/assets/img/banner4.gif') }}"
                             alt="Kantipur College of Management and Information Technology (KCMIT) banner">
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
                        {{--                        <p>Hot &amp; Trending</p>--}}
                        <h2><span class="theme-cl">Online Courses</span></h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 p-0">

                    <div class="arrow_slide three_slide-dots arrow_middle">

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid style_2">

                                <div class="education_block_thumb">
                                    <a href="course-detail.html"><img src="https://via.placeholder.com/700x500"
                                                                      class="img-fluid" alt=""></a>
                                    <div class="education_ratting"><i class="fa fa-star"></i>4.7 (40)</div>
                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title"><a href="course-detail.html">The Complete Business Plan Course
                                            (Includes 50 Templates)</a></h4>
                                </div>

                                <div class="cources_info_style3">
                                    <ul>
                                        <li><i class="ti-eye mr-2"></i>10682 Views</li>
                                        <li><i class="ti-control-skip-forward mr-2"></i>82 Lectures</li>
                                        <li><i class="ti-time mr-2"></i>9h 45min</li>
                                    </ul>
                                </div>

                                <div class="education_block_footer">
                                    <div class="education_block_author">
                                        <div class="path-img"><a href="instructor-detail.html"><img
                                                    src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a>
                                        </div>
                                        <h5><a href="instructor-detail.html">Litha Jethaani</a></h5>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid style_2">

                                <div class="education_block_thumb">
                                    <a href="course-detail.html"><img src="https://via.placeholder.com/700x500"
                                                                      class="img-fluid" alt=""></a>
                                    <div class="education_ratting"><i class="fa fa-star"></i>4.9 (29)</div>
                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title"><a href="course-detail.html">An Entire MBA In 1 Course:Award
                                            Winning Business School Prof</a></h4>
                                </div>

                                <div class="cources_info_style3">
                                    <ul>
                                        <li><i class="ti-eye mr-2"></i>9882 Views</li>
                                        <li><i class="ti-control-skip-forward mr-2"></i>47 Lectures</li>
                                        <li><i class="ti-time mr-2"></i>6h 30min</li>
                                    </ul>
                                </div>

                                <div class="education_block_footer">
                                    <div class="education_block_author">
                                        <div class="path-img"><a href="instructor-detail.html"><img
                                                    src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a>
                                        </div>
                                        <h5><a href="instructor-detail.html">Adam Gilvork</a></h5>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid style_2">

                                <div class="education_block_thumb">
                                    <a href="course-detail.html"><img src="https://via.placeholder.com/700x500"
                                                                      class="img-fluid" alt=""></a>
                                    <div class="education_ratting"><i class="fa fa-star"></i>4.7 (60)</div>
                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title"><a href="course-detail.html">The Complete Financial Analyst
                                            Course 2020</a></h4>
                                </div>

                                <div class="cources_info_style3">
                                    <ul>
                                        <li><i class="ti-eye mr-2"></i>5882 Views</li>
                                        <li><i class="ti-control-skip-forward mr-2"></i>52 Lectures</li>
                                        <li><i class="ti-time mr-2"></i>5h 15min</li>
                                    </ul>
                                </div>

                                <div class="education_block_footer">
                                    <div class="education_block_author">
                                        <div class="path-img"><a href="instructor-detail.html"><img
                                                    src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a>
                                        </div>
                                        <h5><a href="instructor-detail.html">Shilpa Shekh</a></h5>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid style_2">

                                <div class="education_block_thumb">
                                    <a href="course-detail.html"><img src="https://via.placeholder.com/700x500"
                                                                      class="img-fluid" alt=""></a>
                                    <div class="education_ratting"><i class="fa fa-star"></i>4.8 (45)</div>
                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title"><a href="course-detail.html">PMP Exam Prep Seminar - PMBOK
                                            Guide 6</a></h4>
                                </div>

                                <div class="cources_info_style3">
                                    <ul>
                                        <li><i class="ti-eye mr-2"></i>4732 Views</li>
                                        <li><i class="ti-control-skip-forward mr-2"></i>32 Lectures</li>
                                        <li><i class="ti-time mr-2"></i>3h 30min</li>
                                    </ul>
                                </div>

                                <div class="education_block_footer">
                                    <div class="education_block_author">
                                        <div class="path-img"><a href="instructor-detail.html"><img
                                                    src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a>
                                        </div>
                                        <h5><a href="instructor-detail.html">Shaurya Preet</a></h5>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid style_2">

                                <div class="education_block_thumb">
                                    <a href="course-detail.html"><img src="https://via.placeholder.com/700x500"
                                                                      class="img-fluid" alt=""></a>
                                    <div class="education_ratting"><i class="fa fa-star"></i>4.7 (40)</div>
                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title"><a href="course-detail.html">Tableau 2020 A-Z:Hands-On Tableau
                                            Training For Data Science!</a></h4>
                                </div>

                                <div class="cources_info_style3">
                                    <ul>
                                        <li><i class="ti-eye mr-2"></i>7582 Views</li>
                                        <li><i class="ti-control-skip-forward mr-2"></i>62 Lectures</li>
                                        <li><i class="ti-time mr-2"></i>3h 10min</li>
                                    </ul>
                                </div>

                                <div class="education_block_footer">
                                    <div class="education_block_author">
                                        <div class="path-img"><a href="instructor-detail.html"><img
                                                    src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a>
                                        </div>
                                        <h5><a href="instructor-detail.html">Litha Anshal</a></h5>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid style_2">

                                <div class="education_block_thumb">
                                    <a href="course-detail.html"><img src="https://via.placeholder.com/700x500"
                                                                      class="img-fluid" alt=""></a>
                                    <div class="education_ratting"><i class="fa fa-star"></i>4.8 (70)</div>
                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title"><a href="course-detail.html">Tableau For Beginners: Get CA
                                            Certified, Grow Your Career</a></h4>
                                </div>

                                <div class="cources_info_style3">
                                    <ul>
                                        <li><i class="ti-eye mr-2"></i>7482 Views</li>
                                        <li><i class="ti-control-skip-forward mr-2"></i>63 Lectures</li>
                                        <li><i class="ti-time mr-2"></i>6h 30min</li>
                                    </ul>
                                </div>

                                <div class="education_block_footer">
                                    <div class="education_block_author">
                                        <div class="path-img"><a href="instructor-detail.html"><img
                                                    src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a>
                                        </div>
                                        <h5><a href="instructor-detail.html">Dhananjay Preet</a></h5>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ========================== Featured Courses Section =============================== -->

    <!-- ============================ Testimonial Start ================================== -->
    <section style="background:url(assets/img/testimonial.png)">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="sec-heading center">
                        {{--                        <p>What People Say?</p>--}}
                        <h2><span class="theme-cl">What People Say?</span></h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div id="testimonials_style" class="slick-carousel-3 arrow_middle">
                        <div class="testimonial-detail">
                            <div class="client-detail-box">
                                <div class="pic">
                                    <img src="https://via.placeholder.com/500x500" alt="">
                                </div>
                                <div class="client-detail">
                                    <h3 class="testimonial-title">Adam Alloriam</h3>
                                    <span class="post">Web Developer</span>
                                </div>
                            </div>
                            <p class="description">
                                " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi
                                facilis itaque minus non odio, quaerat ullam eligendi facilis itaque minus non odio,
                                quaerat ullam unde unde voluptatum Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Autem commodi eligendi. "
                            </p>
                        </div>

                        <div class="testimonial-detail">
                            <div class="client-detail-box">
                                <div class="pic">
                                    <img src="https://via.placeholder.com/500x500" alt="">
                                </div>
                                <div class="client-detail">
                                    <h3 class="testimonial-title">Illa Millia</h3>
                                    <span class="post">Project Manager</span>
                                </div>
                            </div>
                            <p class="description">
                                " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi
                                facilis itaque minus non odio, quaerat ullam unde voluptatum eligendi facilis itaque
                                minus non odio, quaerat ullam unde Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Autem commodi eligendi."
                            </p>
                        </div>

                        <div class="testimonial-detail">
                            <div class="client-detail-box">
                                <div class="pic">
                                    <img src="https://via.placeholder.com/500x500" alt="">
                                </div>
                                <div class="client-detail">
                                    <h3 class="testimonial-title">Rout Millance</h3>
                                    <span class="post">Web Designer</span>
                                </div>
                            </div>
                            <p class="description">
                                " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi
                                facilis itaque minus non odio, quaerat ullam unde voluptatum Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit. Autem commodi eligendi."
                            </p>
                        </div>

                        <div class="testimonial-detail">
                            <div class="client-detail-box">
                                <div class="pic">
                                    <img src="https://via.placeholder.com/500x500" alt="">
                                </div>
                                <div class="client-detail">
                                    <h3 class="testimonial-title">williamson</h3>
                                    <span class="post">Web Developer</span>
                                </div>
                            </div>
                            <p class="description">
                                " Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi
                                facilis itaque minus non odio, quaerat ullam unde voluptatum eligendi facilis itaque
                                minus non odio, quaerat ullam unde ? "
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Testimonial End ================================== -->

    <!-- ========================== Brand Section =============================== -->
    <section class="pt-2">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="sec-heading center">
                        {{--                        <p>New &amp; Trending</p>--}}
                        <h2><span class="theme-cl">Hamro School Family</span></h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="single_brand" id="brand-slide">

                        @foreach($schools as $school)
                            <div class="single_brands">
                                <a href="{{ route('school.detail', encrypt($school->id)) }}">
                                    <img src="{{ getImageUrl($school->logo, '200x65') }}" class="img-fluid" alt=""/>
                                </a>
                            </div>
                        @endforeach
                    <!-- single -->
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
                        {{--                        <h2>Join Thousand of Happy Students!</h2>--}}
                        {{--                        <p>Subscribe our newsletter & get latest news and updation!</p>--}}
                        <h2>Subscribe our newsletter & get latest news and updation!</h2>

                        <form class="sup-form">
                            <input type="email" class="form-control sigmup-me" placeholder="Your Email Address"
                                   required="required">
                            <input type="submit" class="btn btn-theme" value="Get Started">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================= End Newsletter =============================== -->
@endsection

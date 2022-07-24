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
                        <h1 class="big-header-capt cl_2 mb-2 f_2">PABSON . ACADEMY</h1>
                        <p style="font-size: 20px">The Online School</p>
                        <div class="mt-4">
                            <a href="{{ route('auth.register.school') }}" class="btn btn-modern dark">Register<span><i class="ti-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="flixio">
                        <img class="img-fluid" src="{{ asset('front') }}/assets/img/pabson.PNG" alt="" height="450" width="450">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Workshop and Trainings ================================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="sec-heading center">
                        <h3>Workshops, Seminars And Trainings</h3>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/EFFECTIVEPRINCIPAL.jpg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">The Effective Principal: From Words To Work.</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/supervision.jpg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Instructional Supervision And Evaluation</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/changemanagement.jpg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Accepting And Implementing Change Management</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/effectiveschool.jpg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Principal's Role: Creating An Effective School</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/assessment.jpg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Empowering Students Through Assessments</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/managing.jpg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Teacher Leader: Managing Main Stream Classroom</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/project.jpg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Effective Teacher: Problem, Project And Design Based Teaching</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/adol.jpg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Infancy To Adolescence: They Change, You Change</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/counselling.jpg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Getting To Solutions : The Heat Of Counseling</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


        </div>
    </section>

    <!-- ============================ teachers' resources ================================== -->
    <hr>
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="sec-heading center">
                        <h3>Teachers' Planners & Resources</h3>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/mat-7.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Mathematics Resources</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/acc-10.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Economics Resources</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/om-10.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Optional Mathematics</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/eng-9.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">English Resources</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/sci-7.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Science Resources</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/Cs-9.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Programming Resources</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/acc-10.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Account Resource</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/soc-8.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Social Resources</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/Nepali-5.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Nepali Resources</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Mr.ABC</a></h5>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


        </div>
    </section>

    <!-- ============================ Teachers' Discussion Forum ================================== -->
    <hr>
    <section class="bg-light">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="sec-heading center">

                        <h2>Teachers' Discussion Forum</h2>
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
                                    <a class="pic-main" href="#" style="background-image:url(https://cdn.corporatefinanceinstitute.com/assets/economics.jpeg);"></a>
                                </div>
                                <div class="edu_data">
                                    <h4 class="title"><a href="#">Economics Discussion Forum</a></h4>
                                    <ul class="meta">
                                        <!--												<li class="video"><i class="ti-video-clapper"></i>23 Discussions Initiated</li>-->

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="edu_cat">
                                <div class="pic">
                                    <a class="pic-main" href="#" style="background-image:url(https://www.stoodnt.com/blog/wp-content/uploads/2021/10/branches_of_mathematics.jpg);"></a>
                                </div>
                                <div class="edu_data">
                                    <h4 class="title"><a href="#">Mathematics Discussion Forum</a></h4>
                                    <!--											<ul class="meta">-->
                                    <!--												<li class="video"><i class="ti-video-clapper"></i>23 Videos</li>-->
                                    <!--												<li class="lessions"><i class="ti-book"></i>54 Lessions</li>-->
                                    <!--											</ul>-->
                                </div>
                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="edu_cat">
                                <div class="pic">
                                    <a class="pic-main" href="#" style="background-image:url(https://img.freepik.com/free-vector/retro-science-education-background_23-2148476365.jpg?w=2000);"></a>
                                </div>
                                <div class="edu_data">
                                    <h4 class="title"><a href="#">Science Discussion Forum</a></h4>

                                </div>
                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="edu_cat">
                                <div class="pic">
                                    <a class="pic-main" href="#" style="background-image:url('https://www.verywellmind.com/thmb/oPmhCL9YiyoNgmTJFpiTbuah2Sk=/1500x1000/filters:fill(ABEAC3,1)/how-to-cope-with-social-awkwardness-afterCOVID-19_nologo-a3ceae91255042c19e98c2e9539ae5b7.png');"></a>
                                </div>
                                <div class="edu_data">
                                    <h4 class="title"><a href="#">Social Discussion Forum</a></h4>
                                </div>
                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="edu_cat">
                                <div class="pic">
                                    <a class="pic-main" href="#" style="background-image:url(https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Nepal-text.svg/1200px-Nepal-text.svg.png);"></a>
                                </div>
                                <div class="edu_data">
                                    <h4 class="title"><a href="#">Nepali Discussion Forum</a></h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ============================ Students' resources ================================== -->
    <hr>
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="sec-heading center">
                        <h3>Students' Resources</h3>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/Cs-9.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Computer Resources</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Class-9</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/soc-8.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Social Resources</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Class-8</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/acc-10.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Accountancy Resources</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Class-10</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/eng-9.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">English Resources</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Class-9</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/Nepali-5.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Nepali Resources</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Class-5</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/om-10.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Optional Mathematics Resources</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Class-10</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/sci-7.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Science Resources</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Class-9</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/mat-9.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Mathematics Resources</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Class-9</a></h5>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="education_block_grid style_2">

                        <div class="education_block_thumb n-shadow">
                            <a href="#"><img src="{{ asset('front') }}/assets/img/mat-7.jpeg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="education_block_body">
                            <h4 class="bl-title"><a href="#">Mathematics Resources</a></h4>
                        </div>

                        <div class="education_block_footer">
                            <div class="education_block_author">
                                <div class="path-img"><a href="#"><img src="https://via.placeholder.com/500x500" class="img-fluid" alt=""></a></div>
                                <h5><a href="#">Class-7</a></h5>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


        </div>
    </section>



    <hr>

    <!-- ========================== Featured Courses Section =============================== -->
    <section class="gray">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="sec-heading center">
                        <h2>Online Classes</h2>
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
                                    <iframe width="420" height="315"
                                            src="https://www.youtube.com/embed/Y4s4k0lVOCs">
                                    </iframe>

                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title">Mathematics</h4>
                                </div>

                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid style_2">

                                <div class="education_block_thumb">
                                    <iframe width="420" height="315"
                                            src="https://www.youtube.com/embed/Z_VrxSM1H8c">
                                    </iframe>

                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title">Science</h4>
                                </div>

                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid style_2">

                                <div class="education_block_thumb">
                                    <iframe width="420" height="315"
                                            src="https://www.youtube.com/embed/MI288_txHCw">
                                    </iframe>

                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title">Social</h4>
                                </div>

                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid style_2">

                                <div class="education_block_thumb">
                                    <iframe width="420" height="315"
                                            src="https://www.youtube.com/embed/lCgTtVZYqso">
                                    </iframe>

                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title">Economics</h4>
                                </div>

                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid style_2">

                                <div class="education_block_thumb">
                                    <iframe width="420" height="315"
                                            src="https://www.youtube.com/embed/fh7wi0-aCpQ">
                                    </iframe>

                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title">Account</h4>
                                </div>

                            </div>
                        </div>



                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ========================== Brand Section =============================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="sec-heading center">
                        <h2><span class="theme-cl">Our</span><span style="color:rgba(12,45,120); "> Member Schools</span></h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="single_brand" id="brand-slide">

                        <!-- scl-a -->
                        <div class="single_brands">
                            <img src="{{ asset('front') }}/assets/img/scl-a.png" class="img-fluid" alt="" />
                        </div>

                        <!-- scl-b -->
                        <div class="single_brands">
                            <img src="{{ asset('front') }}/assets/img/scl-b.png" class="img-fluid" alt="" />
                        </div>

                        <!-- scl-c -->
                        <div class="single_brands">
                            <img src="{{ asset('front') }}/assets/img/scl-c.png" class="img-fluid" alt="" />
                        </div>

                        <!-- scl-d -->
                        <div class="single_brands">
                            <img src="{{ asset('front') }}/assets/img/scl-d.png" class="img-fluid" alt="" />
                        </div>

                        <!-- scl-e -->
                        <div class="single_brands">
                            <img src="{{ asset('front') }}/assets/img/scl-e.png" class="img-fluid" alt="" />
                        </div>

                        <!-- scl-f -->
                        <div class="single_brands">
                            <img src="{{ asset('front') }}/assets/img/scl-f.png" class="img-fluid" alt="" />
                        </div>

                        <!-- scl-g -->
                        <div class="single_brands">
                            <img src="{{ asset('front') }}/assets/img/scl-g.png" class="img-fluid" alt="" />
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================== Start Newsletter ================================== -->
    <section class="newsletter theme-bg inverse-theme">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8 col-sm-12">
                    <div class="text-center">
                        <h2>Subscribe to our newsletter</h2>

                        <form class="sup-form">
                            <input type="email" class="form-control sigmup-me" placeholder="Your Email Address" required="required">
                            <input type="submit" class="btn btn-theme" value="Get Started">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

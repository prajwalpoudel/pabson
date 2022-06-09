@extends('front.layouts.master')
@section('title')
    Hamro School | School | Detail
@endsection
@section('content')
    <!-- ============================ Course Header Info Start================================== -->
    <div class="image-cover ed_detail_head lg theme-ov" style="background:#f4f4f4" data-overlay="9">
        <div class="container">
            <div class="row">

                <div class="col-lg-7 col-md-9">
                    <div class="ed_detail_wrap light">
                        <ul class="cources_facts_list">
                            <li class="facts-1">{{ $school->province->name }}</li>
                            <li class="facts-5">{{ $school->district->name }}</li>
                            <li class="facts-1">{{ $school->municipality->name }}</li>
                        </ul>
                        <div class="ed_header_caption">
                            <h2 class="ed_title">{{ $school->name }}</h2>
                            <ul>
                                <li><i class="fa fa-user"></i>{{ $school->principal_name }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Course Header Info End ================================== -->

    <!-- ============================ Course Detail ================================== -->
    <section class="bg-light pt-0">
        <div class="container">
            <div class="row">

                <div class="col-md-12 pt-5">
                    <!-- All Info Show in Tab -->
                    <div class="tab_box_info mt-4">
                        <ul class="nav nav-pills mb-3 light" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="description-tab" data-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="principal-message-tab" data-toggle="pill" href="#principal-message" role="tab" aria-controls="principal-message" aria-selected="false">Principal Message</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="gallery-tab" data-toggle="pill" href="#gallery" role="tab" aria-controls="gallery" aria-selected="false">Gallery</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <!-- Overview Detail -->
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <!-- Overview -->
                                <div class="edu_wraper">
                                    {!! $school->description == '' ? "No Description to show." : $school->description !!}
                                </div>
                            </div>

                            <!-- Curriculum Detail -->
                            <div class="tab-pane fade" id="principal-message" role="tabpanel" aria-labelledby="principal-message-tab">
                                <div class="edu_wraper">
                                    {!! $school->principal_message == '' ? "No Messsage to show." : $school->principal_message !!}
                                </div>
                            </div>

                            <!-- Instructor Detail -->
                            <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                                <div class="edu_wraper">
                                    {!! $school->description == '' ? "No Gallery to show." : $school->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Course Detail ================================== -->
@endsection

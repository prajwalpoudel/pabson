@extends('school.layouts.app')

@section('title', 'School | Dashboard')

@push('style')
    <style>
        #teacher_chart {
            width: 80%;
            height: 300px;
        }

        #student_chart {
            width: 80%;
            height: 300px;
        }
    </style>
@endpush

@section('content')

    @if(session()->has('system_error'))
        <p style="color: red">{{ session()->get('system_error') }}</p>
    @endif

    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                        </span>
                <h3 class="kt-portlet__head-title">
                   {{auth()->user()->school->name}}'s Dashboard
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="row ">
                <div class="col-lg-6">

                    <!--begin:: Widgets/Profit Share-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-widget14">
                            <div class="kt-widget14__header">
                                <h3 class="kt-widget14__title">
                                    Teachers
                                </h3>
                            </div>
                            <div class="kt-widget14__content">

                            </div>
                        </div>
                    </div>

                    <!--end:: Widgets/Profit Share-->
                </div>
                <div class="col-lg-6">

                    <!--begin:: Widgets/Profit Share-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-widget14">
                            <div class="kt-widget14__header">
                                <h3 class="kt-widget14__title">
                                    Students
                                </h3>
                            </div>
                            <div class="kt-widget14__content">

                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Profit Share-->
                </div>
            </div>
        </div>
    </div>
@endsection



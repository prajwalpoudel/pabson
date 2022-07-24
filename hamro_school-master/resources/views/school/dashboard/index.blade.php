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
                                @if(count($teacherData))
                                    <div id="teacher_chart"></div>
                                @else
                                    <span>No data available.</span>
                                @endif
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
                                @if(count($studentData))
                                    <div id="student_chart"></div>
                                @else
                                    <span>No data available.</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Profit Share-->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
            am4core.ready(function () {
            am4core.useTheme(am4themes_animated);

            var teacherChart = am4core.create("teacher_chart", am4charts.PieChart);
            teacherChart.innerRadius = am4core.percent(30);
            teacherChart.legend = new am4charts.Legend();
            var teacherPieSeries = teacherChart.series.push(new am4charts.PieSeries());
            teacherPieSeries.dataFields.value = "numbers";
            teacherPieSeries.dataFields.category = "status";
            teacherPieSeries.labels.template.disabled = true;
            teacherPieSeries.ticks.template.disabled = true;
            teacherPieSeries.slices.template.propertyFields.fill = "color";


            var studentChart = am4core.create("student_chart", am4charts.PieChart);
            studentChart.innerRadius = am4core.percent(30);
            studentChart.legend = new am4charts.Legend();
            var studentPieSeries = studentChart.series.push(new am4charts.PieSeries());
            studentPieSeries.dataFields.value = "numbers";
            studentPieSeries.dataFields.category = "status";
            studentPieSeries.labels.template.disabled = true;
            studentPieSeries.ticks.template.disabled = true;
            studentPieSeries.slices.template.propertyFields.fill = "color";

            // Teacher Data
            var teacherChartData  = [];
            var teacherData = {!! json_encode($teacherData) !!}
            $.each(teacherData, function( index, value ) {
                teacherChartData.push({
                    'status' : value.status,
                    'numbers' : value.numbers,
                    'color' : am4core.color(value.color)
                })
            });
            teacherChart.data = teacherChartData;

            // StudentData
            var studentChartData  = [];
            var studentData = {!! json_encode($studentData) !!}
            $.each(studentData, function( index, value ) {
                studentChartData.push({
                    'status' : value.status,
                    'numbers' : value.numbers,
                    'color' : am4core.color(value.color)
                })
            });
            studentChart.data = studentChartData;
        }); // end am4core.ready()
    </script>
@endpush


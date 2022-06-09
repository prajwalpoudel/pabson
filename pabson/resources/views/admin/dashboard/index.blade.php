@extends('admin.layouts.master')

@push('style')
    <style>
        #school_chart {
            width: 80%;
            height: 300px;
        }

        #teacher_chart {
            width: 80%;
            height: 300px;
        }

        #student_chart {
            width: 80%;
            height: 300px;
        }

        #moderator_chart {
            width: 80%;
            height: 300px;
        }
    </style>
@endpush

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                        </span>
                <h3 class="kt-portlet__head-title">
                    Dashboard
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
                                    Schools
                                </h3>
                            </div>
                            <div class="kt-widget14__content">
                                @if($schoolData)
                                    <div id="school_chart"></div>
                                    @else
                                    <span>No data available</span>
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
                                    Teachers
                                </h3>
                            </div>
                            <div class="kt-widget14__content">
                                <div id="teacher_chart"></div>
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
                                <div id="student_chart"></div>
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
                                    Moderators
                                </h3>
                            </div>
                            <div class="kt-widget14__content">
                                <div id="moderator_chart"></div>
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
// Themes begin
            am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
            var schoolChart = am4core.create("school_chart", am4charts.PieChart);
            schoolChart.innerRadius = am4core.percent(30);
            schoolChart.legend = new am4charts.Legend();
            var schoolPieSeries = schoolChart.series.push(new am4charts.PieSeries());
            schoolPieSeries.dataFields.value = "numbers";
            schoolPieSeries.dataFields.category = "status";
            schoolPieSeries.labels.template.disabled = true;
            schoolPieSeries.ticks.template.disabled = true;
            schoolPieSeries.slices.template.propertyFields.fill = "color";



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


            var moderatorChart = am4core.create("moderator_chart", am4charts.PieChart);
            moderatorChart.innerRadius = am4core.percent(30);
            moderatorChart.legend = new am4charts.Legend();
            var moderatorPieSeries = moderatorChart.series.push(new am4charts.PieSeries());
            moderatorPieSeries.dataFields.value = "numbers";
            moderatorPieSeries.dataFields.category = "status";
            moderatorPieSeries.labels.template.disabled = true;
            moderatorPieSeries.ticks.template.disabled = true;
            moderatorPieSeries.slices.template.propertyFields.fill = "color";


        // School Data
            var schoolChartData  = [];
            var schoolData = {!! json_encode($schoolData) !!}
            $.each(schoolData, function( index, value ) {
                schoolChartData.push({
                    'status' : value.status,
                    'numbers' : value.numbers,
                    'color' : am4core.color(value.color)
                })
            });
            schoolChart.data = schoolChartData;


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

            // ModeratorData
            var moderatorChartData  = [];
            var moderatorData = {!! json_encode($moderatorData) !!}
            $.each(moderatorData, function( index, value ) {
                moderatorChartData.push({
                    'status' : value.status,
                    'numbers' : value.numbers,
                    'color' : am4core.color(value.color)
                })
            });
            moderatorChart.data = moderatorChartData;

        }); // end am4core.ready()
    </script>
@endpush

@extends('admin.layouts.master')

@section('content')
    <section id="student-create">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Create Student</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.user.student.store'], 'method' => 'post', 'files' => 'true', 'class' => 'kt-form kt-form--label-right', 'id' => 'student-form']) !!}
            @include('admin.user.student.form', ['formAction' => 'Save', 'formMethod' => 'Post'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection


{{--@push('script')--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#school').change(function () {--}}
{{--                var schoolId = $(this).val();--}}
{{--                getGradeBySchool(schoolId);--}}
{{--            });--}}
{{--        });--}}


{{--        function getGradeBySchool(schoolId, defaultSelected = null) {--}}
{{--            var grades = $('#grade').select2({--}}
{{--                placeholder: 'Select Grade',--}}
{{--                allowClear: true,--}}
{{--                ajax: {--}}
{{--                    url: "/api/school/" + schoolId + '/grades',--}}
{{--                    'dataType': 'json',--}}
{{--                    processResults: function (data) {--}}
{{--                        return {--}}
{{--                            results: $.map(data, function (obj) {--}}
{{--                                return {--}}
{{--                                    id: obj.id,--}}
{{--                                    text: obj.text--}}
{{--                                };--}}
{{--                            })--}}
{{--                        }--}}
{{--                    }--}}
{{--                },--}}
{{--            }).val(defaultSelected).trigger('change');--}}

{{--            if (defaultSelected) {--}}
{{--                _.each(defaultSelected, function (data) {--}}
{{--                    var option = new Option(data.text, data.id, true, true);--}}
{{--                    grades.append(option);--}}
{{--                })--}}
{{--                districts.trigger('change');--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
{{--@endpush--}}


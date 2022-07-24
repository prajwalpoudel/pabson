@extends('admin.layouts.master')

@section('content')
    <section id="student-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Student</h3>
                </div>
            </div>
            {!! Form::model($student, ['route' => ['admin.user.student.update',$student->id], 'files' => 'true', 'method' => 'put', 'class' => 'kt-form kt-form--label-right', 'id' => 'student-form']) !!}
            @include('admin.user.student.form', ['formAction' => 'Update', 'formMethod' => 'Put'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

{{--@push('script')--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            var selectedSchoolId = @json($student->school_id ?? null);--}}
{{--            var selectedGrade = @json(getSelectedGrade($student->grade_id ?? null));--}}
{{--            getGradeBySchool(selectedSchoolId, selectedGrade);--}}

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
{{--                foreach(defaultSelected, function (data) {--}}
{{--                    var option = new Option(data.text, data.id, true, true);--}}
{{--                    grades.append(option);--}}
{{--                })--}}
{{--                grades.trigger('change');--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
{{--@endpush--}}


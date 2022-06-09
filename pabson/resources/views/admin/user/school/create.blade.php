@extends('admin.layouts.master')

@section('content')
    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Create School</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['admin.user.school.store'], 'method' => 'post', 'files' => 'true', 'class' => 'kt-form kt-form--label-right', 'id' => 'school-form']) !!}
            @include('admin.user.school.form', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#province').change(function () {
                var provinceId = $(this).val();
                getDistrictByProvince(provinceId);
            });

            $('#district').change(function () {
                var districtId = $(this).val();
                getMunicipalityByDistrict(districtId);
            });
        });


        function getDistrictByProvince(provinceId, defaultSelected = null) {
            var districts = $('#district').select2({
                placeholder: 'Select District',
                allowClear: true,
                ajax: {
                    url: "/api/province/" + provinceId + '/districts',
                    'dataType': 'json',
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (obj) {
                                return {
                                    id: obj.id,
                                    text: obj.text
                                };
                            })
                        }
                    }
                },
            }).val(defaultSelected).trigger('change');

            if (defaultSelected) {
                _.each(defaultSelected, function (data) {
                    var option = new Option(data.text, data.id, true, true);
                    districts.append(option);
                })
                districts.trigger('change');
            }
        }

        function getMunicipalityByDistrict(districtId, defaultSelected = null) {
            var municipalities = $('#municipality').select2({
                placeholder: 'Select Municipality',
                allowClear: true,
                ajax: {
                    url: "/api/district/" + districtId + '/municipalities',
                    'dataType': 'json',
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (obj) {
                                return {
                                    id: obj.id,
                                    text: obj.text
                                };
                            })
                        }
                    }
                },
            }).val(defaultSelected).trigger('change');

            if (defaultSelected) {
                _.each(defaultSelected, function (data) {
                    var option = new Option(data.text, data.id, true, true);
                    cities.append(option);
                })
                cities.trigger('change');
            }
        }
    </script>
@endpush

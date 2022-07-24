@extends('admin.layouts.master')

@section('content')
    <section id="school-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit School</h3>
                </div>
            </div>
            {!! Form::model($school, ['route' => ['admin.user.school.update',$school->id], 'files' => 'true', 'method' => 'patch', 'class' => 'kt-form kt-form--label-right', 'id' => 'school-form']) !!}
            @include('admin.user.school.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            var selectedProvinceId = @json($school->province_id ?? null);
            var selectedDistrictId = @json($school->district_id ?? null);
            var selectedDistrict = @json(getSelectedDistrict($school->district_id ?? null));
            var selectedMunicipality = @json(getSelectedMunicipality($school->municipality_id ?? null));
            getDistrictByProvince(selectedProvinceId, selectedDistrict);
            getMunicipalityByDistrict( selectedDistrictId, selectedMunicipality);

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
                foreach(defaultSelected, function (data) {
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
                foreach(defaultSelected, function (data) {
                    var option = new Option(data.text, data.id, true, true);
                    municipalities.append(option);
                })
                municipalities.trigger('change');
            }
        }
    </script>
@endpush

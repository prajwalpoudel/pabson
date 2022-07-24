@extends('auth.register.register')
@section('register')
    {!! Form::open(['route' => 'auth.register', 'method' => 'post']) !!}
    {!! Form::hidden('user[role_id]', \App\Constants\RoleConstant::SCHOOL_ID) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('name', "School's Name :") !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => "School's Name"]) !!}
                @error('name')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('email', 'Representative:') !!}
                {!! Form::email('user[email]', null, ['class' => 'form-control', 'placeholder' => 'Representative']) !!}

                @error('user.email')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('username', 'Username :') !!}
                {!! Form::text('user[username]', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}

                @error('user.username')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('phone', 'Phone :') !!}
                {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone']) !!}
                @error('phone')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('password', 'Password :') !!}
                {!! Form::password('user[password]', ['class' => 'form-control']) !!}

                @error('user.password')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('password_confirmation', 'Confirm Password :') !!}
                {!! Form::password('user[password_confirmation]', ['class' => 'form-control']) !!}
                @error('user.password_confirmation')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('principal_name', "Principal's Name :") !!}
                {!! Form::text('principal_name', null, ['class' => 'form-control', 'placeholder' => "Principal's Name"]) !!}
                @error('name')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('principal_email', "Principal's Email :") !!}
                {!! Form::text('principal_email', null, ['class' => 'form-control', 'placeholder' => "Principal's Email"]) !!}

                @error('principal_email')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('province', 'Province :') !!}
                {!! Form::select('province_id', $provinces, null, ['class' => 'form-control', 'placeholder' => 'Select Province', 'id' => 'province']) !!}
                @error('province_id')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('district', 'District :') !!}
                {!! Form::select('district_id', [], null, ['class' => 'form-control', 'placeholder' => 'Select District', 'id' => 'district']) !!}
                @error('district_id')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('municipality', 'Municipality :') !!}
                {!! Form::select('municipality_id', [], null, ['class' => 'form-control', 'placeholder' => 'Select Municipality', 'id' => 'municipality']) !!}

                @error('municipality_id')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('ward_number', 'Ward Number :') !!}
                {!! Form::text('ward_number', null, ['class' => 'form-control', 'placeholder' => 'Ward Number']) !!}
                @error('ward_number')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="address">Address:</label>
                <p class="form-control">Address</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('website_link', 'Website Link :') !!}
                {!! Form::text('website_link', null, ['class' => 'form-control', 'placeholder' => 'Website Link']) !!}
                @error('website_link')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <input type="submit" class="btn btn-md full-width pop-login" value="Register"/>
    {!! Form::close() !!}
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
                    municipalities.append(option);
                })
                municipalities.trigger('change');
            }
        }
    </script>
@endpush

<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('name', 'Name :') !!}
            {!! Form::text('name', frontUser()->school->name ?? null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
            @error('name')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('email', 'Email :') !!}
            {!! Form::text('user[email]', frontUser('email') ?? null, ['class' => 'form-control', 'placeholder'=>'example@example.com']) !!}

            @error('user.email')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('username', 'Username :') !!}
            {!! Form::text('user[username]', frontUser('username') ?? null, ['class' => 'form-control', 'placeholder'=>'User Name']) !!}

            @error('user.username')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('phone', 'Phone :') !!}
            {!! Form::text('phone', frontUser()->school->phone ?? null, ['class' => 'form-control', 'placeholder' => 'Phone']) !!}
            @error('phone')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('principal_name', 'Principal Name :') !!}
            {!! Form::text('principal_name', frontUser()->school->principal_name ?? null, ['class' => 'form-control', 'placeholder' => 'Principal Name']) !!}
            @error('principal_name')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('principal_email', 'Principal Email :') !!}
            {!! Form::text('principal_email', frontUser()->school->principal_email ?? null, ['class' => 'form-control', 'placeholder' => 'Principal Email']) !!}
            @error('principal_email')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('province', 'Province :') !!}
            {!! Form::select('province_id', $provinces, null, ['class' => 'form-control', 'placeholder' => 'Select Province', 'id' => 'province']) !!}
            @error('province_id')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('district', 'District :') !!}
            {!! Form::select('district_id', [], null, ['class' => 'form-control', 'placeholder' => 'Select District', 'id' => 'district']) !!}
            @error('district_id')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('municipality', 'Municipality :') !!}
            {!! Form::select('municipality_id', [], null, ['class' => 'form-control', 'placeholder' => 'Select Municipality', 'id' => 'municipality']) !!}
            @error('municipality_id')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('ward_number', 'Ward Number :') !!}
            {!! Form::text('ward_number', frontUser()->school->ward_number ?? null, ['class' => 'form-control', 'placeholder' => 'Ward Number']) !!}
            @error('ward_number')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('address', 'Address :') !!}
            {!! Form::text('address', frontUser('address') ?? null, ['class' => 'form-control', 'placeholder' => 'Address', 'readOnly' => 'readOnly']) !!}
        </div>

        <div class="col-lg-6">
            {!! Form::label('website_link', 'Website Link :') !!}
            {!! Form::text('website_link', frontUser()->school->website_link ?? null, ['class' => 'form-control', 'placeholder' => 'Website Link']) !!}
            @error('website_link')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('logo', 'Upload logo :') !!}
            {!! Form::file('logo', ['class' => 'form-control']) !!}

            @error('logo')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="kt-portlet__foot">
    <div class="kt-form__actions">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit"
                        class="btn btn-primary"
                        title="{{ $formAction }}"
                >
                    {{ $formAction }}
                </button>
                <a href="{{ route('school.profile.index') }}"
                   type="reset"
                   class="btn btn-secondary"
                   title="Cancel"
                >
                    Cancel
                </a>
            </div>
        </div>
    </div>
</div>

<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('school_id', 'School :') !!}
            {!!Form::select('school_id[]', $schools, $teacher->schools ?? null, ['class' => $errors->first('school_id') ? 'form-control  is-invalid' : 'form-control', 'multiple' => 'multiple', 'id' => 'school'])!!}
            @error('school_id')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('subject_id', 'Subject :') !!}
            {!!Form::select('subject_id[]', $subjects ?? [], $teacher->subjects ?? null, ['class' => $errors->first('subject_id') ? 'form-control  is-invalid' : 'form-control', 'multiple' => 'multiple', 'id' => 'subject'])!!}
            @error('subject_id')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('first_name', 'First name :') !!}
            {!! Form::text('user[first_name]', null, ['class' => 'form-control', 'placeholder'=>'First Name']) !!}

            @error('user.first_name')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('last_name', 'Last name :') !!}
            {!! Form::text('user[last_name]', null, ['class' => 'form-control', 'placeholder'=>'Last Name']) !!}

            @error('user.last_name')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('email', 'Email :') !!}
            {!! Form::text('user[email]', null, ['class' => 'form-control', 'placeholder'=>'example@example.com']) !!}

            @error('user.email')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('username', 'Username :') !!}
            {!! Form::text('user[username]', null, ['class' => 'form-control', 'placeholder'=>'User Name']) !!}

            @error('user.username')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('phone', 'Phone :') !!}
            {!! Form::text('user[phone]', null, ['class' => 'form-control']) !!}

            @error('user.phone')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('profile', 'Upload profile :') !!}
            {!! Form::file('user[profile]', ['class' => 'form-control']) !!}

            @error('user.profile')
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
                <a href="{{ route('admin.user.teacher.index') }}"
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

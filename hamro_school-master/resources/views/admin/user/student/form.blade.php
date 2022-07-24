<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('school_id', 'School :') !!}
            {!! Form::select('school_id', $schools, null, ['class' => 'form-control', 'placeholder' => 'Select School', 'id' => 'school']) !!}
            @error('school_id')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('grade', 'Grade :') !!}
            {!! Form::select('grade_id', $grades, null, ['class' => 'form-control', 'placeholder' => 'Select Grade', 'id' => 'grade']) !!}
            @error('grade_id')
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

    @if($formMethod == 'Post' )
        <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('password', 'Password :') !!}
            {!! Form::password('user[password]', ['class' => 'form-control']) !!}

            @error('user.password')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('password_confirmation', 'Confirm Password :') !!}
            {!! Form::password('user[password_confirmation]', ['class' => 'form-control']) !!}

            @error('user.password_confirmation')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>
    @endif

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('phone', 'Phone :') !!}
            {!! Form::text('user[phone]', null, ['class' => 'form-control']) !!}

            @error('user.phone')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('parent_name', 'Guardian Name :') !!}
            {!! Form::text('parrent_name', null, ['class' => 'form-control']) !!}

            @error('parrent_name')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('profile', 'Upload Profile :') !!}
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
                <a href="{{ route('admin.user.student.index') }}"
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


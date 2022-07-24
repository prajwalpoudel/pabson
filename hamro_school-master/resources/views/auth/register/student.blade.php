@extends('auth.register.register')
@section('register')
    {!! Form::open(['route' => 'auth.register', 'method' => 'post']) !!}
    {!! Form::hidden('user[role_id]', \App\Constants\RoleConstant::STUDENT_ID) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('school', 'School :') !!}
                {!! Form::select('school_id', $schools, null, ['class' => 'form-control', 'placeholder' => 'Select School', 'id' => 'school']) !!}
                @error('school_id')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('grade', 'Grade :') !!}
                {!! Form::select('grade_id', $grades, null, ['class' => 'form-control', 'placeholder' => 'Select Grade', 'id' => 'grade']) !!}

                @error('grade_id')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('first_name', 'First name :') !!}
                {!! Form::text('user[first_name]', null, ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                @error('user.first_name')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('last_name', 'Last name :') !!}
                {!! Form::text('user[last_name]', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}

                @error('user.last_name')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('email', 'Email :') !!}
                {!! Form::email('user[email]', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}

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
                {!! Form::label('phone', 'Phone :') !!}
                {!! Form::text('user[phone]', null, ['class' => 'form-control', 'placeholder' => 'Phone']) !!}
                @error('user.phone')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('guardian_name', 'Guardian Name :') !!}
                {!! Form::text('guardian_name', null, ['class' => 'form-control', 'placeholder' => 'Guardian Name']) !!}
                @error('user.phone')
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
            $('#school').change(function () {
                var schoolId = $(this).val();
                getGradeBySchool(schoolId);
            });
        });
    </script>
@endpush

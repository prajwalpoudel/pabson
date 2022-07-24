@extends('auth.register.register')
@push('style')
    <style>
        .select2-search__field {
            height: 36px;
            padding-left: 6px!important;
        }
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: 1px solid #e6eaf3;
        }
        .select2-container--default .select2-selection--multiple {
            border: 1px solid #e6eaf3;
        }

        .select2-selection__rendered li {
            line-height: 2.2;

        }
    </style>
@endpush
@section('register')
    {!! Form::open(['route' => 'auth.register', 'method' => 'post']) !!}
    {!! Form::hidden('user[role_id]', \App\Constants\RoleConstant::TEACHER_ID) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('school', 'School :') !!}
                {!! Form::select('school_id[]', $schools, null, ['class' => 'form-control', 'id' => 'school', 'multiple' => 'multiple']) !!}
                @error('school_id')
                <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('subject', 'Subject :') !!}
                {!! Form::select('subject_id[]', $subjects, null, ['class' => 'form-control', 'id' => 'subject', 'multiple' => 'multiple']) !!}
                @error('subject_id')
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

    </div>
    <input type="submit" class="btn btn-md full-width pop-login" value="Register"/>
    {!! Form::close() !!}
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#school').select2({
                'placeholder': 'Select School',
                'allowClear': true
            });

            $('#school').change(function () {
                var schoolId = $(this).val();
            });
        });
        $(document).ready(function () {
            $('#subject').select2({
                'placeholder': 'Select Subject',
                'allowClear': true
            });

            $('#subject').change(function () {
                var subjectId = $(this).val();
            });
        });
    </script>
@endpush

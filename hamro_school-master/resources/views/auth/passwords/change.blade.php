@extends('school.layouts.app')

@section('title', 'School | Change Password')

@section('content')

    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Change Password</h3>
                </div>
            </div>
            {!! Form::model(null, ['route' => ['auth.password.update'], 'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'change-password-form']) !!}
            <div class="kt-portlet__body">
                <div class="form-group row">
                    <div class="col-lg-6">
                        {!! Form::label('old_password', 'Old Password :') !!}
                        {!! Form::password('old_password', null, ['class' => 'form-control']) !!}

                        @error('old_password')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                        @if(session('incorrectOldPass'))
                            <span style="color: red">{{ session('incorrectOldPass') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6">
                        {!! Form::label('password', 'Password :') !!}
                        {!! Form::password('password', null, ['class' => 'form-control']) !!}

                        @error('password')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6">
                        {!! Form::label('password_confirmation', 'Confirm Password :') !!}
                        {!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}

                        @error('password_confirmation')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('school.dashboard') }}" type="reset"
                               class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>

@endsection

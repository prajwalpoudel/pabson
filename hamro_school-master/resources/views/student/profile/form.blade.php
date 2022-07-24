<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('first_name', 'First name :') !!}
            {!! Form::text('first_name', null, ['class' => 'form-control']) !!}

            @error('first_name')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-lg-6">
            {!! Form::label('last_name', 'Last name :') !!}
            {!! Form::text('last_name', null, ['class' => 'form-control']) !!}

            @error('last_name')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('email', 'Email :') !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=>'example@example.com']) !!}

            @error('email')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('phone', 'Phone :') !!}
            {!! Form::text('phone', null, ['class' => 'form-control']) !!}

            @error('phone')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('address', 'Address :') !!}
            {!! Form::text('address', null, ['class' => 'form-control']) !!}

            @error('address')
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
                <a href="{{ route('student.profile') }}"
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

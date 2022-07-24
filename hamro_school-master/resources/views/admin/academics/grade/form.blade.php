<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('name', 'Name :') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}

            @error('display_name')
                <div id="district-id-error" class="error invalid-feedback"> {{ $message }}</div>
            @enderror

        </div>

        <div class="col-lg-6">
            {!! Form::label('display_name', 'Display Name :') !!}
            {!! Form::text('display_name', null, ['class' => 'form-control']) !!}

            @error('display_name')
                <div id="district-id-error" class="error invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="kt-portlet__foot">
    <div class="kt-form__actions">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">{{ $formAction }}</button>
                <a href="{{ route('admin.academics.grade.index') }}" type="reset" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>


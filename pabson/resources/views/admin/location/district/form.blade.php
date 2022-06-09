<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('province_id', 'Province :') !!}
            {!!Form::select('province_id', $provinces, $district->province_id ?? null, ['class' => $errors->first('province_id') ? 'form-control  is-invalid' : 'form-control'])!!}
            @if($errors->first('province_id'))
                <div id="province-id-error" class="error invalid-feedback"> {{ $errors->first('province_id') }}</div>
            @endif
        </div>

        <div class="col-lg-6">
            {!! Form::label('name', 'Name :') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Name']) !!}
        </div>
    </div>
</div>
<div class="kt-portlet__foot">
    <div class="kt-form__actions">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">{{ $formAction }}</button>
                <a  href="{{ route('admin.district.index') }}" type="reset" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

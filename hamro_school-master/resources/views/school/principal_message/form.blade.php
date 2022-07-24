<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-12">
            {!! Form::label('principal_message', 'Principal Message :') !!}
            {!! Form::textarea('principal_message', frontUser()->school->principal_message ?? null, ['class' => 'form-control', 'id' => 'content']) !!}

            @error('description')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="kt-portlet__foot">
    <div class="kt-form__actions">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">{{ $formAction }}</button>
                <a href="{{ route('school.principal_message.index') }}" type="reset"
                   class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function () {
            let value = {!! json_encode(frontUser()->school->principal_message ?? null) !!}
            CKEDITOR.replace('content');
            if (value) {
                CKEDITOR.instances['content'].setData(value);
            }
        });
    </script>
@endpush

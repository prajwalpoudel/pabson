<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-12 font-weight-bold">
            {!! Form::label('description', 'Add to the discussion :') !!}
            {!! Form::textarea('description', $comment->description ?? null, ['class' => 'form-control', 'id' => 'content']) !!}

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
{{--                <a href="{{ route(getPreviousRouteName()) }}" type="reset"--}}
{{--                   class="btn btn-secondary">Cancel</a>--}}
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function () {
            let value = {!! json_encode($comment->description ?? null) !!}
            CKEDITOR.replace('content');
            if (value) {
                CKEDITOR.instances['content'].setData(value);
            }
        });
    </script>
@endpush

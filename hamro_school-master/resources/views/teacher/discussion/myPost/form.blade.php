<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('title', 'Title :') !!}
            {!! Form::text('title', null, ['class' => $errors->first('title') ? 'form-control  is-invalid' : 'form-control', 'placeholder'=>'Title']) !!}
            @error('title')
            <div id="title-error" class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('subject_id', 'Subject :') !!}
            {!!Form::select('subject_id[]', $subjects, $discussionSubjects ?? null, ['class' => $errors->first('subject_id') ? 'form-control  is-invalid' : 'form-control', 'multiple' => 'multiple', 'id' => 'subject'])!!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-12">
            {!! Form::label('description', 'Description :') !!}
            {!! Form::textarea('description', null, ['id' => 'description', 'class' => $errors->first('description') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Enter Description Here']) !!}
            @error('description')
            <div id="description-error" class="error invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="kt-portlet__foot">
    <div class="kt-form__actions">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">{{ $formAction }}</button>
                <a  href="{{ route('teacher.my-post.index') }}" type="reset" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function () {
            var value = {!! json_encode($discussion->description ?? null) !!}
            CKEDITOR.replace('description');
            if (value) {
                CKEDITOR.instances['description'].setData(value);
            }
        });
    </script>
@endpush

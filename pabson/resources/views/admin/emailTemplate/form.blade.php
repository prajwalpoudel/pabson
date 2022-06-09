<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('title', 'Title :') !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=>'Title', 'readonly']) !!}
        </div>
        <div class="col-lg-6">
            {!! Form::label('slug', 'Slug :') !!}
            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder'=>'Slug', 'readonly']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('subject', 'Subject :') !!}
            {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder'=>'Subject']) !!}
        </div>
        <div class="col-lg-6">
            {!! Form::label('email_from', 'Email From :') !!}
            {!! Form::text('email_from', null, ['class' => 'form-control', 'placeholder'=>'Email From']) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-12">
            {!! Form::label('content', 'Content :') !!}
            {!! Form::textarea('content', $emailTemplate->content, ['id' => 'content', 'class' => $errors->first('content') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Enter Content Here']) !!}
            @if($errors->first('content'))
                <div id="content-error" class="error invalid-feedback">{{ $errors->first('content') }}</div>
            @endif
        </div>
    </div>
</div>
<div class="kt-portlet__foot">
    <div class="kt-form__actions">
        <div class="row">
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">{{ $formAction }}</button>
                <a  href="{{ route('admin.email-template.index') }}" type="reset" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function () {
            var value = {!! json_encode($emailTemplate->content) !!}
            CKEDITOR.replace('content');
            if (value) {
                CKEDITOR.instances['content'].setData(value);
            }
        });
    </script>
@endpush

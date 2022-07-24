<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('grade_id', 'Grade :') !!}
            @if($formAction == "Save")
            {!!Form::select('grades[]', $grades, $subject->grade_id ?? null, ['multiple'=>'multiple','class' => $errors->first('grade_id') ? 'form-control  is-invalid' : 'form-control'])!!}
            @else
            {!!Form::select('grade_id', $grades, $subject->grade_id ?? null, ['class' => $errors->first('grade_id') ? 'form-control  is-invalid' : 'form-control'])!!}
            @endif
            @if($errors->first('grade_id'))
                <div id="grade-id-error" class="error invalid-feedback"> {{ $errors->first('grade_id') }}</div>
            @endif

            @if($errors->first('grades'))
                <div id="grade-id-error" class="error invalid-feedback"> {{ $errors->first('grades') }}</div>
            @endif
        </div>

        <div class="col-lg-6">
            {!! Form::label('name', 'Name :') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}

            @error('name')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-6 mt-4">
            @if($formAction=="Update")
            <img src="{{$subject->imageurl}}" alt="" class='img img-fluid' style="max-height:150px" srcset="">
            @endif
            {!! Form::label('image', 'Image :') !!}
            {!! Form::file('image', null, ['class' => 'file-control']) !!}

            @error('image')
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
                >
                    {{ $formAction }}
                </button>
                <a href="{{ route('admin.academics.subject.index') }}"
                   type="reset"
                   class="btn btn-secondary"
                >
                    Cancel
                </a>
            </div>
        </div>
    </div>
</div>

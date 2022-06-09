<div class="kt-portlet__body">
    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('name', 'Company Name :') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}

            @error('name')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('email', 'Email :') !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=>'example@example.com']) !!}

            @error('email')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('phone', 'Phone :') !!}
            {!! Form::text('phone', null, ['class' => 'form-control']) !!}

            @error('phone')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('address', 'Address :') !!}
            {!! Form::text('address', null, ['class' => 'form-control']) !!}

            @error('address')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('fb', 'Facebook Link :') !!}
            {!! Form::text('fb', null, ['class' => 'form-control']) !!}

            @error('fb')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('insta', 'Instagram Link :') !!}
            {!! Form::text('insta', null, ['class' => 'form-control']) !!}

            @error('insta')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('google_plus', 'Google Plus Link :') !!}
            {!! Form::text('google_plus', null, ['class' => 'form-control']) !!}

            @error('google_plus')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-6">
            {!! Form::label('twitter', 'Twitter Link :') !!}
            {!! Form::text('twitter', null, ['class' => 'form-control']) !!}

            @error('twitter')
            <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            {!! Form::label('logo', 'Upload Logo :') !!}
            {!! Form::file('logo', ['class' => 'form-control display-none', 'onchange' => 'showMyImage(this)']) !!}
            <div class="image-div">
                <img class="input-image" id="preview-image"  src="{{ getImageUrl($setting->logo)}}" alt="image" onclick="clickImage()" />
            </div>

            @error('logo')
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
                <a href="{{ route('admin.setting.index') }}"
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

@extends('admin.layouts.master')
@push('style')
    <style>
        .display-none {
            display: none;
        }
        .input-image {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
        }
        .image-div {
            margin-top: 10px;
            width: 400px;
            height: 280px;
            background: #bfd4db;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endpush

@section('content')
    <section id="email-template-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Edit Setting</h3>
                </div>
            </div>
            {!! Form::model($setting, ['route' => ['admin.setting.update',$setting->id], 'method' => 'patch', 'files' => 'true', 'class' => 'kt-form kt-form--label-right', 'id' => 'setting-form']) !!}
            @include('admin.setting.form', ['formAction' => 'Update'])
            {!! Form::close() !!}
        </div>
    </section>
@endsection


@push('script')
    <script>
        function clickImage() {
            $("input[type='file']").click();
        }
        function showMyImage(fileInput) {
            var files = fileInput.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var img=document.getElementById("preview-image");
                img.file = file;
                var reader = new FileReader();
                reader.onload = (function(aImg) {
                    return function(e) {
                        aImg.src = e.target.result;
                    };
                })(img);
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush


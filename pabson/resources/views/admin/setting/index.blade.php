@extends('admin.layouts.master')

@section('content')
    <section id="setting-edit">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
                    <h3 class="kt-portlet__head-title">Setting</h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('admin.setting.edit', $setting->id) }}" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                            Edit
                        </a>
                    </div>
                </div>
            </div>

            <div class="kt-portlet__body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label for="">Company Name : </label>
                            <span class="pl-2">{{ $setting->name }}</span>
                        </div>

                        <div class="row">
                            <label for="">Email : </label>
                            <span class="pl-2">{{ $setting->email }}</span>
                        </div>

                        <div class="row">
                            <label for="">Phone : </label>
                            <span class="pl-2">{{ $setting->phone }}</span>
                        </div>

                        <div class="row">
                            <label for="">Address : </label>
                            <span class="pl-2">{{ $setting->address }}</span>
                        </div>

                        <div class="row">
                            <label for="">Facebook Link : </label>
                            <span class="pl-2">{{ $setting->fb }}</span>
                        </div>

                        <div class="row">
                            <label for="">Instagram Link : </label>
                            <span class="pl-2">{{ $setting->insta }}</span>
                        </div>

                        <div class="row">
                            <label for="">Google Plus Link : </label>
                            <span class="pl-2">{{ $setting->google_plus }}</span>
                        </div>

                        <div class="row">
                            <label for="">Twitter Link : </label>
                            <span class="pl-2">{{ $setting->twitter }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if($setting->logo)
                            <div class="row">
                                <img src="{{ getImageUrl($setting->logo) }}" height="200px" width="280px" class="pl-2">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

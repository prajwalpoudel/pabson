@extends('school.layouts.app')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                        </span>
                <h3 class="kt-portlet__head-title">
                    School Description
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    @if(!frontUser()->school->description)
                        <a href="{{ route('school.description.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                            Create
                        </a>
                    @else
                        <a href="{{ route('school.description.edit', frontUser()->school->id) }}"
                           class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                            Edit
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="kt-portlet__body ml-5 mr-5">
            @if(frontUser()->school->description)
                {!!  frontUser()->school->description  !!}
            @else
                <p>No description to show.</p>
            @endif
        </div>
    </div>
@endsection

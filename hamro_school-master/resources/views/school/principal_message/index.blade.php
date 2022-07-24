@extends('school.layouts.app')

@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                        </span>
                <h3 class="kt-portlet__head-title">
                    Principal Message
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    @if(!frontUser()->school->principal_message)
                        <a href="{{ route('school.principal_message.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                            Create
                        </a>
                    @else
                        <a href="{{ route('school.principal_message.edit', frontUser()->school->id) }}"
                           class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                            Edit
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="kt-portlet__body ml-5 mr-5">
            @if(frontUser()->school->principal_message)
                {!! frontUser()->school->principal_message  !!}
            @else
                <p>No principal message to show.</p>
            @endif
        </div>
    </div>
@endsection

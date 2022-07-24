@extends('moderator.layouts.master')
@section('title')
    @if(request()->route()->getName() ==  'moderator.discussion.pending')
        Moderator | Pending Discussion
    @elseif(request()->route()->getName() ==  'moderator.discussion.approved')
        Moderator | Approved Discussion
    @elseif(request()->route()->getName() ==  'moderator.discussion.show')
        Moderator | Discussion | Detail
    @endif
@endsection
@push('style')
    <style>
        .discussion-footer {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            width: 100%;
            border-top: 1px solid #ebedf2;
            padding: 10px 0px 10px 0px;
        }
        .discussion-footer-item {
            display: flex;
            align-items: center;
            flex-grow: 1
        }
        .pt-25 {
            padding-top: 25px;
        }
        .like {
            color: black;
        }
        .active {
            color: blue;
        }
    </style>
@endpush
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                        </span>
                <h3 class="kt-portlet__head-title">
                    Discussion
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <ul class="nav nav-tabs nav-tabs-bold nav-tabs-line   nav-tabs-line-right nav-tabs-line-brand">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() ==  'moderator.discussion.pending' ? 'active' : null}}" href="{{ route('moderator.discussion.pending') }}">
                            Pending
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() ==  'moderator.discussion.approved' ? 'active' : null}}" href="{{ route('moderator.discussion.approved') }}">
                            Approved
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @yield('discussion')
    </div>
@endsection

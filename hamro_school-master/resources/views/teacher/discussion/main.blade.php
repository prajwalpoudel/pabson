@extends('teacher.layouts.master')
@section('title')
    @if(request()->route()->getName() ==  'teacher.discussion.index')
        Teacher | Discussion
        @elseif(request()->route()->getName() ==  'teacher.my-post.index')
        Teacher | Discussion | My Post
        @elseif(request()->route()->getName() ==  'teacher.discussion.show')
        Teacher | Discussion | Detail
        @elseif(request()->route()->getName() ==  'teacher.my-post.create')
        Teacher | Discussion | Create
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
                        <a class="nav-link {{ (getCurrentRouteName() ==  'teacher.discussion.index' || (getPreviousRouteName() == 'teacher.discussion.index' && (getCurrentRouteName() != 'teacher.my-post.index' && getCurrentRouteName() != 'teacher.my-post.create') )) ?  'active' : null}}" href="{{ route('teacher.discussion.index') }}">
                            Discussion
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (getCurrentRouteName() ==  'teacher.my-post.index' || (getPreviousRouteName() == 'teacher.my-post.index' && (getCurrentRouteName() != 'teacher.discussion.index' && getCurrentRouteName() != 'teacher.my-post.create') )) ? 'active' : null}}" href="{{ route('teacher.my-post.index') }}">
                            My Post
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() ==  'teacher.my-post.create' ? 'active' : null}}" href="{{ route('teacher.my-post.create') }}">
                            <i class="fa fa-plus"></i> Create
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @yield('discussion')
    </div>
@endsection

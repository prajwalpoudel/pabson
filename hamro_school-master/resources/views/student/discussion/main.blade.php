@extends('student.layouts.master')
@section('title')
    @if(request()->route()->getName() ==  'student.discussion.index')
        Student | Discussion
        @elseif(request()->route()->getName() ==  'student.my-post.index')
        Student | Discussion | My Post
        @elseif(request()->route()->getName() ==  'student.discussion.show')
        Student | Discussion | Detail
        @elseif(request()->route()->getName() ==  'student.my-post.create')
        Student | Discussion | Create
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
        .comment {
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
                        <a class="nav-link {{ (getCurrentRouteName() ==  'student.discussion.index' || (getPreviousRouteName() == 'student.discussion.index' && (getCurrentRouteName() != 'student.my-post.index' && getCurrentRouteName() != 'student.my-post.create') )) ?  'active' : null}}" href="{{ route('student.discussion.index') }}">
                            Discussion
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (getCurrentRouteName() ==  'student.my-post.index' || (getPreviousRouteName() == 'student.my-post.index' && (getCurrentRouteName() != 'student.discussion.index' && getCurrentRouteName() != 'student.my-post.create') )) ? 'active' : null}}" href="{{ route('student.my-post.index') }}">
                            My Post
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() ==  'student.my-post.create' ? 'active' : null}}" href="{{ route('student.my-post.create') }}">
                            <i class="fa fa-plus"></i> Create
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @yield('discussion')
    </div>
@endsection

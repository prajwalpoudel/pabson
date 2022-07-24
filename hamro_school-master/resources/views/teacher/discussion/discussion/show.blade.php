@extends('teacher.discussion.main')

@section('discussion')
    <div class="kt-portlet__body">
        <div class="kt-widget3">
            <div class="kt-widget3__item">
                <div class="kt-widget3__header">
                    <div class="kt-widget3__user-img">
                        <img class="kt-widget3__img" src="{{ getImageUrl($discussion->user->profile) }}" alt="">
                    </div>
                    <div class="kt-widget3__info">
                        <a href="#" class="kt-widget3__username">
                            {{ $discussion->user->full_name }}
                        </a><br>
                        <span class="kt-widget3__time">
                                {{ $discussion->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <span class="kt-widget3__status kt-font-brand">
                            @if($discussion->user == frontUser())
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-clean btn-sm btn-icon-md btn-icon"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="flaticon-more"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                            <a href="{{ route('teacher.my-post.edit', encrypt($discussion->id)) }}"
                                               class="kt-nav__link">
                                                <i class="kt-nav__link-icon fa fa-pencil-alt"></i>
                                                <span class="kt-nav__link-text">Edit</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="javascript:;" class="kt-nav__link"
                                               onclick="confirmation('delete-{{$discussion->id}}')">
                                                <i class="kt-nav__link-icon fa fa-trash-alt"></i>
                                                <span class="kt-nav__link-text">Delete</span>
                                                {!! Form::open(['route' => ['teacher.my-post.destroy', $discussion->id], 'method' => 'delete', 'id'=>'delete-'.$discussion->id]) !!}
                                                {!! Form::close() !!}
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="javascript:;" class="kt-nav__link"
                                               onclick="confirmation('update-{{$discussion->id}}')">
                                                <i class="kt-nav__link-icon fa fa-lock"></i>
                                                <span
                                                    class="kt-nav__link-text">{{ $discussion->visibility_status == \App\Constants\VisibilityConstant::PUBLIC_ID ? 'Make Private' : 'Make Public' }}</span>
                                                {!! Form::open(['route' => ['teacher.my-post.update', $discussion->id], 'method' => 'patch', 'id'=>'update-'.$discussion->id]) !!}
                                                {!! Form::hidden('visibility_status', $discussion->visibility_status == \App\Constants\VisibilityConstant::PUBLIC_ID ? \App\Constants\VisibilityConstant::PRIVATE_ID : \App\Constants\VisibilityConstant::PUBLIC_ID) !!}
                                                {!! Form::close() !!}
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon fa fa-ban"></i>
                                                <span class="kt-nav__link-text">Block Comment</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                        </span>
                </div>
                <div class="kt-widget3__body">
                    <p class="kt-widget3__text">
                        {{ $discussion->title ?? null }}
                        {!! $discussion->description ?? null !!}
                    </p>
                </div>
                <div class="discussion-footer">
                        <span class="discussion-footer-item">
                            @if($discussion->likes_count == 0)
                                <a id="like_count_{{$discussion->id}}" href="javascript:;"
                                   class="pl-2 like {{ $discussion->owner_like > 0 ? 'active' : null }}"
                                   onclick="like({{ $discussion->id }})">
                                    <i class="fa fa-thumbs-up"></i> Like
                                </a>
                            @elseif($discussion->likes_count == 1)
                                <a id="like_count_{{$discussion->id}}" href="javascript:;"
                                   class="pl-2 like {{ $discussion->owner_like > 0 ? 'active' : null  }}"
                                   onclick="like({{ $discussion->id }})">
                                    <i class="fa fa-thumbs-up"></i> {{ $discussion->likes_count }} Like
                                </a>
                            @else
                                <a id="like_count_{{$discussion->id}}" href="javascript:;"
                                   class="pl-2 like {{ $discussion->owner_like > 0 ? 'active' : null }}"
                                   onclick="like({{ $discussion->id }})">
                                    <i class="fa fa-thumbs-up"></i> {{ $discussion->likes_count }} Likes
                                </a>
                            @endif
                        </span>
                    <span class="discussion-footer-item">
                            <i class="fa fa-comment"></i>
                            @if($discussion->comments_count == 0)
                            <span class="pl-2">0 Comment</span>
                            @elseif($discussion->comments_count == 1)
                            <span class="pl-2">{{ $discussion->comments_count }} Comment</span>
                        @else
                            <span class="pl-2">{{ $discussion->comments_count }} Comments</span>
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
    @if($discussion->comment_status && $discussion->is_verified)
        <div class="kt-portlet__foot">
            {!! Form::model(null, ['route' => ['teacher.discussion.comment.save', $discussion->id],  'method' => 'post', 'class' => 'kt-form kt-form--label-right', 'id' => 'comment-form']) !!}
            @include('teacher.discussion.comment.index', ['formAction' => 'Save'])
            {!! Form::close() !!}
        </div>
        <div class="">
            @include('teacher.discussion.comment.show')
        </div>
    @endif
@endsection

<script type="text/javascript">
    function confirmation(formId) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Do It!"
        }).then(function (result) {
            if (result.value) {
                document.getElementById(formId).submit();
                Swal.fire(
                    "Done!",
                    "Your action has been completed.",
                    "success"
                )
            }
        });
    };

    function like(discussionId) {
        var url = @json(route('teacher.discussion.like'));
        var userId = {{ frontUser('id') }}
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                'discussion_id': discussionId,
                'user_id': userId,
                "_token": "<?php echo csrf_token() ?>"
            },
            success: function (data) {
                if (data.owner_like == 1) {
                    $('#like_count_' + discussionId).addClass('active')
                } else {
                    $('#like_count_' + discussionId).removeClass('active');
                }
                if (data.count == 0) {
                    $('#like_count_' + discussionId).html('<i class="fa fa-thumbs-up"></i> Like');
                } else if (data.count == 1) {
                    $('#like_count_' + discussionId).html('<i class="fa fa-thumbs-up"></i> ' + data.count + ' Like');
                } else {
                    $('#like_count_' + discussionId).html('<i class="fa fa-thumbs-up"></i> ' + data.count + ' Likes');
                }
            },
            error: function (request, error) {
            }
        });
    }
</script>


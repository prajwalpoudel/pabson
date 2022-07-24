@extends('student.discussion.main')
@section('discussion')
    <div class="kt-portlet__body">
        @forelse($discussions as $discussion)
            <div class="kt-widget3 border-bottom {{ $loop->first ? null : 'pt-25' }}">
                <div class="kt-widget3__item">
                    <div class="kt-widget3__header">
                        <div class="kt-widget3__user-img">
                            <img class="kt-widget3__img" src="{{ getImageUrl($discussion->user->profile) }}" alt="">
                        </div>
                        <div class="kt-widget3__info">
                            <a href="#" class="kt-widget3__username">
                                {{ $discussion->user->full_name }}
                            </a>
                            <br>
                            <span class="kt-widget3__time">
                                {{ $discussion->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <span class="kt-widget3__status kt-font-brand">
                             @if($discussion->user == frontUser() && request()->route()->getName() ==  'student.my-post.index')
                                @if($discussion->is_verified == \App\Constants\DiscussionStatusConstant::PENDING_ID)
                                    <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill ml-2">Pending</span>
                                @elseif($discussion->is_verified == \App\Constants\DiscussionStatusConstant::APPROVED_ID)
                                    <span class="kt-badge kt-badge--success  kt-badge--inline kt-badge--pill ml-2">Approved</span>
                                @endif
                            @endif

                            @if($discussion->user == frontUser())
                                <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-clean btn-sm btn-icon-md btn-icon"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="flaticon-more"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                            <a href="{{ route('student.my-post.edit', encrypt($discussion->id)) }}"
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
                                                {!! Form::open(['route' => ['student.my-post.destroy', $discussion->id], 'method' => 'delete', 'id'=>'delete-'.$discussion->id]) !!}
                                                {!! Form::close() !!}
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="javascript:;" class="kt-nav__link"
                                               onclick="confirmation('update-{{$discussion->id}}')">
                                                @if($discussion->visibility_status == \App\Constants\VisibilityConstant::PUBLIC_ID)
                                                    <i class="kt-nav__link-icon fa fa-lock"></i>
                                                    <span class="kt-nav__link-text">Make Private</span>
                                                @else
                                                    <i class="kt-nav__link-icon fa fa-globe"></i>
                                                    <span class="kt-nav__link-text">Make Public</span>
                                                @endif
                                                {!! Form::open(['route' => ['student.my-post.update', $discussion->id], 'method' => 'patch', 'id'=>'update-'.$discussion->id]) !!}
                                                {!! Form::hidden('visibility_status', $discussion->visibility_status == \App\Constants\VisibilityConstant::PUBLIC_ID ? (int) \App\Constants\VisibilityConstant::PRIVATE_ID : (int) \App\Constants\VisibilityConstant::PUBLIC_ID) !!}
                                                {!! Form::close() !!}
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="javascript:;" class="kt-nav__link"
                                               onclick="confirmation('update-comment-{{$discussion->id}}')">
                                                @if($discussion->comment_status == \App\Constants\CommentStatusConstant::ACTIVE_ID)
                                                    <i class="kt-nav__link-icon fa fa-ban"></i>
                                                    <span class="kt-nav__link-text">Block Comment</span>
                                                @else
                                                    <i class="kt-nav__link-icon fa fa-un"></i>
                                                    <span class="kt-nav__link-text">Unblock Comment</span>
                                                @endif
                                                {!! Form::open(['route' => ['student.my-post.update', $discussion->id], 'method' => 'patch', 'id'=>'update-comment-'.$discussion->id]) !!}
                                                {!! Form::hidden('comment_status', $discussion->comment_status == \App\Constants\CommentStatusConstant::ACTIVE_ID ? (int) \App\Constants\CommentStatusConstant::INACTIVE_ID : (int) \App\Constants\CommentStatusConstant::ACTIVE_ID) !!}
                                                {!! Form::close() !!}
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
                            @foreach($discussion->discussionSubjects as $subject)
                                <span class="kt-badge kt-badge--dark  kt-badge--inline kt-badge--pill ml-2">{{ $subject->name . ' (Grade '. $subject->grade->name.')' }}</span>
                            @endforeach
                        </p>

                        <p class="kt-widget3__text font-weight-bold">
                            <a href="{{ route('student.discussion.show', encrypt($discussion->id)) }}">
                                {{ $discussion->title ?? null }}
                            </a>
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
                        @if($discussion->comment_status)
                            <span class="discussion-footer-item">
                            @if($discussion->comments_count == 0)
                                    <a href="{{ route('student.discussion.show', encrypt($discussion->id)) }}"
                                       class="pl-2 comment"><i
                                            class="fa fa-comment"></i> Comment</a>
                                @elseif($discussion->comments_count == 1)
                                    <a href="{{ route('student.discussion.show', encrypt($discussion->id)) }}"
                                       class="pl-2 comment"><i
                                            class="fa fa-comment"></i> {{ $discussion->comments_count }} Comment</a>
                                @else
                                    <a href="{{ route('student.discussion.show', encrypt($discussion->id)) }}"
                                       class="pl-2 comment"><i
                                            class="fa fa-comment"></i> {{ $discussion->comments_count }} Comments</a>
                                @endif
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="kt-widget3__item">
                <div class="kt-widget3__info">
                    <h6> No discussion found.</h6>
                </div>
            </div>
        @endforelse
    </div>
    <div class="kt-portlet__foot">
        {{ $discussions->links('vendor.pagination.pagination') }}
    </div>
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
        var url = @json(route('student.discussion.like'));
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


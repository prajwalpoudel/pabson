<div class="kt-portlet__body ml-5">
    @forelse($comments as $comment)
        <div class="kt-widget3 border-bottom {{ $loop->first ? null : 'pt-25' }}">
            <div class="kt-widget3__item">
                <div class="kt-widget3__header">
                    <div class="kt-widget3__user-img">
                        <img class="kt-widget3__img" src="{{ asset('admin') }}/assets/media/users/user4.jpg" alt="">
                    </div>
                    <div class="kt-widget3__info">
                        <a href="#" class="kt-widget3__username">
                            {{ $comment->user->full_name }}
                        </a><br>
                        <span class="kt-widget3__time">
                                {{ $comment->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <span class="kt-widget3__status kt-font-brand">
                        @if($comment->user == frontUser())
                            @if($comment->is_verified == \App\Constants\DiscussionStatusConstant::PENDING_ID)
                                <span class="kt-badge kt-badge--primary  kt-badge--inline kt-badge--pill ml-2">Pending</span>
                            @endif
                        @endif
                            @if($comment->user == frontUser() || $comment->user == frontUser())
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-clean btn-sm btn-icon-md btn-icon"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="flaticon-more"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        @if( !$discussion->user == frontUser() || $comment->user == frontUser())
                                            <li class="kt-nav__item">
                                                <a href="{{ route('teacher.discussion.comment.edit', encrypt($comment->id)) }}"
                                                   class="kt-nav__link">
                                                    <i class="kt-nav__link-icon fa fa-pencil-alt"></i>
                                                    <span class="kt-nav__link-text">Edit</span>
                                                </a>
                                            </li>
                                        @endif
                                        <li class="kt-nav__item">
                                            <a href="javascript:;" class="kt-nav__link"
                                               onclick="confirmation('delete-{{$comment->id}}')">
                                                <i class="kt-nav__link-icon fa fa-trash-alt"></i>
                                                <span class="kt-nav__link-text">Delete</span>
                                                {!! Form::open(['route' => ['teacher.discussion.comment.destroy', $comment->id], 'method' => 'post', 'id'=>'delete-'.$comment->id]) !!}
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
                    <p class="kt-widget3__text font-weight-bold">
                        {!! $comment->description ?? null !!}
                    </p>
                </div>
            </div>

            <div class="discussion-footer">
                        <span class="discussion-footer-item">
                            @if($comment->likes_count == 0)
                                <a id="like_count_{{$comment->id}}" href="javascript:;"
                                   class="pl-2 like {{ $comment->owner_like > 0 ? 'active' : null }}"
                                   onclick="like({{ $comment->id }})">
                                    <i class="fa fa-thumbs-up"></i> Like
                                </a>
                            @elseif($comment->likes_count == 1)
                                <a id="like_count_{{$comment->id}}" href="javascript:;"
                                   class="pl-2 like {{ $comment->owner_like > 0 ? 'active' : null  }}"
                                   onclick="like({{ $comment->id }})">
                                    <i class="fa fa-thumbs-up"></i> {{ $comment->likes_count }} Like
                                </a>
                            @else
                                <a id="like_count_{{$comment->id}}" href="javascript:;"
                                   class="pl-2 like {{ $comment->owner_like > 0 ? 'active' : null }}"
                                   onclick="like({{ $comment->id }})">
                                    <i class="fa fa-thumbs-up"></i> {{ $comment->likes_count }} Likes
                                </a>
                            @endif
                        </span>
            </div>
        </div>
    @empty
        <div class="kt-widget3__item">
            <div class="kt-widget3__info">
                <h6> No comment found.</h6>
            </div>
        </div>
    @endforelse
</div>
<div class="kt-portlet__foot">
    {{ $comments->links('vendor.pagination.pagination') }}
</div>
<script type="text/javascript">

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

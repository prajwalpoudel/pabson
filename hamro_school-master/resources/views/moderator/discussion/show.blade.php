@extends('moderator.discussion.main')
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
                    </span>
                </div>
                <div class="kt-widget3__body">
                    <p class="kt-widget3__text">
                        {{ $discussion->title ?? null }}
                        {!! $discussion->description ?? null !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
        <div class="kt-portlet__foot">
            {!! Form::model(null, ['route' => ['moderator.discussion.update', $discussion->id],  'method' => 'put', 'class' => 'kt-form kt-form--label-right', 'id' => 'discussion-status-form']) !!}
            {!! Form::hidden('is_verified', (int) !$discussion->is_verified) !!}
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary">{{ $discussion->is_verified == true ? 'UnApprove' : 'Approve'}}</button>
                            <a href="{{ $discussion->is_verified == true ? route('moderator.discussion.approved') : route('moderator.discussion.pending')}}" type="reset"
                               class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
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


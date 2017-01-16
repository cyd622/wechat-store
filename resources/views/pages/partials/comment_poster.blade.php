
<div class="comment-post-box">

    <form method="post" action="{{ route('wxapp.comment', $currentWxapp->id) }}">
        {{ csrf_field() }}

        <textarea name="comment" class="form-control" rows="3"></textarea>

        @include('pages.partials.comment_rating_selector')

        @if(Auth::check())
            <div class="user-info">
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">发表评论</button>
                </div>

                <div class="pull-left">
                    <img class="avatar" src="{{ $currentUser->present()->getAvatar() }}" alt="{{ $currentUser->name }}" />
                    <span class="user-name">{{ $currentUser->name }}</span>
                </div>

                <div class="clearfix"></div>
            </div>
        @endif

    </form>
</div>

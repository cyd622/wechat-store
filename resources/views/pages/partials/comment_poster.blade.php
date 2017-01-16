
<div class="comment-post-box">

    <form method="post" action="{{ route('wxapps.comment') }}">

        <textarea name="content" class="form-control" rows="3"></textarea>

        @include('pages.partials.comment_rating_selector')

        @if(Auth::check())
            <div class="user-info">
                <div class="pull-right">
                    <button type="button" class="btn btn-success">发表评论</button>
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

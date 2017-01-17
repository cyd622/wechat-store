<div class="col-xs-12">
    <div class="home-page-header bg-white mb-20">
        <div class="avatar">
            <img src="{{ $user->present()->getAvatar() }}" />
        </div>
        <p class="page-title">{{ $user->name }}</p>
        <p>WxStore 第 {{ $user->id }} 位会员</p>
    </div>

    <div class="clearfix"></div>
</div>
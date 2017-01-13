<div class="app-item">
    <div class="likes">
        <div class="pull-right">
            <div class="qrcode">
                <i class="fa fa-qrcode" aria-hidden="true"></i>
            </div>
        </div>

        <div class="pull-left">
            <i class="fa fa-heart" aria-hidden="true" style="margin-right: 5px;"></i>
            {{ $wxapp->likes }}
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="icon">
        <a href="{{ route('wxapp.show', [$wxapp->id, $wxapp->name]) }}">
            <img src="{{ qiniu_cdn($wxapp->icon) }}" alt="{{ $wxapp->title }}小程序">
        </a>
    </div>

    <div class="title">
        {{ $wxapp->title }}
    </div>

    <div class="rating starts hidden-xs">

        <span class="line"></span>
        {!! $wxapp->present()->genStarts() !!}
        <span class="line"></span>
    </div>

    <div class="tags">
        {!! $wxapp->present()->genTags($browserType == 'mobile' ? 2 : 3) !!}
    </div>

    <div class="clearfix"></div>
</div>


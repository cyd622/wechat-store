<div class="app-item">
    <div class="likes">
        <div class="pull-right">
            {{--<button type="button" class="btn btn-default btn-sm btn-cx">尝鲜</button>--}}
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
        <img src="{{ qiniu_cdn($wxapp->icon) }}">
    </div>

    <div class="title">
        {{ $wxapp->title }}
    </div>

    <div class="rating">

        <span class="line"></span>
        {!! $wxapp->present()->genStarts() !!}
        <span class="line"></span>
    </div>

    <div class="tags">
        {!! $wxapp->present()->genTags(3) !!}
    </div>

    <div class="clearfix"></div>
</div>
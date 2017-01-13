<div class="app-info">
    <div class="icon pull-left">
        <img src="{{ qiniu_cdn($currentWxapp->icon) }}" alt="{{ $currentWxapp->title }}小程序logo"/>
    </div>

    <div class="info pull-left">
        <h1 class="title">{{ $currentWxapp->title }}</h1>

        <div class="starts">
            {!! $currentWxapp->present()->genStarts() !!}
        </div>

        <div class="tags">
            {!! $currentWxapp->present()->genTags(5) !!}
        </div>
    </div>

    <div class="clearfix"></div>
</div>
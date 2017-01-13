<div class="app-info">
    <div class="icon pull-left">
        <img src="{{ qiniu_cdn($currentWxapp->icon) }}" alt="{{ $currentWxapp->title }}小程序logo"/>
    </div>

    <div class="pull-right">
        <div class="rating">
            <div class="starts">
                {!! $currentWxapp->present()->genStarts() !!}
            </div>

            <div class="count">
                <span class="numbers">444,21</span>
                <i class="fa fa-user" aria-hidden="true"></i>
            </div>
        </div>
    </div>

    <div class="info pull-left">
        <h1 class="title">{{ $currentWxapp->title }}</h1>
        <div class="author">{!! $currentWxapp->present()->genAuthor() !!}</div>

        <div class="tags">
            {!! $currentWxapp->present()->genTags(5) !!}
        </div>
    </div>

    <div class="clearfix"></div>
</div>
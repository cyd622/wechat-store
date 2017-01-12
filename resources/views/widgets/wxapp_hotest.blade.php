<div class="app-hot-list">
    <ul>
        @foreach($wxapps as $wxapp)
        <li>
            <img src="{{ qiniu_cdn($wxapp->icon) }}"
                 alt="{{ $wxapp->title }}">
            <div class="title">{{ $wxapp->title }}</div>

            <div class="starts">
                <span class="line"></span>
                {!! $wxapp->present()->genStarts() !!}
                <span class="line"></span>
            </div>

            <div class="clearfix"></div>
        </li>
        @endforeach
    </ul>
</div>
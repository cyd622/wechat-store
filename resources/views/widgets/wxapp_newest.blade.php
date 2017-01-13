<div class="app-hot-list">
    <ul>
        @foreach($wxapps as $wxapp)
            <li>
                <img src="{{ qiniu_cdn($wxapp->icon) }}"
                     alt="{{ $wxapp->title }}">
                <div class="title">{{ $wxapp->title }}</div>

                <div class="stars">
                    <span class="line"></span>
                    {!! $wxapp->present()->genStars() !!}
                    <span class="line"></span>
                </div>

                <div class="clearfix"></div>
            </li>
        @endforeach
    </ul>
</div>
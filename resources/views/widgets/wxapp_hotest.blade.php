<div class="app-hot-list">
    <ul>
        @foreach($wxapps as $wxapp)
            <li>
                <a href="{{ route('wxapp.show', [$wxapp->id, $wxapp->name]) }}">
                    <img src="{{ qiniu_cdn($wxapp->icon) }}"
                         alt="{{ $wxapp->title }}微信小程序">
                    <div class="title">{{ $wxapp->title }}</div>

                    <div class="starts">
                        <span class="line"></span>
                        {!! $wxapp->present()->genStarts() !!}
                        <span class="line"></span>
                    </div>

                    <div class="clearfix"></div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
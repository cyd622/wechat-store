
<div class="friendlinks hidden-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="box mb-20">
                    <div class="box-header">
                        <h2>友情链接</h2>
                    </div>

                    <div class="box-content">

                        <ul>
                            <li><a href="{{ route('index') }}">小程序商店</a></li>
                            <li><a href="{{ route('index') }}">微信小程序</a></li>

                            @foreach($links as $link)
                                <li><a href="{{ $link->url }}" target="_blank">{{ $link->title }}</a></li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>

            <div class="clearfxi"></div>
        </div>
    </div>
</div>
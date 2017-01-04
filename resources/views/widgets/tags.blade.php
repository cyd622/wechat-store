
<div class="wxapp-nav">
    <div class="container">
        <div class="row">

            <div class="col-xs-12">

                <ul class="">
                    <li data-id="0" data-title="全部" data-name="all">
                        <a href="">全部</a>
                    </li>

                    @foreach($tags as $tag)
                    <li data-id="{{ $tag->id }}" data-title="{{ $tag->title }}" data-name="">
                        <a href="">{{ $tag->title }}</a>
                    </li>
                    @endforeach
                </ul>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
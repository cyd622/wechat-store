@extends('layouts.home')


@section('main-content')

    <div class="main-content">
        <div class="box bg-white">
            <div class="box-header">
                <h2>最新发布的小程序</h2>
            </div>

            <div class="box-content">
                <div class="user-wxapp-list">
                    @if(count($wxapps) > 0)

                        @foreach($wxapps as $wxapp)
                            <div class="wxapp-item col-sm-6">
                                <div class="icon">
                                    <img src="{{ qiniu_cdn($wxapp->icon) }}" alt="{{ $wxapp->title }}小程序" />
                                </div>

                                <div class="info">
                                    <div>
                                        <h3>{{ $wxapp->title }}</h3>
                                    </div>
                                    <div>
                                        <div class="rating stars">
                                            {!! $wxapp->present()->genStars() !!}
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        @endforeach

                        <div class="clearfix"></div>

                    @else
                    {!! gen_nodata("还没有发布过小程序", false) !!}
                    @endif
                </div>
            </div>
        </div>

        <div class="box bg-white mt-15">
            <div class="box-header">
                <h2>最新发布的文章</h2>
            </div>

            <div class="box-content">
                {!! gen_nodata("还没有发布过文章", false) !!}
            </div>
        </div>
    </div>

@stop
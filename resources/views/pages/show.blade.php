@extends('layouts.pages')

@section('title'){{ $currentWxapp->title }}小程序,{{ $currentWxapp->title }}小程序二维码, @parent @stop

@section('description')
阅读评论、比较用户评分、查看小程序屏幕快照并进一步了解“{{ $currentWxapp->title }}”。 微信扫描“{{ $currentWxapp->title }}”小程序二维码，即刻在微信上尽情体验“{{ $currentWxapp->title }}”小程序。
@stop

@section('keywords'){{ $currentWxapp->title }}, {{ $currentWxapp->title }}小程序评价,@stop

@section('content')

    <div class="app-detail">

        <div class="container">
            <div class="row">

                <div class="col-md-8 col-lg-9 col-sm-12">

                    <div class="app-main-left">

                        @if($browserType == 'mobile')
                            @include('pages.partials.app_info_mobile')
                        @else
                            @include('pages.partials.app_info_pc')
                        @endif

                        <div class="box">
                            <div class="box-header">
                                <h2>{{ $currentWxapp->title }} 截图</h2>
                            </div>

                            <div class="box-content">
                                <div class="screen-shots">
                                    <div class="images-list">
                                        <ul>
                                            @foreach($currentWxapp->screenShots as $item)
                                                <li class="screen-img">
                                                    <img src="{{ qiniu_cdn($item->image) }}" />
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="box-header">
                                <h2>{{ $currentWxapp->title }} 介绍</h2>
                            </div>

                            <div class="box-content">
                                <div class="description">
                                    {{ $currentWxapp->description }}
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="box-header">
                                <h2>{{ $currentWxapp->title }} 用户评价</h2>
                            </div>

                            <div class="box-content">
                                <div class="app-comments">

                                    <div class="rating">

                                        <div class="col-sm-3 score-container">
                                            <div class="score">{{ $currentWxapp->rating }}</div>
                                            <div class="score-container-star-rating">
                                                <div class="starts">
                                                    {!! $currentWxapp->present()->genStarts() !!}
                                                </div>
                                            </div>
                                            <div class="reviews-stats">
                                                共 {{ $currentWxapp->comments()->count() }} 份评价
                                            </div>
                                        </div>

                                        <div class="col-sm-9 rating-box hidden-xs">

                                            <div class="rating-histogram">
                                                <div class="rating-bar-container five">
                                                    <span class="bar-label"><span class="star-tiny star-full"></span>5 </span>
                                                    <span class="bar" style="width:100%"></span>
                                                    <span class="bar-number" aria-label=" 2,340,833 ratings ">2,340,833</span>
                                                </div>

                                                <div class="rating-bar-container four">
                                                    <span class="bar-label"> <span class="star-tiny star-full"></span>4 </span>
                                                    <span class="bar" style="width:18%"></span>
                                                    <span class="bar-number" aria-label=" 431,341 ratings ">431,341</span>
                                                </div>

                                                <div class="rating-bar-container three">
                                                    <span class="bar-label"> <span class="star-tiny star-full"></span>3 </span>
                                                    <span class="bar" style="width:7%"></span>
                                                    <span class="bar-number" aria-label=" 174,549 ratings ">174,549</span>
                                                </div>

                                                <div class="rating-bar-container two">
                                                    <span class="bar-label"> <span class="star-tiny star-full"></span>2 </span>
                                                    <span class="bar" style="width:3%"></span>
                                                    <span class="bar-number" aria-label=" 77,781 ratings ">77,781</span>
                                                </div>

                                                <div class="rating-bar-container one">
                                                    <span class="bar-label"> <span class="star-tiny star-full"></span>1 </span>
                                                    <span class="bar" style="width:5%"></span>
                                                    <span class="bar-number" aria-label=" 124,455 ratings ">124,455</span>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="comment-list">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3 col-sm-12">

                    <div class="app-sidebar">
                        <div class="box">
                            <div class="box-header">
                                <h2>{{ $currentWxapp->title }}小程序二维码</h2>
                            </div>

                            <div class="box-content">
                                
                                <div class="qrcode">
                                    <p>使用微信扫码体验</p>
                                    <img src="{{ qiniu_cdn($currentWxapp->qrcode) }}" alt="">
                                </div>
                            </div>
                        </div>


                        <div class="box">
                            <div class="box-header">
                                <h2>热门推荐</h2>
                            </div>

                            <div class="box-content">
                                @include('widgets.wxapp_hotest')
                            </div>
                        </div>

                    </div>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
@stop
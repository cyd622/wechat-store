@extends('layouts.pages')

@section('content')

    <div class="app-detail">

        <div class="container">
            <div class="row">

                <div class="col-md-8 col-lg-9">

                    <div class="app-main-left">
                        <div class="app-info">
                            <div class="icon pull-left">
                                <img src="{{ qiniu_cdn($currentWxapp->icon) }}" />
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

                        <div class="box">
                            <div class="box-header">
                                <h2>{{ $currentWxapp->title }} 截图</h2>
                            </div>

                            <div class="box-content">
                                <div class="images-list">
                                    @foreach($currentWxapp->screenShots as $item)
                                    <img src="{{ qiniu_cdn($item->image) }}" />
                                    @endforeach
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

                                        <div class="col-md-3 score-container">
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

                                        <div class="col-md-9 rating-box">

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

                <div class="col-md-4 col-lg-3">

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
                                <h2>相关推荐</h2>
                            </div>

                            <div class="box-content">

                                <div class="app-hot-list">
                                    <ul>
                                        <li>
                                            <img src="http://media.ifanrusercontent.com/media/user_files/trochili/0f/05/0f055784ece7ed696f66db495d9be7438417fc50-0917692111b48eec77f1de10abf09c4e4f269260.png"
                                                 alt="">
                                            <div class="title">扇贝小字典</div>

                                            <div class="rating">
                                                <span class="line"></span>
                                                <i class="fa fa-star start" aria-hidden="true"></i>
                                                <i class="fa fa-star start" aria-hidden="true"></i>
                                                <i class="fa fa-star start" aria-hidden="true"></i>
                                                <i class="fa fa-star-half-o star star-half" aria-hidden="true"></i>
                                                <i class="fa fa-star-o start start-empty" aria-hidden="true"></i>
                                                <span class="line"></span>
                                            </div>

                                            <div class="clearfix"></div>
                                        </li>

                                        <li>
                                            <img src="http://media.ifanrusercontent.com/media/user_files/trochili/0a/86/0a86713a99624d29d62890b40688eec48161cdd8-c25c069323e7a26f002d21496dd1def73284b004.png"
                                                 alt="">
                                            <div class="title">农查查</div>

                                            <div class="rating">
                                                <span class="line"></span>
                                                <i class="fa fa-star start" aria-hidden="true"></i>
                                                <i class="fa fa-star start" aria-hidden="true"></i>
                                                <i class="fa fa-star start" aria-hidden="true"></i>
                                                <i class="fa fa-star-half-o star star-half" aria-hidden="true"></i>
                                                <i class="fa fa-star-o start start-empty" aria-hidden="true"></i>
                                                <span class="line"></span>
                                            </div>

                                            <div class="clearfix"></div>
                                        </li>

                                        <li>
                                            <img src="http://media.ifanrusercontent.com/media/user_files/trochili/0a/86/0a86713a99624d29d62890b40688eec48161cdd8-c25c069323e7a26f002d21496dd1def73284b004.png"
                                                 alt="">
                                            <div class="title">农查查</div>

                                            <div class="rating">
                                                <span class="line"></span>
                                                <i class="fa fa-star start" aria-hidden="true"></i>
                                                <i class="fa fa-star start" aria-hidden="true"></i>
                                                <i class="fa fa-star start" aria-hidden="true"></i>
                                                <i class="fa fa-star-half-o star star-half" aria-hidden="true"></i>
                                                <i class="fa fa-star-o start start-empty" aria-hidden="true"></i>
                                                <span class="line"></span>
                                            </div>

                                            <div class="clearfix"></div>
                                        </li>

                                        <li>
                                            <img src="http://media.ifanrusercontent.com/media/user_files/trochili/0a/86/0a86713a99624d29d62890b40688eec48161cdd8-c25c069323e7a26f002d21496dd1def73284b004.png"
                                                 alt="">
                                            <div class="title">农查查</div>

                                            <div class="rating">
                                                <span class="line"></span>
                                                <i class="fa fa-star start" aria-hidden="true"></i>
                                                <i class="fa fa-star start" aria-hidden="true"></i>
                                                <i class="fa fa-star start" aria-hidden="true"></i>
                                                <i class="fa fa-star-half-o star star-half" aria-hidden="true"></i>
                                                <i class="fa fa-star-o start start-empty" aria-hidden="true"></i>
                                                <span class="line"></span>
                                            </div>

                                            <div class="clearfix"></div>
                                        </li>
                                    </ul>
                                </div>

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
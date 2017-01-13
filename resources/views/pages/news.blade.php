@extends('layouts.pages')


@section('title')
    @if(isset($currentTag))
        {{$currentTag->title}}微信小程序大全 @parent
    @else
        WX小程序商店，体验最新最好玩的微信小程序@parent
    @endif
@stop


@section('content')

    <div class="article-lists">

        <div class="container">
            <div class="row">


                <div class="clearfix"></div>
            </div>

            <div class="row">
                @if($wxapps->render())
                    <div class="page">
                        {{ $wxapps->appends(Request::except('page'))->render() }}
                    </div>
                @endif
            </div>
        </div>

        <div class="clearfix"></div>
    </div>

@stop
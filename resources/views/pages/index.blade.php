@extends('layouts.pages')


@section('title')
    @if(isset($currentTag))
        {{$currentTag->title}}微信小程序大全 @parent
    @else
        小程序商店，体验最新最好玩的微信小程序@parent
    @endif
@stop


@section('content')

    @include('widgets.tags')

    @include('pages.partials.board')

    <div class="app-lists">

        <div class="container">
            <div class="row">

                @if(count($wxapps))
                    @foreach($wxapps as $wxapp)

                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-6">
                        @include('pages.partials.wxapp')
                    </div>

                    @endforeach

                @else

                    <div class="col-xs-12">
                        {!! gen_nodata() !!}
                    </div>

                @endif

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

    @include('widgets.friendlinks')

@stop
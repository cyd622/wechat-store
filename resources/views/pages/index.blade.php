@extends('layouts.pages')

@section('content')

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
                        <div class="nothing">
                            <h3>%>_<%</h3>
                            <p>服务器君什么都没找到</p>
                            <p><a href="{{ route('index') }}">回首页</a></p>
                        </div>
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
@stop
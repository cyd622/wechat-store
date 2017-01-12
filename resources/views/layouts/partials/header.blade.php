<section class="dexp-section" id="section-top">
    <div class="container">
        <div class="row">
            <!-- .region-social-top-->
            <div class="region region-social-top col-xs-12 col-sm-6">

                <div id="block-block-46" class="block block-block hidden-xs">
                    <div class="inner"></div>

                    <div class="content">
                        <span>关注WEWX小程序, 每天体验最新最好玩的小程序!</span>
                    </div>
                </div>

            </div>
            <!-- END .region-social-top-->

            <!-- .region-contact-info-->
            <div class="region region-contact-info col-xs-12 col-sm-6">

                <div id="block-tl-general-user-links-tl-general" class="block block-tl-general">
                    <div class="inner"></div>

                    <div class="content login-btns">
                        <a href="https://jq.qq.com/?_wv=1027&k=43PHRrn" target="_blank">点我！加入QQ群: 538083326</a>
                    </div>

                    <div class="clearfix"></div>
                </div>

            </div>
            <!-- END .region-contact-info-->
        </div>
    </div>
</section>


<div id="section-header" class="sticky-wrapper">
    <div class="container">
        <div class="row">

            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('index') }}">
                            <img class="logo" src="{{ cdn('images/logo.png') }}">
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('index') }}">商店首页</a></li>
                            <li><a href="#">小程序社区</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            @if(Auth::user())

                                <li><a href="{{ route('apps.create') }}">提交小程序</a></li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">欢迎，{{ $currentUser->name }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        {{--<li class="divider"></li>--}}
                                        <li><a href="{{ URL::route('logout') }}">退出</a></li>
                                    </ul>
                                </li>

                                @else
                                <li><a href="{{ URL::route('register') }}">注册</a></li>
                                <li><a href="{{ URL::route('login') }}">登录</a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- End .navbar-collapse -->
                </div>
                <!-- End.container-fluid -->
            </nav>

        </div>
    </div>
</div>
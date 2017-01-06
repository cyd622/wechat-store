<!--

     __   __   __  _________  __   __   __  __       __         _________   __          __
    / /  / /  / / / _______/ / /  / /  / / / /      / /        / _______/  / /         / /
   / /  / /  / / / /______  / /  / /  / /   / /    / /        / /         / / / /     / /
  / /  / /  / / / /______/ / /  / /  / /     / // /          / /         / /   / /   / /
 / /__/ /__/ / / /_______ / /__/ /__/ /   / /    / /    __  / /_______  / /     / / / /
 \__________/  \________/ \__________/   /_/      /_/  /_/ /_________/ /_/         /_/
 __________________________________________________________________________________________
                                                                                    wewx.cn
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="baidu-site-verification" content="nhaOUVIFwL" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@section('title')微信小程序商店@show - WX小程序 - Powered by WxStore</title>
    <meta name="keywords" content="@section('keywords') @show微信小程序,微信小程序商店,wewx应用商店,微信应用号,微信小程序入口,微信应用,微信小程序平台,微信小程序开发,微信小程序发布平台" />
    <meta name="author" content="WxStore" />
    <meta name="description" content="@section('description')WX小程序,微信小程序商店,国内最大最全的小程序商店,第一时间体验到最新最好的微信小程序.这里也是小程序发布平台,小程序开发资讯平台,更多内容尽在 wewx.cn.@show" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ cdn(elixir('css/app.css')) }}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<div id="app">

    @include('layouts.partials.header')

    @yield('content')

    @include('layouts.partials.footer')

</div>


<!-- Scripts -->
<script src="{{ cdn('/js/sweetalert.min.js') }}"></script>
<script src="{{ cdn('/js/social-share.min.js') }}"></script>
<script src="{{ cdn(elixir('js/app.js')) }}"></script>
<script src="{{ cdn(elixir('js/main.js')) }}"></script>
<!-- 统计代码 -->
<div style="display: none"><script src="{{ cdn(elixir('js/19083481.js')) }}"></script></div>
<!-- 百度Push-->
<script>
    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
</script>
</body>
</html>

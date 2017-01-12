
<!-- Scripts -->
<script src="{{ cdn('/js/sweetalert.min.js') }}"></script>
<script src="{{ cdn('/js/social-share.min.js') }}"></script>
<script src="{{ cdn(elixir('js/app.js')) }}"></script>

@yield('scripts')

<!-- 统计代码 -->
<div style="display: none"><script src="{{ cdn(elixir('js/19083481.js')) }}"></script></div>

<!-- 百度Push-->
<script>
    var _hmt = _hmt || [];

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


        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?69cd8117fa4ac3c4f4bdb93cf6aa55be";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

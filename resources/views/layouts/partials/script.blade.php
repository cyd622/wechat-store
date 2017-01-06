
<!-- Scripts -->
<script src="{{ cdn('/js/sweetalert.min.js') }}"></script>
<script src="{{ cdn('/js/social-share.min.js') }}"></script>
<script src="{{ cdn(elixir('js/app.js')) }}"></script>

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

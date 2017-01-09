<section id="footer">
    <div class="container">
        <div class="row">

            <div class="col-xs-12">

                @if($browserType == 'mobile')

                    <div class="ft-header">
                        <div class="">
                            <p>第一时间体验最新最好的微信小程序。</p>
                            <p>鄂ICP备12006553号-5</p>
                        </div>

                        <div class="">
                            <div class="social-share"
                                 data-sites="weibo,wechat,facebook,twitter,google,qzone,qq,douban"
                                 data-wechat-qrcode-helper="<p>微信里点“发现”，扫一下</p><p>二维码便可将本站分享至朋友圈。</p>"
                            >
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>

                    @else

                    <div class="ft-header">
                        <div class="pull-left">
                            <img src="{{ cdn('images/logo.png') }}" class="footer-logo gray-image">

                            <p>第一时间体验最新最好的微信小程序。</p>
                            <p>鄂ICP备12006553号-5</p>
                        </div>

                        <div class="pull-right">
                            <div class="social-share"
                                 data-sites="weibo,wechat,facebook,twitter,google,qzone,qq,douban"
                                 data-wechat-qrcode-helper="<p>微信里点“发现”，扫一下</p><p>二维码便可将本站分享至朋友圈。</p>"
                            >
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>

                @endif

            </div>

        </div>
    </div>
</section>



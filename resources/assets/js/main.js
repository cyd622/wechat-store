/**
 * Created by zyxcba on 2016/12/31.
 */
(function($){
    var Wewx = {
        init: function () {
            var self = this

            console.log('     __   __   __  _________  __   __   __  __       __         _________   __          __')
            console.log('    / /  / /  / / / _______/ / /  / /  / / / /      / /        / _______/  / /         / /')
            console.log('   / /  / /  / / / /______  / /  / /  / /   / /    / /        / /         / / / /     / /')
            console.log('  / /  / /  / / / /______/ / /  / /  / /     / // /          / /         / /   / /   / /')
            console.log(' / /__/ /__/ / / /_______ / /__/ /__/ /   / /    / /    __  / /_______  / /     / / / /')
            console.log(' \\\__________/  \\\________/ \\\__________/   /_/      /_/  /_/  \\\________/ /_/         /_/')

            console.log('wxstore 官网 http://wewx.cn/wxstore')
            console.log('WxStore 是国内首款免费开源的小程序应用商店系统。')

            self.bootUp()
        },

        bootUp: function () {
            var self = this;

            self.initToolTips()
            self.initPopup()
            self.initTagsSelector()
            self.initStarSelector()
            self.initQrcode()
        },

        initToolTips: function () {
            $('[data-toggle="tooltip"]').tooltip()
        },

        initPopup: function () {
            // Popover with html
            $('.popover-with-html').popover({
                html : true,
                trigger : 'hover',
                container: 'body',
                placement: 'auto top',
            });
        },

        initTagsSelector: function () {
            var self = this

            $(document).on("click", ".tags li", function () {
                that = $(this)

                var id = that.attr("data-id")
                console.log('tag: ' + id)

                if(that.hasClass('active')) {
                    $(".tags .selected").find("input.tag-" + id).remove()
                    that.removeClass('active')
                } else {

                    if($(".tags li.active").length > 4) {
                        return false;
                    }

                    that.addClass('active')
                    var html = '<input type="hidden" class="tag-' + id + '" name="tags[]" value="' + id + '" />'
                    console.log(html)
                    $(".tags .selected").append(html)
                }
            })
        },

        initStarSelector: function () {
            var self = this

            $(document).on("click", ".rating-selector .star", function () {
                var that = $(this)
                $(".rating-selector .star").removeClass('fa-star').addClass('fa-star-o')

                $.each($(".rating-selector .star"), function (i, d) {
                    if(i <= that.attr('data-index')) {
                        $(this).addClass('fa-star').removeClass('fa-star-o')
                    }
                })

                $(".rating-selector input[name=rating]").val(parseInt(that.attr('data-index')) + 1)
                console.log(that.attr('data-index'))
            })
        },

        initQrcode: function () {
            $(".app-item .likes .qrcode").hover(function () {
                $(this).parents(".app-item").find(".qrcode-box").show()
            }, function () {
                $(this).parents(".app-item").find(".qrcode-box").hide()
            })
        }
    }

    window.Wewx = Wewx
})(jQuery)

$(document).ready(function()
{
    Wewx.init();
})
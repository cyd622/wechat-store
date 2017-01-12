/**
 * Created by zyxcba on 2016/12/31.
 */
(function($){
    var Wewx = {
        init: function () {
            var self = this

            self.siteBootUp()
        },

        siteBootUp: function () {
            var self = this;

            self.initToolTips()
            self.initPopup()
            self.initTagsSelector()
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
        }

    }

    window.Wewx = Wewx
})(jQuery)

$(document).ready(function()
{
    Wewx.init();
})
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
        },

        initToolTips: function () {
            $('[data-toggle="tooltip"]').tooltip()
        },

        initPopup: function(){
            // Popover with html
            $('.popover-with-html').popover({
                html : true,
                trigger : 'hover',
                container: 'body',
                placement: 'auto top',
            });
        },
    }

    window.Wewx = Wewx
})(jQuery)

$(document).ready(function()
{
    Wewx.init();
})

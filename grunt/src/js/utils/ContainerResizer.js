define(['jquery'], function ($) {
    "use strict";
    var ContainerResizer = function (el, config) {
        this.el = el;
        this.$el = $(this.el);
        this.resize = function (full) {
            if (!!full || this.$el.hasClass('container-resizer-full')) {
                hideSacer(this);
                this.$el.removeClass('container-resizer-full');
                $('html').removeClass('container-resizer-fullscreen');
            } else {
                showSpacer(this);
                this.$el.addClass('container-resizer-full');
                $('html').addClass('container-resizer-fullscreen');
            }
        };
        setup(this, config);
    };
    function hideSacer(scope){
        scope.$spacer.hide();
    }
    function showSpacer(scope){
        scope.$spacer.width(scope.$el.width());
        scope.$spacer.height(scope.$el.height());
        scope.$spacer.show();
    }
    function setup(scope, config) {
        var $spacer = $('<div />');
        $spacer.hide();
        scope.$el.after($spacer);
        scope.$spacer = $spacer;
        if (!scope.$el.hasClass('container-resizer')) {
            config = config || scope.$el.data('containerResizer') || {};
            config.nativeFullscreen = typeof config.nativeFullscreen != 'undefined' ? config.nativeFullscreen : false;
            scope.$el.addClass('container-resizer');
            var $resizer = $('<a class="container-resizer-helper"><span></span></a>');
            $resizer.click(function (e) {
                e.preventDefault();
                scope.resize();
            });
            scope.$el.append($resizer);
        }
    }
    return ContainerResizer;
});
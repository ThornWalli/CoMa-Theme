define(['jquery', './Events', '../services/viewportObserver', './Bounce'], function ($, Events, viewportObserver, Bounce) {
    "use strict";
    /**
     * Dient zum überprüfen ob ein Element sich im Viewport befindet.
     * @param {HTMLElement} el
     * @param {Object} config
     * @returns ScrollView
     * @constructor
     */
    var ScrollView = function (el, config) {
        this.el = el;
        this.$el = $(this.el);
        if (this.$el.data('ScrollView')) {
            return this.$el.data('ScrollView');
        }
        Events.apply(this, arguments);
        this.config = {
            /**
             * Gibt an ob die Animation nur stattfindet, wenn Element von unten kommt.
             */
            only_from_bottom: false,
            /**
             * Prozentualer-Wert an dem sich das Element einblenden tut.
             */
            animation_start: 0.5,
            /**
             * CSS-Klassen die sich beim initialisieren auf das Element legen.
             */
            style_classes: ''
        };
        if (config && typeof config == 'object') {
            this.config.only_from_bottom = config.only_from_bottom || false;
            this.config.animation_start = parseFloat(config.animation_start) || this.config.animation_start;
            this.config.style_classes = config.style_classes || this.config.style_classes;
        }
        this.$el.data('ScrollView', this);
        this.$el.addClass(this.config.style_classes);
        this.bounce = new Bounce();
        this.width = null;
        this.height = null;
        viewportObserver.wrapperSize = {
            width: null,
            height: null
        };
        viewportObserver.on('resize',onScroll.bind(this));
        viewportObserver.on('scroll',onScroll.bind(this));
        viewportObserver.refresh();
    };
    ScrollView.prototype.onActive = function () {
        this.trigger('active');
        this.$el.addClass('in-view');
    };
    ScrollView.prototype.onInactive = function () {
        this.trigger('inactive');
        this.$el.removeClass('in-view');
    };
    function onScroll(type, data) {
        if (type == 'resize') {
            this.width = this.$el.height();
            this.height = this.$el.height();
            viewportObserver.wrapperSize.width = data.width;
            viewportObserver.wrapperSize.height = data.height;
        } else {
            this.bounce.calculate(this.el.offsetTop - data, this.el.offsetLeft, this.width, this.height);
            if (
                this.bounce.maxY < 0 ||
                this.bounce.y > viewportObserver.wrapperSize.height) {
                if (!this.config.only_from_bottom || this.config.only_from_bottom && this.bounce.maxY > 0) {
                    this.onInactive();
                }
            } else {
                var value = ((viewportObserver.wrapperSize.height - this.bounce.y) / viewportObserver.wrapperSize.height);
                if (value > this.config.animation_start || (viewportObserver.containerSize.height - viewportObserver.wrapperSize.height) == data) {
                    this.onActive();
                }
            }
        }
    }
    return ScrollView;
});
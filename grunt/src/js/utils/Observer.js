define(['jquery', './Events'], function ($, Events) {
    "use strict";
    var Observer = function (wrapper, container) {
        Events.apply(this, arguments);
        var promise = new Promise(function (resolve, reject) {
            if (!wrapper) {
                reject('no wrapper');
            }
            if (!container) {
                reject('no container');
            }
            this.wrapperSize = {
                width: null, height: null
            };
            this.containerSize = {
                width: null, height: null
            };
            this.wrapper = wrapper;
            this.$wrapper = $(this.wrapper);
            this.container = container;
            this.$container = $(this.container);
            this.$wrapper.resize(function (e) {
                this.wrapperSize.width = this.$wrapper.width();
                this.wrapperSize.height = this.$wrapper.height();
                this.containerSize.width = this.$container.outerWidth();
                this.containerSize.height = this.$container.outerHeight();
                triggerListeners(this, 'resize', e);
                triggerListeners(this, 'scroll', e);
            }.bind(this));
            this.$wrapper.scroll(function (e) {
                triggerListeners(this, 'scroll', e);
            }.bind(this));
            resolve();
        }.bind(this)).then(function () {
            this.refresh();
        }.bind(this)).catch(function (err) {
            console.error(err);
        });
    };
    Observer.prototype.refresh = function () {
        this.$wrapper.resize();
        this.$wrapper.scroll();
    };
    function triggerListeners(scope, eventType, e) {
        window.animationFrame.add(function () {
            var data = e.currentTarget.pageYOffset;
            if (eventType == 'resize') {
                data = {
                    width: scope.wrapperSize.width,
                    height: scope.wrapperSize.height
                };
            }
            scope.trigger(eventType, eventType, data);
        });
    }
    return Observer;
});
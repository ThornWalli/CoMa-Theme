//window.HTMLPictureElement = null;
(function (root, factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        // Node. Does not work with strict CommonJS, but
        // only CommonJS-like environments that support module.exports,
        // like Node.
        module.exports = factory(require('jquery'));
    } else {
        // Browser globals (root is window)
        root.returnExports = factory(root.b);
    }
}(this, function ($) {
    window.picture.addjQueryTriggerSupport($);
    if (window.addEventListener) {
        document.addEventListener('DOMContentLoaded', function() {
            window.picture.parse();
        }, false);
        window.addEventListener('resize', function () {
            window.picture.parse();
        }, false);
    } else {
        document.attachEvent("onreadystatechange", function() {
            window.picture.parse();
        });
        window.attachEvent('onresize', function () {
            window.picture.parse();
        });
    }

    return window.picture;
}));
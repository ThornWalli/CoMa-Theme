define(function () {
    "use strict";
    var Events = function () {
        this.listeners = {};
        this.on = function (event, callback) {
            if (typeof callback == 'function') {
                if (!Array.isArray(this.listeners[event])) {
                    this.listeners[event] = [];
                }
                this.listeners[event].push(callback);
            }
        };
        this.off = function (event, callback) {
            if (Array.isArray(this.listeners[event])) {
                this.listeners[event].splice(this.listeners[event].indexOf(callback), 1);
            }
        };
        this.trigger = function (event) {
            var args = arguments;
            if (this.listeners[event]) {
                this.listeners[event].forEach(function (callback) {
                    if (args.length > 3) {
                        callback(args[1], args[2], args[3]);
                    } else if (args.length > 2) {
                        callback(args[1], args[2]);
                    } else if (args.length > 1) {
                        callback(args[1]);
                    } else {
                        callback(args[0]);
                    }
                });
            }
        };
    };
    return Events;
});
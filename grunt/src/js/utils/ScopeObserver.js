define([], function () {
    "use strict";
    var ScopeObserver = function (imports, scopeName, initCallback) {
        this.listeners = []
        this.interval = null;
        this.get = function (callback) {
            if (!!window[scopeName]) {
                callback(window[scopeName]);
            } else {
                this.listeners.push(callback);
            }
        };
        setup(this, imports, scopeName, initCallback);
    };
    function setup(scope, imports, scopeName, initCallback) {
        if (!!window[scopeName]) {
            if (typeof initCallback == 'function') {
                initCallback(window[scopeName]);
            }
        } else {
            scope.interval = window.setInterval(function () {
                if (!!window[scopeName]) {
                    if (typeof initCallback == 'function') {
                        initCallback(window[scopeName]);
                    }
                    this.listeners.forEach(function (callback) {
                        callback(window[scopeName]);
                    });
                    window.clearInterval(this.interval);
                    this.listeners = [];
                }
            }.bind(scope), 350);
            require(Array.isArray(imports) ? imports : []);
        }
    }
    return ScopeObserver;
});
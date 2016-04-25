define(['jquery', '../utils/Observer'], function ($, Observer) {
    var observer = new Observer(window, document.body);
    return observer;
});
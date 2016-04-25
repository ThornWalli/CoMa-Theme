define(function () {
    "use strict";
    var Bounce = function () {
        this.x = 0;
        this.y = 0;
        this.maxX = 0;
        this.maxY = 0;
        this.calculate = function (top, left, width, height) {
            this.x = left;
            this.y = top;
            this.maxX = this.x + width;
            this.maxY = this.y + height;
        };
        this.toString = function () {
            return 'x: ' + this.x + ' maxX: ' + this.maxX + ' y: ' + this.y + ' maxY: ' + this.maxY;
        }
    };
    return Bounce;
});
if (window.name != 'cached') {
    document.write('<link rel="stylesheet" href="' + stylesheetUrl + '" type="text/css" media="async"/>');
    document.querySelector('html').className += ' font-loading';
} else {
    document.write('<link rel="stylesheet" href="' + stylesheetUrl + '" type="text/css" media="screen"/>');
}

WebFontConfig = {
    custom: {
        families: ['coma-theme-icon'],
        testStrings: {
            'My Font': '\u1f31e\ue901'
        }
    },
    google: {families: ['Open+Sans:300,400,600,700:latin']},
    active: function () {
        window.animationFrame.add(function () {
            document.querySelector('html').className = document.querySelector('html').className.replace(/font-loading/, 'font-loaded');
        });
    }
};
var wf = document.createElement('script');
wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
wf.type = 'text/javascript';
wf.async = 'true';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(wf, s);
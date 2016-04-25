require.config({

    shim: {
        'prismjs-php' : {
            deps: ['prismjs']
        }
    },

    map: {
        jQuery: {
            jquery: 'jquery'
        }
    },

    paths: {
        'jquery': '../../node_modules/jquery/dist/jquery',
        'slick': '../../node_modules/slick-carousel/slick/slick',
        'prismjs': '../../node_modules/prismjs/prism',
        'prismjs-linenumbers': '../../node_modules/prismjs/plugins/line-numbers/prism-line-numbers',
        'prismjs-css': '../../node_modules/prismjs/components/prism-css',
        'prismjs-js': '../../node_modules/prismjs/components/prism-javascript',
        'prismjs-php': '../../node_modules/prismjs/components/prism-php'
    }

});

require(['main'], function () {
});
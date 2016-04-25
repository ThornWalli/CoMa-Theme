require(['jquery', 'slick', 'utils/ScrollView', 'utils/ContainerResizer', 'services/prismLoader'], function ($, slick, ScrollView, ContainerResizer, prismLoader) {

    $('[data-scroll-view]').each(function (i, el) {
        var $el = $(el);
        $el.addClass('scroll-view');
        new ScrollView(el, $el.data('scrollView'));
        $el.addClass('scroll-view-init');
    });

    $('[data-slider]').each(function (i, el) {
        var $el = $(el);
        var played = false;

        var config = $el.data('slider');
        $el.slick(config);

        if (el.scrollView && config.autoplay) {
            el.scrollView.on('active', function () {
                if (!played) {
                    console.log('play');

                    $el.slick('slickPlay');
                    played = true;
                }
            });
            el.scrollView.on('inactive', function () {
                if (played) {
                    console.log('pause');
                    $el.slick('slickPause');
                    played = false;
                }
            });
        }

    });

    $('[data-code]').each(function (i, el) {

        prismLoader.get(function (Prism) {

            var $el = $(el);
            if ($el.find('>.code>pre').height() > $el.data('codeMaxHeight')) {
                $el.addClass('code-min');
            }
            console.log($el.find('code').get(0));

            Prism.hooks.add('complete', function (env) {
                if (!env.code) {
                    return;
                }

                // works only for <code> wrapped inside <pre> (not inline)
                var pre = env.element.parentNode;
                var clsReg = /\s*\bline-numbers\b\s*/;
                if (
                    !pre || !/pre/i.test(pre.nodeName) ||
                        // Abort only if nor the <pre> nor the <code> have the class
                    (!clsReg.test(pre.className) && !clsReg.test(env.element.className))
                ) {
                    return;
                }

                if (env.element.querySelector(".line-numbers-rows")) {
                    // Abort if line numbers already exists
                    return;
                }

                if (clsReg.test(env.element.className)) {
                    // Remove the class "line-numbers" from the <code>
                    env.element.className = env.element.className.replace(clsReg, '');
                }
                if (!clsReg.test(pre.className)) {
                    // Add the class "line-numbers" to the <pre>
                    pre.className += ' line-numbers';
                }

                var match = env.code.match(/\n(?!$)/g);
                var linesNum = match ? match.length + 1 : 1;
                var lineNumbersWrapper;

                var lines = new Array(linesNum + 1);
                lines = lines.join('<span></span>');

                lineNumbersWrapper = document.createElement('span');
                lineNumbersWrapper.className = 'line-numbers-rows';
                lineNumbersWrapper.innerHTML = lines;

                if (pre.hasAttribute('data-start')) {
                    pre.style.counterReset = 'linenumber ' + (parseInt(pre.getAttribute('data-start'), 10) - 1);
                }

                env.element.appendChild(lineNumbersWrapper);

            });
            Prism.highlightElement($el.find('code').get(0), false);

            $el.addClass('code-init');

            $el.children('[type="checkbox"]').on('change', function () {
                window.animationFrame.add(function () {
                    $(window).resize();
                });
            });

            window.animationFrame.add(function () {
                $(window).resize();
            });

        });

    });

    $('[data-container-resizer]').each(function (i, el) {
        var containerResizer = new ContainerResizer(el);
    });

});
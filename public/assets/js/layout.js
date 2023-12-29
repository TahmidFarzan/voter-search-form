(function ($) {
    "use strict";

    const onscroll = (el, listener) => {
        el.addEventListener('scroll', listener);
    }

    let preloader = $('#preloader');
    if (preloader.length) {
        window.addEventListener('load', () => {
            preloader.delay(100).fadeOut(555);
        });
    }

    let backtotop = document.querySelector('#backToTop');
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add('active');
            } else {
                backtotop.classList.remove('active');
            }
        };
        window.addEventListener('load', toggleBacktotop);
        onscroll(document, toggleBacktotop);
    }

    $(document).on('click', '#backToTop', function () {
        window.scrollTo(0, 0);
    });

}(jQuery));

/**
 * @function      Include
 * @description   Includes an external scripts to the page
 * @param         {string} scriptUrl
 */
function include(scriptUrl) {
    document.write('<script src="' + scriptUrl + '"></script>');
}


/**
 * @function      isIE
 * @description   checks if browser is an IE
 * @returns       {number} IE Version
 */
function isIE() {
    var myNav = navigator.userAgent.toLowerCase();
    return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
};


/**
 * @module       Copyright
 * @description  Evaluates the copyright year
 */
;
(function ($) {
    var currentYear = (new Date).getFullYear();
    $(document).ready(function () {
        $("#copyright-year").text((new Date).getFullYear());
    });
})(jQuery);


/**
 * @module       IE Fall&Polyfill
 * @description  Adds some loosing functionality to old IE browsers
 */
;
(function ($) {
    if (isIE() && isIE() < 11) {
        include('js/pointer-events.min.js');
        $('html').addClass('lt-ie11');
        $(document).ready(function () {
            PointerEventsPolyfill.initialize({});
        });
    }

    if (isIE() && isIE() < 10) {
        $('html').addClass('lt-ie10');
    }
})(jQuery);


/**
 * @module       WOW Animation
 * @description  Enables scroll animation on the page
 */
;
(function ($) {
    var o = $('html');
    if (o.hasClass('desktop') && o.hasClass("wow-animation") && $(".wow").length) {
        include('js/wow.min.js');

        $(document).ready(function () {
            new WOW().init();
        });
    }
})(jQuery);

/**
 * @module       Responsive Tabs
 * @description  Enables Easy Responsive Tabs Plugin
 */
;
(function ($) {
    var o = $('.responsive-tabs');
    if (o.length > 0) {
        include('js/jquery.easy-responsive-tabs.min.js');

        $(document).ready(function () {
            o.each(function () {
              $(this).easyResponsiveTabs();
            });
        });
    }
})(jQuery);

/**тест data
 * @module       RD Twitter Feed
 * @description  Enables RD Twitter Feed
 */
;
(function ($) {
    var o = $('.twitter');
    if (o.length > 0) {
        include('../dist/js/jquery.rd-twitter-feed.min.js');
        include('js/isotope.pkgd.min.js');

        $(document).ready(function () {
            o.each(function () {
                var $this = $(this),
                    _this = this;

                $this.RDTwitter({
                    loadingText: '',
                    callback: function () {
                        var iso = new Isotope(_this, {
                                itemSelector: '[class*="col-"]',
                                layoutMode: _this.getAttribute('data-layout') ? _this.getAttribute('data-layout') : 'masonry'
                            });

                        $(window).on("resize", function () {
                            iso.layout();
                        });

                        $(window).load(function () {
                            iso.layout();
                            setTimeout(function () {
                                _this.className += " isotope--loaded";
                                iso.layout();
                            }, 2000);
                        });

                        var o2 = $('.responsive-tabs');

                        if (o2.length){
                            o2.find('li').click(function () {
                                $this.removeClass('isotope--loaded');
                                setTimeout(function () {
                                    _this.className += " isotope--loaded";
                                    iso.layout();
                                }, 2000);

                            })
                        }
                    }
                });
            });
        });
    }
})(jQuery);

/**
 * @module       RD Navbar
 * @description  Enables RD Navbar Plugin
 */
;
(function ($) {
    var o = $('.rd-navbar');
    if (o.length > 0) {
        include('js/jquery.rd-navbar.min.js');

        $(document).ready(function () {
            o.rdnavbar({
                stuckWidth: 100000,
                stuckMorph: false,
                stuckLayout: "rd-navbar-static",
                responsive: {
                    0: ["rd-navbar-fixed"],
                    767: o.attr("data-rd-navbar-lg").split(" ")
                },
                onepage: {
                    enable: false,
                    offset: 0,
                    speed: 400
                }
            });
        });
    }
})(jQuery);
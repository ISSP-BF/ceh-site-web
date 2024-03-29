(function ($) {
    // Menu fixes
    'use strict';


    function scrollToTop() {
        
    }
    function onResizeMenuLayout() {
        if ($(window).width() > 767) {
            $(".dropdown").hover(
                    function () {
                        $(this).addClass('open')
                    },
                    function () {
                        $(this).removeClass('open')
                    }
            );
            $(".dropdown").focusin(
                    function () {
                        $(this).addClass('open')
                    },
                    );
            $(".dropdown").focusout(
                    function () {
                        $(this).removeClass('open')
                    },
                    );
            $(".dropdown-submenu").focusin(
                    function () {
                        $(this).addClass('open')
                    },
                    );
            $(".dropdown-submenu").focusout(
                    function () {
                        $(this).removeClass('open')
                    },
                    );

        } else {
            $(".dropdown").hover(
                    function () {
                        $(this).removeClass('open')
                    }
            );
        }
    }
    ;
    // initial state
    onResizeMenuLayout();

    // on resize
    $(window).on('resize', onResizeMenuLayout);

    $('.navbar .dropdown-toggle').hover(function () {
        $(this).addClass('disabled');
    });
    $('.navbar .dropdown-toggle').focus(function () {
        $(this).addClass('disabled');
    });
    var i=1;
    $(window).scroll(function () {
        var header = $('.site-header').outerHeight();
        if ($(document).scrollTop() > (header + 10)) {
            $('nav#site-navigation').addClass('shrink');
            $('#logo2').removeClass('hidden');
        } else {
            $('nav#site-navigation').removeClass('shrink');
            $('#logo2').addClass('hidden');
           // console.log(i++);
        }

        
        console.log(i++);

        if($(document).scrollTop() <= (header + 10)){
              $(".scroll-to-top").addClass('hidden'); 
             // console.log(i++); 
            }
        else{
            $(".scroll-to-top").removeClass('hidden');  
        }

    });
        

    $('.open-panel').each(function () {
        var menu = $(this).data('panel');
        $("#" + menu).click(function () {
            $("#blog").toggleClass("openNav");
            $("#" + menu + ".open-panel").toggleClass("open");
        });

        $('.menu-container').on('focusout', function (e) {
            setTimeout(function () { // needed because nothing has focus during 'focusout'
                if ($(':focus').closest('.menu-container').length <= 0) {
                    $("#blog").toggleClass("openNav");
                    $("#" + menu + ".open-panel").toggleClass("open");
                }
            }, 0);
        });
    });
    $('#top-navigation').on('focusout', function (e) {
            setTimeout(function () { // needed because nothing has focus during 'focusout'
                if ($(':focus').closest('.navbar-collapse').length <= 0) {
                    $(".navbar-collapse").toggleClass("in");
                }
            }, 0);
        });

    $('.top-search-icon').click(function (e) {
        $(".top-search-box").show('slow');
        $(".top-search-icon .fa").toggleClass("fa-times fa-search");
        $(".top-search-box input#s").focus();

    });
    $('.top-search-box').on('focusout', function (e) {
        setTimeout(function () { // needed because nothing has focus during 'focusout'
            if ($(':focus').closest('.top-search-box').length <= 0) {
                $(".top-search-box").hide();
                $(".top-search-icon .fa").removeClass('fa-times').addClass('fa-search');
            }
        }, 0);
    });

    $(".split-slider.news-item-3").hover(function () {
        $(".news-item-2").toggleClass("split-slider-left");
    });
    scrollToTop();
})(jQuery);

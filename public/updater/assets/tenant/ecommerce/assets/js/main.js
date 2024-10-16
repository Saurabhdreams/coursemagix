/*---------------------------
	JS INDEX
	===================
-----------------------------*/

'use strict';

(function($) {

    /*-----------------------------
    === ALL ESSENTIAL FUNCTIONS ===
    ------------------------------*/

    $('.canvas_open').on('click', function() {
        $('.offcanvas_menu_wrapper,.off_canvars_overlay').addClass('active')
    });

    $('.canvas_close,.off_canvars_overlay').on('click', function() {
        $('.offcanvas_menu_wrapper,.off_canvars_overlay').removeClass('active')
    });

    /*---Off Canvas Menu---*/
    var $offcanvasNav = $('.offcanvas_main_menu'),
        $offcanvasNavSubMenu = $offcanvasNav.find('.sub-menu');
    $offcanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i class="fal fa-angle-down"></i></span>');

    $offcanvasNavSubMenu.slideUp();

    $offcanvasNav.on('click', 'li a, li .menu-expand', function(e) {
        var $this = $(this);
        if (($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand'))) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length) {
                $this.siblings('ul').slideUp('slow');
            } else {
                $this.closest('li').siblings('li').find('ul:visible').slideUp('slow');
                $this.siblings('ul').slideDown('slow');
            }
        }
        if ($this.is('a') || $this.is('span') || $this.attr('clas').match(/\b(menu-expand)\b/)) {
            $this.parent().toggleClass('menu-open');
        } else if ($this.is('li') && $this.attr('class').match(/\b('menu-item-has-children')\b/)) {
            $this.toggleClass('menu-open');
        }
    });

    $(".categories_btn").on('click', function() {
        $('.side_navbar_toggler').attr('aria-expanded', 'false');
        $('#navbarSidetoggle').removeClass('show');
    });

    var rclass = true;

    $("html").on('click', function() {
        if (rclass) {
            $('.categories_btn').addClass('collapsed');
            $('.categories_btn,.side_navbar_toggler').attr('aria-expanded', 'false');
            $('#navCatContent,#navbarSidetoggle').removeClass('show');
        }
        rclass = true;
    });

    $(".categories_btn,#navCatContent,#navbarSidetoggle .navbar-nav,.side_navbar_toggler").on('click', function() {
        rclass = false;
    });

    $('.more_slide_open').slideUp();
    $('.more_categories').on('click', function() {
        $(this).toggleClass('show');
        $('.more_slide_open').slideToggle();
        if ($(this).hasClass('show')) {
            $('.more_categories span').text('Show less');
        } else {
            $('.more_categories span').text('Show more');
        }
    });

    $('.product-countdown').each(function() {
        let $this = $(this);
        $this.syotimer({
            date: new Date($this.data('now')),
            year: $this.data('year'),
            month: $this.data('month'),
            day: $this.data('day'),
            hour: $this.data('hour'),
            minute: $this.data('minute'),
            timeZone: $this.data('timezone')
        })
    });
    //===== Related Product Slider
    function relatedProSlider() {
        $('.slider-col-4').slick({
            dots: true,
            arrows: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            speed: 1000,
            slidesToShow: 4,
            slidesToScroll: 1,
            rtl: langDir == 1 ? true : false,
            responsive: [{
                    breakpoint: 1201,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        arrows: false,
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]

        });
    }
    // =====  Bootstrap accordion
    function bootstrapAccordion() {
        $('.accordion').on('hide.bs.collapse show.bs.collapse', (e) => {
            $(e.target).prev().find('i').toggleClass('fa-minus fa-plus');
            $(e.target).prev().toggleClass('active-header');
        });
    }
    function popupImg() {
        $('.img-popup').magnificPopup({
            type: "image",
            gallery: {
                enabled: true
            }
        });
    }
    // =====  Price Range
    function priceRange() {
        $("#slider-range").slider({
            range: true,
            min: 30.00,
            max: 500.00,
            values: [30.00, 500.00],
            slide: function(event, ui) {
                $("#amount1").val(
                    `$` +
                    ui.values[0] + ".00" +
                    ``
                );
                $("#amount2").val(
                    `$` +
                    ui.values[1] + ".00" +
                    ``
                );
            }
        });
    }
    // =====  Product Gallery Slider
    function gallerySlider() {
        var galleryDots = $('.product-gallery-arrow');
        $('.product-gallery-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 6000,
            arrows: true,
            rtl: langDir == 1 ? true : false,
            nextArrow: '<button class="slick-arrow next-arrow"><i class="fal fa-long-arrow-right"></i></button>',
            prevArrow: '<button class="slick-arrow prev-arrow"><i class="fal fa-long-arrow-left"></i></button>',
            dots: true,
            appendDots: galleryDots,
            customPaging: function(slick, index) {
                var portrait = $(slick.$slides[index]).data('thumb');
                return '<img src=" ' + portrait + ' "/>';
            },
        });
    }
    // =====  Back to top
    function gtToTop() {
        // Scroll Event
        $(window).on('scroll', function() {
            var scrolled = $(window).scrollTop();
            if (scrolled > 300) $('.go-top').addClass('active');
            if (scrolled < 300) $('.go-top').removeClass('active');
        });

        // Click Event
        $('.go-top').on('click', function() {
            $("html, body").animate({
                scrollTop: "0"
            }, 1200);
        });
    }

    /*---------------------
    === DOCUMENT READY  ===
    ----------------------*/
    bootstrapAccordion()
    relatedProSlider()
    priceRange()
    gallerySlider()
    gtToTop()
    popupImg()

    // =====  Quantity Increment
    $(document).on('click', '.quantity-down', function() {
        var numProduct = Number($(this).next().val());
        if (numProduct > 0) $(this).next().val(numProduct - 1);
    });
    $(document).on('click', '.quantity-up', function() {
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);
    });

    // Product details page
    var arrowBody = $(".product-gallery-arrow");
    var arrowList = $(".product-gallery-arrow .slick-dots li");

    if (arrowList.length > 3) {
        arrowBody.toggleClass("overflow")
    }
})(jQuery);

$(document).ready(function() {
    // lazy load init
    var lazyLoadInstance = new LazyLoad();
})

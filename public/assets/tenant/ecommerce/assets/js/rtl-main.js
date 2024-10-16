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

    //===== electronics slide slick slider
    var sliderArrows = $('.electronics-arrows');
    $('.electronics-active').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        appendArrows: sliderArrows,
        prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
        nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
        speed: 1000,
        slidesToShow: 5,
        slidesToScroll: 2,
        rtl: true,
        responsive: [{
                breakpoint: 1201,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 992,
                settings: {
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

    //===== electronics slide slick slider
    $('.electronics-active-2').slick({
        dots: false,
        infinite: true,
        autoplay: false,
        autoplaySpeed: 2000,
        arrows: true,
        prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
        nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
        speed: 1000,
        slidesToShow: 4,
        slidesToScroll: 2,
        rows: 2,
        rtl: true,
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

    //===== electronics slide slick slider
    $('.electronics-active-3').slick({
        dots: true,
        arrows: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
        speed: 1000,
        slidesToShow: 4,
        slidesToScroll: 1,
        rtl: true,
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

    //===== shop lookbook slide slick slider
    $('.shop-lookbook-slider').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
        nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
        speed: 1000,
        slidesToShow: 3,
        slidesToScroll: 1,
        vertical: true,
        verticalSwiping: true
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

    //===== Main Banner Slider
    function mainSlider() {
        var BasicSlider = $('.banner-slide');
        var BasicSlider2 = $('.banner-slide-2');
        BasicSlider.on('init', function(e, slick) {
            var $firstAnimatingElements = $('.banner-item:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });
        BasicSlider2.on('init', function(e, slick) {
            var $firstAnimatingElements = $('.banner-2-area:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });
        BasicSlider.on('beforeChange', function(e, slick, currentSlide, nextSlide) {
            var $animatingElements = $('.banner-item[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        });
        BasicSlider2.on('beforeChange', function(e, slick, currentSlide, nextSlide) {
            var $animatingElements = $('.banner-2-area[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        });
        BasicSlider.slick({
            autoplay: true,
            autoplaySpeed: 10000,
            dots: true,
            fade: false,
            arrows: false,
            rtl: true,
            responsive: [{
                breakpoint: 576,
                settings: {
                    arrows: false
                }
            }]
        });
        BasicSlider2.slick({
            autoplay: true,
            autoplaySpeed: 10000,
            dots: false,
            fade: true,
            arrows: true,
            rtl: true,
            prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
            responsive: [{
                breakpoint: 576,
                settings: {
                    arrows: false
                }
            }]
        });

        function doAnimations(elements) {
            var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            elements.each(function() {
                var $this = $(this);
                var $animationDelay = $this.data('delay');
                var $animationType = 'animated ' + $this.data('animation');
                $this.css({
                    'animation-delay': $animationDelay,
                    '-webkit-animation-delay': $animationDelay
                });
                $this.addClass($animationType).one(animationEndEvents, function() {
                    $this.removeClass($animationType);
                });
            });
        }
    }
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
            rtl: true,
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
            nextArrow: '<button class="slick-arrow next-arrow"><i class="fal fa-long-arrow-right"></i></button>',
            prevArrow: '<button class="slick-arrow prev-arrow"><i class="fal fa-long-arrow-left"></i></button>',
            dots: true,
            rtl: true,
            appendDots: galleryDots,
            customPaging: function(slick, index) {
                var portrait = $(slick.$slides[index]).data('thumb');
                return '<img src=" ' + portrait + ' "/>';
            },
        });
    }
    // =====  Portfolio Details Slider
    function portfolioDetailsSlider() {
        $('.portfolio-details-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 6000,
            arrows: true,
            nextArrow: '<button class="slick-arrow next-arrow"><i class="fal fa-long-arrow-right"></i></button>',
            prevArrow: '<button class="slick-arrow prev-arrow"><i class="fal fa-long-arrow-left"></i></button>',
            dots: false,
            rtl: true,
        });
    }
    // ===== 14. Project Isotope
    function projectIsotope() {
        var items = $('.project-isotope').isotope({
            itemSelector: '.isotope-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.isotope-item',
            },
        });
        // items on button click
        $('.project-isotope-filter').on('click', 'li', function() {
            var filterValue = $(this).attr('data-filter');
            items.isotope({
                filter: filterValue
            });
        });
        // menu active class
        $('.project-isotope-filter li').on('click', function(event) {
            $(this).siblings('.active').removeClass('active');
            $(this).addClass('active');
            event.preventDefault();
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
    // =====  Sticky Header
    function stickyHeader() {
        var sticky = $('header.sticky-header, .header-sticky');
        var scrollFromtop = $(window).scrollTop();
        var scrollLimit = $('header').height() + 10;

        if (scrollFromtop < scrollLimit) {
            sticky.removeClass('sticky-on');
        } else {
            sticky.addClass('sticky-on');
        }
    }

    /*---------------------
    === DOCUMENT READY  ===
    ----------------------*/
    mainSlider();
    bootstrapAccordion()
    relatedProSlider()
    priceRange()
    gallerySlider()
    portfolioDetailsSlider()
    gtToTop()
    popupImg()
    projectIsotope()

    /*--------------------
    === WINDOW SCROLL  ===
    ----------------------*/
    $(window).on('scroll', function() {
        stickyHeader()
    });

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

$(window).on('load', function() {
    if ($('#preloader').length > 0) {
        $('#preloader').fadeOut(500);
    }
});

$(document).ready(function() {
    // lazy load init
    var lazyLoadInstance = new LazyLoad();
})
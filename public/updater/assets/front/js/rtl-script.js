!(function($) {
    "use strict";

    // Preloader
    $("#preLoader").delay(1000).queue(function() {
        $(this).remove();
    });

    // Sticky Header
    $(window).on("scroll", function() {
        var header = $(".header-area");
        // If window scroll down .is-sticky class will added to header
        if($(window).scrollTop() >= 100) {
            header.addClass("is-sticky");
        } else {
            header.removeClass("is-sticky");
        }
    });

    // Mobile Menu
    var mobileMenu = function() {
        // Variables
        var mainNavbar = $(".main-navbar"),
        cloneInto = $(".mobile-menu-wrapper"),
        cloneItem = $(".mobile-item"),
        cloneBlank = "",
        menuToggler = $(".menu-toggler")

        menuToggler.on("click", function() {
            $(this).toggleClass("active");
            $("body").toggleClass("mobile-menu-active")
        })
        
        // check browser width in real-time
        var winWidth = window.innerWidth;
        if (winWidth <= 1199) {
            mainNavbar.find(cloneItem).clone(!0).appendTo(cloneInto);
            mainNavbar.hide();
        } else {
            cloneInto.html(cloneBlank);
            mainNavbar.show();
        }

        cloneInto.find("#mainMenu .toggle").on("click", function (e) {
			$(this)
				.parent("li")
				.children("ul")
				.stop(true, true)
				.slideToggle(350);
			$(this).parent("li").toggleClass("show");
		});
    }
    mobileMenu();

    // Sponsor Slider
    new Swiper(".sponsor-slider", {
        speed: 400,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
              slidesPerView: 1,
              spaceBetween: 20
            },
            // when window width is >= 400px
            400: {
              slidesPerView: 2,
              spaceBetween: 10
            },
            // when window width is >= 640px
            768: {
              slidesPerView: 3,
              spaceBetween: 30
            },
            // when window width is >= 640px
            1200: {
              slidesPerView: 4,
              spaceBetween: 30
            }
        }
    });

    // User Slider
    new Swiper(".user-slider", {
        speed: 400,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            // when window width is >= 320px
            320: {
              slidesPerView: 1,
              spaceBetween: 20
            },
            // when window width is >= 576px
            576: {
              slidesPerView: 2,
              spaceBetween: 30
            },
            // when window width is >= 640px
            992: {
              slidesPerView: 3,
              spaceBetween: 30
            }
        }
    });

    // Testimonial Slider
    new Swiper(".testimonial-slider", {
        spaceBetween: 15,
        slidesPerView: 1,
        autoHeight: true,
        // Pagination bullets
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        // Navigation arrows
        navigation: {
            nextEl: '.slider-btn-next',
            prevEl: '.slider-btn-prev',
        },
    });

    // Youtube Popup
    $(".youtube-popup").magnificPopup({
        disableOn: 300,
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    })

    // Go to Top
    $(window).on("scroll", function() {
        // If window scroll down .active class will added to go-top
        var goTop = $(".go-top");
        if($(window).scrollTop() >= 200) {
            goTop.addClass("active");
        } else {
            goTop.removeClass("active")
        }
    })
    $(".go-top").on("click", function(e) {
        $("html, body").animate({
            scrollTop: 0,
        }, 0 );
    });

    // Lazy-load Image
    function lazyLoad() {
        window.lazySizesConfig = window.lazySizesConfig || {};
        window.lazySizesConfig.loadMode = 2;
        lazySizesConfig.preloadAfterLoad = true;
    }

    // AOS Init
    AOS.init({
        easing: "ease-out",
        duration: 600
    });

    // Nice Select
    $("select").niceSelect();

    // Magic Cursor
    var cursor = function() {
        // Variables Declaration
        var cursor = $('.cursor');
        if (window.innerWidth > 1199) {
            // Adding cursor effect
            $(window).on('mousemove', function(e) {
                cursor.css({
                    'transform': "translate(" + e.clientX + "px," + e.clientY + "px)"
                })
            })
            // Add hover class
            $('a, button, .cursor-pointer').on('mouseenter', function() {
                cursor.addClass('hover');
            })
            // Remove hover class
            $('a, button, .cursor-pointer').on('mouseleave', function() {
                cursor.removeClass('hover');
            })
        } else {
            cursor.remove();
        }
    }
    
    $(document).ready(function() {
        lazyLoad()
        cursor()
    })

})(jQuery);
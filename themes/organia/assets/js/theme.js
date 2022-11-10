/*
 Theme Name: Organia
 Theme URI: https://themeforest.net/user/themewar/portfolio
 Author: themewar
 Author URI: 
 Description: Organia - Organic Foods Store WordPress Theme.
 Version: 1.0
 License:
 License URI:
*/

/*=======================================================================
 [Table of contents]
 =========================================================================
 1. Init Obj
 2. All Carousel
 3. Skills
 4. Fun Fact Count
 5. Back To Top
 6. All PopUP
 7. Sticky Header
 8. Mobile Menu
 9. Preloader
 10. Count Down
 11. Select
 12. Product Sub Category
 13. Qty
 14. All Filter & Masnry
 15. Google Maps
 16. Quick View Function
 17. All Couuntdown
 18. 
*/

(function ($) {
    'use strict';
    /*--------------------------------------------------------
    / 1. Init Obj
    /---------------------------------------------------------*/
    var tab_slider = $('.tab-slider'),
        offer_slider = $('.offer-slider'),
        relatedPost = $(".relatedPostSlider"),
        discoutSlider = $(".discout-slider"),
        gallery_sliders = $(".gallery_sliders"),
        related_carousel = $(".related_carousel"),
        popup_video = $('.popup_video'),
        popup_img = $('.popup_img'),
        funfact = $('.funfact'),
        select = $('.search-category select, .sorting select, .sidebar .widget_archive select, .sidebar .widget_categories select, .sidebar .textwidget select, .sic_the_content .wp-block-categories select, .sic_the_content .wp-block-archives-dropdown select'),
        categoryDropdown = $('.filterBy select'),
        variationSelect = $('.qty_weight .variations select'),
        search = $('.ajax-search-product input[type="search"]'),
        cat_slug = $('.ajax-search-product select');


    /*--------------------------------------------------------
    / 2. All Carousel
    /---------------------------------------------------------*/
    /*--- Category Silder ---*/
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-product-categories.default', function ($scope, $) {
            var $wrap   = $scope.find('.productCatSliderWrap');
            var $slide  = $scope.find('.cateSlider');
            var $slide2 = $scope.find('.categorySlider');

            var autoplay = ($wrap.attr('data-autoplay') == 'yes') ? true : false;
            var loop = ($wrap.attr('data-loop') == 'yes') ? true : false;
            var nav = ($wrap.attr('data-nav') == 'yes') ? true : false;
            var dots = ($wrap.attr('data-dots') == 'yes') ? true : false;

            if ($slide.length > 0) {
                $slide.owlCarousel({
                    autoplay: autoplay,
                    loop: loop,
                    margin: 24,
                    nav: nav,
                    navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
                    dots: dots,
                    responsiveClass: true,
                    smartSpeed: 600,
                    items: 1,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        768: {
                            items: 2
                        },
                        990: {
                            items: 3
                        },
                        1200: {
                            items: 4
                        }
                    }
                });
                $wrap.on('translated.owl.carousel', function (event) {
                    checkAndSetClass('.cateSlider')
                });
                $wrap.on('initialized.owl.carousel', function (event) {
                    checkAndSetClass('.cateSlider')
                });
                $wrap.on('resized.owl.carousel', function (event) {
                    checkAndSetClass('.cateSlider')
                });
            }
            function checkAndSetClass(selector) {
                var total = $(selector + ' .owl-stage .owl-item.active').length;
                $(selector + ' .owl-stage .owl-item .cateItem').removeClass('odd even');

                var i = 1;
                $(selector + ' .owl-stage .owl-item.active').each(function (index) {
                    if (i % 2 == 0) {
                        $('.cateItem', this).addClass('even');
                    } else {
                        $('.cateItem', this).addClass('odd');
                    }
                    i++;
                });
            }

            if ($slide2.length > 0) {
                $slide2.owlCarousel({
                    autoplay: autoplay,
                    loop: loop,
                    margin: 10,
                    responsiveClass: true,
                    nav: nav,
                    navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
                    dots: dots,
                    smartSpeed: 600,
                    items: 5,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        750: {
                            items: 3
                        },
                        992: {
                            items: 4
                        },
                        1200: {
                            items: 5
                        },
                    }
                });
            }
        });
    });

    /*--- Tab Silder ---*/
    if (offer_slider.length > 0) {
        var offer_slider_obj = offer_slider.owlCarousel({
            autoplay: false,
            loop: true,
            margin: 19,
            responsiveClass: true,
            nav: true,
            navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
            dots: false,
            smartSpeed: 600,
            items: 3,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                992: {
                    items: 3
                },
            }
        });
    }
    /*--- Client Silder ---*/
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-clients-slider.default', function ($scope, $) {
            var $wrap = $scope.find('.clslider_wrap');
            var $slide1 = $scope.find('.client-slider');
            var $slide2 = $scope.find('.client-slider-02');
            var $slide3 = $scope.find('.client-slider-03');

            var autoplay = ($wrap.attr('data-autoplay') == 'yes') ? true : false;
            var loop = ($wrap.attr('data-loop') == 'yes') ? true : false;
            var nav = ($wrap.attr('data-nav') == 'yes') ? true : false;
            var dots = ($wrap.attr('data-dots') == 'yes') ? true : false;
            var item = ($wrap.attr('data-item')*1 > 0 ) ? $wrap.attr('data-item')*1 : 0;
            var item2 = ($wrap.attr('data-item2')*1 > 0 ) ? $wrap.attr('data-item2')*1 : 0;
            var item3 = ($wrap.attr('data-item3')*1 > 0 ) ? $wrap.attr('data-item3')*1 : 0;

            if ($slide1.length > 0) {
                $slide1.owlCarousel({
                    autoplay: autoplay,
                    loop: loop,
                    margin: 32,
                    nav: nav,
                    navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
                    dots: dots,
                    responsiveClass: true,
                    smartSpeed: 600,
                    responsive: {
                        0: {
                            items: 1
                        },
                        700: {
                            items: item3,
                            margin: 20
                        },
                        992: {
                            items: item2,
                            margin: 25
                        },
                        1200: {
                            items: item,
                            margin: 25
                        },
                        1600: {
                            margin: 32
                        },
                    }
                });
            }
            if ($slide2.length > 0) {
                $slide2.owlCarousel({
                    autoplay: autoplay,
                    loop: loop,
                    margin: 0,
                    nav: nav,
                    navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
                    dots: dots,
                    responsiveClass: true,
                    smartSpeed: 600,
                    responsive: {
                        0: {
                            items: 1
                        },
                        700: {
                            items: item3
                        },
                        992: {
                            items: item2
                        },
                        1200: {
                            items: item
                        },
                    }
                });
            }
            if ($slide3.length > 0) {
                $slide3.owlCarousel({
                    autoplay: autoplay,
                    loop: loop,
                    margin: 0,
                    nav: nav,
                    navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
                    dots: dots,
                    responsiveClass: true,
                    smartSpeed: 600,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        768: {
                            items: item3
                        },
                        992: {
                            items: item2
                        },
                        1200: {
                            items: item
                        },
                    }
                });
            }
        });
    });
    /*--- Blog Post Silder ---*/
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-latest-blog.default', function ($scope, $) {
            var $wrap = $scope.find('.lb_slider_wrap');
            var $slide = $scope.find('.lb_slider');

            var autoplay = ($wrap.attr('data-autoplay') == 1) ? true : false;
            var loop = ($wrap.attr('data-loop') == 1) ? true : false;
            var nav = ($wrap.attr('data-nav') == 1) ? true : false;
            var dots = ($wrap.attr('data-dots') == 1) ? true : false;

            $slide.owlCarousel({
                autoplay: autoplay,
                loop: loop,
                margin: 30,
                responsiveClass: true,
                nav: nav,
                navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
                dots: dots,
                responsive: {
                    0: {
                        items: 1
                    },
                    700: {
                        items: 2
                    },
                    1023: {
                        items: 3
                    }
                }
            });
        });
    });

    /*--- Service Post Silder ---*/
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-services.default', function ($scope, $) {
            var $wrap = $scope.find('.lb_slider_wrap');
            var $slide = $scope.find('.sp_slider');

            var autoplay = ($wrap.attr('data-autoplay') == 1) ? true : false;
            var loop = ($wrap.attr('data-loop') == 1) ? true : false;
            var nav = ($wrap.attr('data-nav') == 1) ? true : false;
            var dots = ($wrap.attr('data-dots') == 1) ? true : false;

            $slide.owlCarousel({
                autoplay: autoplay,
                loop: loop,
                margin: 30,
                responsiveClass: true,
                nav: nav,
                navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
                dots: dots,
                responsive: {
                    0: {
                        items: 1
                    },
                    700: {
                        items: 2
                    },
                    990: {
                        items: 3
                    },
                    1023: {
                        items: 4
                    }
                }
            });
        });
    });

    /*--- Team Silder ---*/
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-team.default', function ($scope, $) {
            var $wrap = $scope.find('.team_slider_wrap');
            var $slide = $scope.find('.team_slider');

            var autoplay = ($wrap.attr('data-autoplay') == 1) ? true : false;
            var loop = ($wrap.attr('data-loop') == 1) ? true : false;
            var nav = ($wrap.attr('data-nav') == 1) ? true : false;
            var dots = ($wrap.attr('data-dots') == 1) ? true : false;

            $slide.owlCarousel({
                autoplay: autoplay,
                loop: loop,
                margin: 30,
                responsiveClass: true,
                nav: nav,
                navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
                dots: dots,
                responsive: {
                    0: {
                        items: 1
                    },
                    700: {
                        items: 2
                    },
                    990: {
                        items: 3
                    },
                    1023: {
                        items: 4
                    }
                }
            });
        });
    });
    /*--- Product Silder ---*/
    if ($(".productSlider01").length > 0) {
        $('.productSlider01').owlCarousel({
            autoplay: true,
            loop: true,
            margin: 30,
            responsiveClass: true,
            nav: true,
            navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
            dots: false,
            smartSpeed: 600,
            items: 3,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                },
            }
        });
    }
    /*--- Client Silder ---*/
    if ($(".productSlider02").length > 0) {
        $('.productSlider02').owlCarousel({
            autoplay: false,
            loop: true,
            margin: 27,
            responsiveClass: true,
            nav: true,
            navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
            dots: false,
            smartSpeed: 600,
            items: 4,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                },
            }
        });
    }
    /*--- Client Silder ---*/
    if ($(".productSlider03").length > 0) {
        $('.productSlider03').owlCarousel({
            autoplay: false,
            loop: true,
            margin: 37,
            responsiveClass: true,
            nav: true,
            navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
            dots: false,
            smartSpeed: 600,
            items: 3,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
            }
        });
    }
    /*--- Tesimonial Silder 01 ---*/
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-testimonial.default', function ($scope, $) {
            var $wrap = $scope.find('.testi_wrap');
            var $tslider1 = $scope.find('.testicontent01');
            var $tslider2 = $scope.find('.testimonial02');

            var autoplay = ($wrap.attr('data-autoplay') == 1) ? true : false;
            var loop = ($wrap.attr('data-loop') == 1) ? true : false;
            var nav = ($wrap.attr('data-nav') == 1) ? true : false;
            var dots = ($wrap.attr('data-dots') == 1) ? true : false;

            if ($tslider1.length > 0) {
                $tslider1.slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    asNavFor: '.testimonialNav',
                    autoplay: autoplay
                });
                $('.testimonialNav').slick({
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    asNavFor: '.testicontent01',
                    dots: false,
                    arrows: false,
                    variableWidth: true,
                    autoplay: false,
                    infinite: true,
                    centerMode: true,
                    centerPadding: '0',
                    focusOnSelect: true,
                    responsive: [
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 3
                            }
                        },
                    ]
                });
            }
            $tslider2.owlCarousel({
                autoplay: autoplay,
                loop: loop,
                margin: 0,
                responsiveClass: true,
                nav: nav,
                navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
                dots: dots,
                smartSpeed: 450,
                items: 1,
            });
        });
    });

    /*--- Video Silder ---*/
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-video-btn.default', function ($scope, $) {
            var $wrap = $scope.find('.vd_slider_wrap');
            var $slide1 = $scope.find('.video-slider');
            var $slide2 = $scope.find('.video-slider02');

            var autoplay = ($wrap.attr('data-autoplay') == 1) ? true : false;
            var loop = ($wrap.attr('data-loop') == 1) ? true : false;
            var nav = ($wrap.attr('data-nav') == 1) ? true : false;
            var dots = ($wrap.attr('data-dots') == 1) ? true : false;

            $slide1.owlCarousel({
                autoplay: autoplay,
                loop: loop,
                margin: 0,
                responsiveClass: true,
                nav: nav,
                navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
                dots: dots,
                animateOut: 'slideOutDown',
                animateIn: 'zoomIn',
                smartSpeed: 450,
                items: 1
            });
            $slide2.owlCarousel({
                autoplay: autoplay,
                loop: loop,
                margin: 0,
                responsiveClass: true,
                nav: nav,
                navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
                dots: dots,
                animateOut: 'slideOutDown',
                animateIn: 'zoomIn',
                smartSpeed: 450,
                items: 1
            });
        });
    });
    /*--- Product Ads Silder ---*/
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-ads-carousel.default', function ($scope, $) {
            var $slider_wrap = $scope.find('.ads-slider-wrap');
            var $ads_slider = $scope.find('.ads-slider');

            var autoplay = ($slider_wrap.attr('data-autoplay') == '1') ? true : false;
            var loop = ($slider_wrap.attr('data-loop') == '1') ? true : false;
            var nav = ($slider_wrap.attr('data-nav') == '1') ? true : false;
            var dots = ($slider_wrap.attr('data-dots') == '1') ? true : false;

            if ($ads_slider.length > 0) {
                var $ads_slider_obj = $ads_slider.owlCarousel({
                    autoplay: autoplay,
                    margin: 0,
                    loop: loop,
                    nav: nav,
                    navText: ['<i class="twi-angle-left"></i>', '<i class="twi-angle-right"></i>'],
                    dots: dots,
                    items: 1,
                    smartSpeed: 450,
                    responsiveClass: true
                });
            }
        });
    });

    /*-- Related Post Slider --*/
    if (relatedPost.length > 0) {
        var relatedPost_obj = relatedPost.owlCarousel({
            margin: 22,
            loop: false,
            nav: false,
            dots: false,
            items: 2,
            smartSpeed: 450,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    }

    /*-- Product Gallery Slider --*/
    if ($('.productSlide').length > 0) {
        $('.productSlide').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: false,
            infinite: true,
            centerMode: true,
            asNavFor: '.indicator-slider',
            centerPadding: '0'
        });
        $('.indicator-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.productSlide',
            dots: false,
            arrows: false,
            centerMode: true,
            centerPadding: '0',
            focusOnSelect: true
        });
    }
    /*-- Product Gallery Slider --*/
    if ($('.productSlide02').length > 0) {
        $('.productSlide02').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: false,
            infinite: true,
            centerMode: true,
            asNavFor: '.indicator-slider02',
            centerPadding: '0'
        });
        $('.indicator-slider02').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.productSlide02',
            dots: false,
            arrows: false,
            centerMode: false,
            centerPadding: '0',
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 1300,
                    settings: {
                        slidesToShow: 4
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 5
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 4
                    }
                },
                {
                    breakpoint: 450,
                    settings: {
                        slidesToShow: 3
                    }
                }
            ]
        });
    }
    /*-- Related Product Slider --*/
    if (related_carousel.length > 0) {
        var related_carousel_obj = related_carousel.owlCarousel({
            margin: 26,
            loop: false,
            dots: false,
            nav: true,
            navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
            items: 4,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                991: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });
    }
    /*--- Related Product Slider ---*/
    if ($(".related_carousel02").length > 0) {
        $('.related_carousel02').owlCarousel({
            autoplay: true,
            loop: true,
            margin: 30,
            responsiveClass: true,
            nav: true,
            navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
            dots: false,
            smartSpeed: 600,
            items: 3,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 3
                },
            }
        });
    }
    /*--  Organia Product Slider ---*/
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-product-slider.default', function ($scope, $) {
            var $wrap = $scope.find('.org_product_carousel_wrap');
            var $slide = $scope.find('.org_product_carousel');

            var autoplay = ($wrap.attr('data-autoplay') == '1') ? true : false;
            var loop = ($wrap.attr('data-loop') == '1') ? true : false;
            var nav = ($wrap.attr('data-nav') == '1') ? true : false;
            var dots = ($wrap.attr('data-dots') == '1') ? true : false;
            var gapping = ($wrap.attr('data-gapping') != '') ? parseInt($wrap.attr('data-gapping'), 10) : 0;
            var item1 = ($wrap.attr('data-item1') != '') ? parseInt($wrap.attr('data-item1'), 10) : 4;
            var item2 = ($wrap.attr('data-item2') != '') ? parseInt($wrap.attr('data-item2'), 10) : 4;
            var item3 = ($wrap.attr('data-item3') != '') ? parseInt($wrap.attr('data-item3'), 10) : 3;
            var item4 = ($wrap.attr('data-item4') != '') ? parseInt($wrap.attr('data-item4'), 10) : 2;

            if ($slide.length > 0) {
                $slide.owlCarousel({
                    autoplay: autoplay,
                    loop: loop,
                    margin: gapping,
                    nav: nav,
                    navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
                    dots: dots,
                    responsiveClass: true,
                    smartSpeed: 600,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        576: {
                            items: item4
                        },
                        768: {
                            items: item3
                        },
                        992: {
                            items: item2
                        },
                        1200: {
                            items: item1
                        }
                    }
                });

                if ($wrap.hasClass('hasRoundedEnabled')) {
                    $slide.on('translated.owl.carousel', function (event) {
                        checkAndSetClassProduct('.org_product_carousel')
                    });
                    $slide.on('initialized.owl.carousel', function (event) {
                        checkAndSetClassProduct('.org_product_carousel')
                    });
                    $slide.on('resized.owl.carousel', function (event) {
                        checkAndSetClassProduct('.org_product_carousel')
                    });
                }
            }

            function checkAndSetClassProduct(selector) {
                var total = $(selector + ' .owl-stage .owl-item.active').length;
                $(selector + ' .owl-stage .owl-item .productItem01').removeClass('odd even');

                var i = 1;
                $(selector + ' .owl-stage .owl-item.active').each(function (index) {
                    if (i % 2 == 0) {
                        $('.productItem01', this).addClass('even');
                    } else {
                        $('.productItem01', this).addClass('odd');
                    }
                    i++;
                });
            }
        });
    });

    /*-- Organia Product Tab Slider ---*/
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-product-tab.default', function ($scope, $) {
            var $wrap = $scope.find('.org_product_carousel_wrap');
            var $slide = $scope.find('.org_product_carousel');
            var $slide2 = $scope.find('.progallerySLider');

            var autoplay = ($wrap.attr('data-autoplay') == '1') ? true : false;
            var loop = ($wrap.attr('data-loop') == '1') ? true : false;
            var nav = ($wrap.attr('data-nav') == '1') ? true : false;
            var dots = ($wrap.attr('data-dots') == '1') ? true : false;
            var gapping = ($wrap.attr('data-gapping') != '') ? parseInt($wrap.attr('data-gapping'), 10) : 0;
            var item1 = ($wrap.attr('data-item1') != '') ? parseInt($wrap.attr('data-item1'), 10) : 4;
            var item2 = ($wrap.attr('data-item2') != '') ? parseInt($wrap.attr('data-item2'), 10) : 4;
            var item3 = ($wrap.attr('data-item3') != '') ? parseInt($wrap.attr('data-item3'), 10) : 3;
            var item4 = ($wrap.attr('data-item4') != '') ? parseInt($wrap.attr('data-item4'), 10) : 2;

            if ($slide.length > 0) {
                $slide.owlCarousel({
                    autoplay: autoplay,
                    loop: loop,
                    margin: gapping,
                    nav: nav,
                    navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
                    dots: dots,
                    responsiveClass: true,
                    smartSpeed: 600,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        576: {
                            items: item4
                        },
                        768: {
                            items: item3
                        },
                        992: {
                            items: item2
                        },
                        1200: {
                            items: item1
                        }
                    }
                });
                if ($wrap.hasClass('hasRoundedEnabled')) {
                    $slide.on('translated.owl.carousel', function (event) {
                        checkAndSetClassProductTab('.org_product_carousel')
                    });
                    $slide.on('initialized.owl.carousel', function (event) {
                        checkAndSetClassProductTab('.org_product_carousel')
                    });
                    $slide.on('resized.owl.carousel', function (event) {
                        checkAndSetClassProductTab('.org_product_carousel')
                    });
                }
            }

            function checkAndSetClassProductTab(selector) {
                var total = $(selector + ' .owl-stage .owl-item.active').length;
                $(selector + ' .owl-stage .owl-item .productItem01').removeClass('odd even');

                var i = 1;
                $(selector + ' .owl-stage .owl-item.active').each(function (index) {
                    if (i % 2 == 0) {
                        $('.productItem01', this).addClass('even');
                    } else {
                        $('.productItem01', this).addClass('odd');
                    }
                    i++;
                });
            }
            
        });
    });

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-product-tab-slider.default', function ($scope, $) {
            var $wrap = $scope.find('.org_product_carousel_wrap');

            var autoplay = ($wrap.attr('data-autoplay') == '1') ? true : false;
            var loop = ($wrap.attr('data-loop') == '1') ? true : false;
            
            var $activeID = $scope.find('.org_pro_tab li a.active').attr('href');
            var $sliderMain = $($activeID+'-slider');
            var $sliderNav = $($activeID+'-thumb');
            if ($sliderMain.length > 0) {
                $sliderMain.slick({
                    autoplay: autoplay,
                    autoplaySpeed: 3000,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    arrows: false,
                    infinite: loop,
                    centerMode: true,
                    asNavFor: $sliderNav,
                    centerPadding: '0'
                });
                $sliderNav.slick({
                    vertical: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: $sliderMain,
                    verticalSwiping: true,
                    dots: false,
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0',
                    focusOnSelect: true,
                    responsive: [
                    {
                      breakpoint: 767,
                      settings: {
                        vertical: false,
                        slidesToShow: 3
                      }
                    },
                    {
                      breakpoint: 450,
                      settings: {
                        vertical: false,
                        slidesToShow: 3
                      }
                    }
                    ]
                });
            }
            
            $('.org_pro_tab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                var tergets = e.target.hash;
                var prevTarges = e.relatedTarget.hash;
                
                var $sliderMain = $(tergets).find(tergets+'-slider');
                var $sliderNav = $(tergets).find(tergets+'-thumb');
                
                var $sliderMainPrev = $(prevTarges).find(prevTarges+'-slider');
                var $sliderNavPrev = $(prevTarges).find(prevTarges+'-thumb');
                if($sliderMainPrev.length > 0){
                    $sliderMainPrev.slick('destroy');
                    $sliderNavPrev.slick('destroy');
                }
                
                if($sliderMain.length > 0){
                    $sliderMain.slick({
                        autoplay: autoplay,
                        autoplaySpeed: 3000,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                        arrows: false,
                        infinite: loop,
                        asNavFor: $sliderNav
                    });
                    $sliderNav.slick({
                        vertical: true,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        asNavFor: $sliderMain,
                        verticalSwiping: true,
                        dots: false,
                        arrows: false,
//                        centerMode: true,
//                        centerPadding: '0',
                        focusOnSelect: true,
                        responsive: [
                        {
                          breakpoint: 767,
                          settings: {
                            vertical: false,
                            slidesToShow: 3
                          }
                        },
                        {
                          breakpoint: 450,
                          settings: {
                            vertical: false,
                            slidesToShow: 3
                          }
                        }
                        ]
                    });
                }
            });
            
        });
    });

    /*---- Organia Product Filter Grid & Slider ----*/
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-product-filter.default', function ($scope, $) {
            var $grid_wrap = $scope.find('.filter_grid_wrap');
            var $slider_wrap = $scope.find('.filter_sliders_wrap');
            var $filter_slider_wrap = $scope.find('.tab_slider_wrap');
            var $filter_slider = $scope.find('.tab-slider');

            if ($grid_wrap.length > 0) {
                var $grid = $('.shaff_grid');

                var Shuffle = window.Shuffle;
                var element = document.querySelector('.shaff_grid');
                var sizer = element.querySelector('.shafSizer');

                var shaff_inst = new Shuffle(element, {
                    itemSelector: '.shaff_item',
                    sizer: sizer // could also be a selector: '.my-sizer-element'
                });
                $('.shaff_filter li').on('click', function () {
                    $('.shaff_filter li').removeClass('active');
                    $(this).addClass('active');
                    var groupName = $(this).attr('data-group');
                    shaff_inst.filter(groupName);

                    if ($grid.hasClass('hasRoundedCorner')) {
                        shaff_inst.on(Shuffle.EventType.LAYOUT, function () {
                            $('.hasRoundedCorner .shaff_item').removeClass('odd even');
                            var i = 1;
                            $('.hasRoundedCorner .shaff_item.shuffle-item--visible').each(function () {
                                if (i % 2 == 0) {
                                    $(this).addClass('even');
                                } else {
                                    $(this).addClass('odd')
                                }
                                i++;
                            })
                        });
                    }
                });
            }

            if ($slider_wrap.length > 0) {
                var autoplay = ($filter_slider_wrap.attr('data-autoplay') == '1') ? true : false;
                var loop = ($filter_slider_wrap.attr('data-loop') == '1') ? true : false;
                var nav = ($filter_slider_wrap.attr('data-nav') == '1') ? true : false;
                var dots = ($filter_slider_wrap.attr('data-dots') == '1') ? true : false;
                var gapping = ($filter_slider_wrap.attr('data-gapping') != '') ? parseInt($filter_slider_wrap.attr('data-gapping'), 10) : 0;
                var item1 = ($filter_slider_wrap.attr('data-item1') != '') ? parseInt($filter_slider_wrap.attr('data-item1'), 10) : 4;
                var item2 = ($filter_slider_wrap.attr('data-item2') != '') ? parseInt($filter_slider_wrap.attr('data-item2'), 10) : 4;
                var item3 = ($filter_slider_wrap.attr('data-item3') != '') ? parseInt($filter_slider_wrap.attr('data-item3'), 10) : 3;
                var item4 = ($filter_slider_wrap.attr('data-item4') != '') ? parseInt($filter_slider_wrap.attr('data-item4'), 10) : 2;

                var $filter_slider_obj = $filter_slider.owlCarousel({
                    autoplay: autoplay,
                    loop: loop,
                    margin: gapping,
                    nav: nav,
                    navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
                    dots: dots,
                    responsiveClass: true,
                    smartSpeed: 600,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        576: {
                            items: item4
                        },
                        768: {
                            items: item3
                        },
                        992: {
                            items: item2
                        },
                        1200: {
                            items: item1
                        }
                    }
                });
                $('.slider_filter .filter_item', $slider_wrap).on('click', function (e) {
                    e.preventDefault();
                    var slider_height = $filter_slider.height();
                    $filter_slider.parent().css('min-height', slider_height + 'px');
                    var $item = $(this);
                    var filter = $item.data('owl-filter');
                    $('.slider_filter .filter_item', $slider_wrap).removeClass('active');
                    $item.addClass('active');
                    $filter_slider_obj.owlcarousel2_filter(filter);
                });

                if ($filter_slider_wrap.hasClass('hasRoundedEnabled')) {
                    $filter_slider_obj.on('translated.owl.carousel', function (event) {
                        checkAndSetClassProductFilter('.tab-slider')
                    });
                    $filter_slider_obj.on('initialized.owl.carousel', function (event) {
                        checkAndSetClassProductFilter('.tab-slider')
                    });
                    $filter_slider_obj.on('resized.owl.carousel', function (event) {
                        checkAndSetClassProductFilter('.tab-slider')
                    });
                }

                function checkAndSetClassProductFilter(selector) {
                    var total = $(selector + ' .owl-stage .owl-item.active').length;
                    $(selector + ' .owl-stage .owl-item .productItem01').removeClass('odd even');

                    var i = 1;
                    $(selector + ' .owl-stage .owl-item.active').each(function (index) {
                        if (i % 2 == 0) {
                            $('.productItem01', this).addClass('even');
                        } else {
                            $('.productItem01', this).addClass('odd');
                        }
                        i++;
                    });
                }
            }
        });
    });

    /*--------------------------------------------------------
    / 3. Skills
    /----------------------------------------------------------*/
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-skills.default', function ($scope, $) {
            var $wrap = $scope.find('.single_skill');
            $wrap.appear();
            $wrap.on('appear', loadSkills);
        });
    });
    var coun = true;

    function loadSkills() {
        $(".single_skill").each(function () {
            var $this = $(this);
            if (!$this.hasClass('completed')) {
                var $this = $(this);
                var datacount = $(this).attr("data-parcent");
                $(".ss_child", this).animate({'width': datacount + '%'}, 2000);
                $(".ss_parent span", this).animate({'left': datacount + '%'}, 2000);
                if (coun) {
                    $(this).find('.ss_parent span').each(function () {
                        var $this = $(this);
                        $({Counter: 0}).animate({Counter: datacount}, {
                            duration: 2000,
                            easing: 'swing',
                            step: function () {
                                $this.text(Math.ceil(this.Counter) + '%');
                            }
                        });
                    });
                }
                $this.addClass('completed');
            }
        });
        coun = false;
    }

    /*--------------------------------------------------------
    / 4. Fun Fact Count
    /---------------------------------------------------------*/
    $('.funfact').appear();
    $(document.body).on('appear', '.funfact', function (e, $affected) {
        $affected.each(function () {
            var $this = $(this);
            if (!$this.hasClass('appeared')) {
                jQuery({Counter: 0}).animate({Counter: $this.attr('data-count')}, {
                    duration: 3000,
                    easing: 'swing',
                    step: function () {
                        var num = Math.ceil(this.Counter).toString();
                        if (Number(num) > 999) {
                            while (/(\d+)(\d{3})/.test(num)) {
                                num = num.replace(/(\d+)(\d{3})/, '<span class="count-span">' + '$1' + ',</span>' + '$2');
                            }
                        }
                        $('.counter', $this).html(num);
                    }
                });
                $this.addClass('appeared');
            }
        });
    });

    /*--------------------------------------------------------
    / 5. Back To Top
    /---------------------------------------------------------*/
    var back = $("#backtotop"),
        body = $("body, html");
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > $(window).height()) {
            back.css({bottom: '30px', opacity: '1', visibility: 'visible'});
        } else {
            back.css({bottom: '-30px', opacity: '0', visibility: 'hidden'});
        }
    });
    body.on("click", "#backtotop", function (e) {
        e.preventDefault();
        body.animate({scrollTop: 0}, 800);
        return false;
    });

    /*--------------------------------------------------------
    / 6. All PopUP
    /--------------------------------------------------------*/
    popup_video.lightcase({
        transition: 'elastic',
        showSequenceInfo: false,
        slideshow: false,
        swipe: true,
        showTitle: false,
        showCaption: false,
        controls: true
    });
    popup_img.lightcase({
        transition: 'elastic',
        showSequenceInfo: false,
        slideshow: true,
        swipe: true,
        showTitle: false,
        controls: true
    });
    $(window).on('load', function () {
        if ($('.common_popup').length > 0) {
            setTimeout(function () {
                $('.common_popup').addClass('active');
                $('body').css('overflow', 'hidden');
            }, 900);
        }
    });
    $('.common_popup .colse_popup').on('click', function (e) {
        e.preventDefault();
        $('.common_popup').removeClass('active');
        $('body').css('overflow', 'auto');
    });

    /*--------------------------------------------------------
    / 7. Sticky Header
    /---------------------------------------------------------*/
    if ($(".isSticky").length > 0) {
        var header_height = $(".isSticky").height();
        $(window).on('scroll', function () {
            if ($(window).scrollTop() > 300) {
                $(".isSticky").addClass('fixedHeader animated slideInDown');
                $('.categorie-list').slideUp();
            } else {
                $(".isSticky").removeClass('fixedHeader animated slideInDown');
                if ($('.isSticky').hasClass('header03') && !$('body').hasClass('innerPage')) {
                    $('.categorie-list').slideDown();
                }
            }
        });
    }

    /*--------------------------------------------------------
    / 8. Mobile Menu
    /---------------------------------------------------------*/
    $(document).on('click', '.menuToggler', function (e) {
        e.preventDefault();
        $('.sidebarMenu').toggleClass('active');
        $(this).toggleClass('active');
    });
    $('.sidebarMenuOverlay, .SMACloser').on('click', function () {
        $('.sidebarMenu').removeClass('active');
        $('.menuToggler').removeClass('active');
    });
    $('.SMABody ul li.menu-item-has-children > a').on('click', function (e) {
        e.preventDefault();
        $(this).parent('li.menu-item-has-children').toggleClass('active');
        $(this).siblings('ul.sub-menu').slideToggle();
    });

    /*--------------------------------------------------------
    / 9. Preloader
    /---------------------------------------------------------*/
    $(window).on('load', function () {
        var preload = $('.preloader');
        if (preload.length > 0) {
            preload.delay(800).fadeOut('slow');
        }
    });

    /*--------------------------------------------------------
    / 10. Count Down
    /----------------------------------------------------------*/
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-timer-counter.default', function ($scope, $) {
            var count1 = $scope.find('.countdown_dashboard');
            var count2 = $scope.find('.countdown_dashboard_three');
            var count3 = $scope.find('.countdown_dashboard_two');

            if (count1.length > 0) {
                count1.each(function () {
                    var d = count1.attr('data-day');
                    var m = count1.attr('data-month');
                    var y = count1.attr('data-year');
                    count1.countdown({
                        until: new Date(y, m - 1, d),
                        format: 'DHMS'
                    });
                });
            }
            if (count2.length > 0) {
                count2.each(function () {
                    var d = count2.attr('data-day');
                    var m = count2.attr('data-month');
                    var y = count2.attr('data-year');
                    count2.countdown({
                        until: new Date(y, m - 1, d),
                        format: 'HMS'
                    });
                });
            }
            if (count3.length > 0) {
                count3.each(function () {
                    var d = count3.attr('data-day');
                    var m = count3.attr('data-month');
                    var y = count3.attr('data-year');
                    count3.countdown({
                        until: new Date(y, m - 1, d),
                        format: 'DHMS'
                    });
                });
            }
        });
    });

    /*--------------------------------------------------------
    / 11. Select
    /---------------------------------------------------------*/
    if (categoryDropdown.length > 0) {
        categoryDropdown.niceSelect();
        categoryDropdown.parent().addClass('select-area');

        categoryDropdown.on('change', function () {
            var $this = $(this);
            var url = $this.find(':selected').attr('data-termurl');
            if (url != '#') {
                window.location.href = url;
            }
        });
    }

    if (select.length > 0) {
        select.niceSelect();
        select.parent().addClass('select-area');
    }

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-header.default', function ($scope, $) {
            var selects = $scope.find('.search-category select');
            if (selects.length > 0) {
                selects.niceSelect();
                selects.parent().addClass('select-area');
            };
        });
    });
    if (variationSelect.length > 0) {
        variationSelect.niceSelect();
    }
    ;

    $('body').on('click', '.reset_variations', function () {
        variationSelect.niceSelect('update');
    });

    /*--------------------------------------------------------
    / 12. Product Sub Category
    /----------------------------------------------------------*/
    if ($(".sidebar .widget_product_categories").length > 0) {
        $('.product-categories li.cat-parent > a').on('click', function (e) {
            e.preventDefault();
            $(this).nextAll('.children').slideToggle();
            $(this).parent().toggleClass('active');
        });
    }
    $('.categoryToggle').on('click', function (e) {
        e.preventDefault();
        $(this).siblings('.categorie-list').slideToggle();
    });
    $('.searchBtn').on('click', function (e) {
        e.preventDefault();
        $('.header01SearchBar').slideToggle();
        $('.searchBtn').toggleClass('active');
    });

    /*--------------------------------------------------------
    / 13. Qty
    /----------------------------------------------------------*/
    $("body").on('click', '.btnMinus, .btnPlus', function (e) {
        e.preventDefault();
        let cart_qty = $(this).closest('.pdq_main').find('.carqty'),
            vals = parseInt(cart_qty.val(), 10),
            step = parseInt(cart_qty.attr('step'), 10);
        if (!vals || vals === '' || vals === undefined || isNaN(vals)) vals = 0;
        if (!step || step === '' || step === undefined || isNaN(step)) step = 1;
        if ($(this).is('.btnMinus')) {
            if (vals > 1) {
                vals -= step;
                cart_qty.val(vals).trigger('change');
            } else {
                cart_qty.val(vals).trigger('change');
            }
        } else {
            vals += step;
            cart_qty.val(vals).trigger('change');
        }
    });

    /*--------------------------------------------------------
    / 14. All Filter & Masnry
    /---------------------------------------------------------*/
    if ($(".shaff_grid").length > 0) {
        var $grid = $('.shaff_grid');

        var Shuffle = window.Shuffle;
        var element = document.querySelector('.shaff_grid');
        var sizer = element.querySelector('.shafSizer');

        var shaff_inst = new Shuffle(element, {
            itemSelector: '.shaff_item',
            sizer: sizer // could also be a selector: '.my-sizer-element'
        });
        $('.shaff_filter li').on('click', function () {
            $('.shaff_filter li').removeClass('active');
            $(this).addClass('active');
            var groupName = $(this).attr('data-group');
            shaff_inst.filter(groupName);

            if ($grid.hasClass('hasRoundedCorner')) {
                shaff_inst.on(Shuffle.EventType.LAYOUT, function () {
                    $('.hasRoundedCorner .shaff_item').removeClass('odd even');
                    var i = 1;
                    $('.hasRoundedCorner .shaff_item.shuffle-item--visible').each(function () {
                        if (i % 2 == 0) {
                            $(this).addClass('even');
                        } else {
                            $(this).addClass('odd')
                        }
                        i++;
                    })
                });
            }
        });
    }
    $(window).on('load', function () {
        if ($(".grid").length > 0) {
            $('.grid').masonry({
                itemSelector: '.grid-item'
            });
        }
    });

    /*--------------------------------------------------------
    / 15. Google Maps
    /----------------------------------------------------------*/
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-google-map.default', function ($scope, $) {
            var $gmap = $scope.find('.google_map');
            if (!$gmap.length) {
                return;
            }
            $gmap.each(function () {
                var $this = $(this);
                var gmapid = $this.attr('id');
                var $g_map_this = $('#' + gmapid);

                var marker = $g_map_this.attr('data-marker');
                var zoom = parseInt($g_map_this.attr('data-zoom'), 10);
                var style = parseInt($g_map_this.attr('data-map-style'), 10);

                var coordinates = $g_map_this.attr('data-coordinates');
                var coordinates = $.parseJSON(coordinates);
                var primary_lat = '';
                var primary_lon = '';
                var i = 1;
                for (let value of Object.values(coordinates)) {
                    if (i == 1) {
                        primary_lat = value.lati;
                        primary_lon = value.long;
                    }
                    i++;
                }

                var map;
                map = new GMaps({
                    el: '#' + gmapid,
                    lat: primary_lat,
                    lng: primary_lon,
                    scrollwheel: false,
                    zoom: zoom,
                    zoomControl: true,
                    panControl: false,
                    streetViewControl: true,
                    mapTypeControl: true,
                    overviewMapControl: false,
                    clickable: false
                });
                var image = "";
                var i = 1;
                for (let value of Object.values(coordinates)) {
                    if (i == 1) {
                        map.addMarker({
                            lat: value.lati,
                            lng: value.long,
                            icon: marker,
                            animation: google.maps.Animation.DROP,
                            verticalAlign: "bottom",
                            horizontalAlign: "center",
                            backgroundColor: "#d3cfcf"
                        });
                    } else {
                        map.addMarker({
                            lat: value.lati,
                            lng: value.long,
                            icon: marker,
                            animation: google.maps.Animation.DROP,
                            backgroundColor: "#d3cfcf"
                        });
                    }
                    i++;
                }
                if (style != 1) {
                    var styles = [
                        {
                            "featureType": "road",
                            "stylers": [
                                {"color": "#9dbb91"}
                            ]
                        }, {
                            "featureType": "water",
                            "stylers": [
                                {"color": "#aacbd9"}
                            ]
                        }, {
                            "featureType": "landscape",
                            "stylers": [
                                {"color": "#ebf1e9"}
                            ]
                        }, {
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {"color": "#2c2c2c"}
                            ]
                        }, {
                            "featureType": "poi",
                            "stylers": [
                                {"color": "#ceddc8"}
                            ]
                        }, {
                            "elementType": "labels.text",
                            "stylers": [
                                {"saturation": 1},
                                {"weight": 0.1},
                                {"color": "#2c2c2c"}
                            ]
                        }

                    ];
                    map.addStyle({
                        styledMapName: "Styled Map",
                        styles: styles,
                        mapTypeId: "map_style"
                    });
                    map.setStyle("map_style");
                }
            });
        });
    });


    /*--------------------------------------------------------
    / 17. All Couuntdown
    /---------------------------------------------------------*/
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-product-offer.default', function ($scope, $) {
            var $countdown_dashboard = $scope.find('.countdown_dashboard05');

            if ($countdown_dashboard.length > 0) {
                var format = $countdown_dashboard.attr('data-format');
                var d = $countdown_dashboard.attr('data-day');
                var m = $countdown_dashboard.attr('data-month');
                var y = $countdown_dashboard.attr('data-year');
                $countdown_dashboard.countdown({
                    until: new Date(y, m - 1, d),
                    format: format
                });
            }
        });
    });
    
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-deal-products.default', function ($scope, $) {
            var $dealSlider = $scope.find('.dealSlider');
            var $countdown_dashboard = $scope.find('.countdown_dashboard');
            var $countdown_dashboard_two = $scope.find('.countdown_dashboard_two');
            var $countdown_dashboard_three = $scope.find('.countdown_dashboard_three');

            if ($dealSlider.length > 0) {
                $dealSlider.owlCarousel({
                    autoplay: true,
                    loop: false,
                    margin: 0,
                    responsiveClass: true,
                    nav: true,
                    navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
                    dots: false,
                    items: 1
                });
            }

            if ($countdown_dashboard.length > 0) {
                var format = $countdown_dashboard.attr('data-format');
                var d = $countdown_dashboard.attr('data-day');
                var m = $countdown_dashboard.attr('data-month');
                var y = $countdown_dashboard.attr('data-year');
                $countdown_dashboard.countdown({
                    until: new Date(y, m - 1, d),
                    format: format
                });
            }

            if ($countdown_dashboard_two.length > 0) {
                var format = $countdown_dashboard_two.attr('data-format');
                var d = $countdown_dashboard_two.attr('data-day');
                var m = $countdown_dashboard_two.attr('data-month');
                var y = $countdown_dashboard_two.attr('data-year');
                $countdown_dashboard_two.countdown({
                    until: new Date(y, m - 1, d),
                    format: format
                });
            }

            if ($countdown_dashboard_three.length > 0) {
                var format = $countdown_dashboard_three.attr('data-format');
                var d = $countdown_dashboard_three.attr('data-day');
                var m = $countdown_dashboard_three.attr('data-month');
                var y = $countdown_dashboard_three.attr('data-year');
                $countdown_dashboard_three.countdown({
                    until: new Date(y, m - 1, d),
                    format: format
                });
            }
        });
    });

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-text-carousel.default', function ($scope, $) {
            var $slider_wrap = $scope.find('.discout-slider-wrap');
            var $discout_slider = $scope.find('.discout-slider');

            var autoplay = ($slider_wrap.attr('data-autoplay') == '1') ? true : false;
            var loop = ($slider_wrap.attr('data-loop') == '1') ? true : false;
            var nav = ($slider_wrap.attr('data-nav') == '1') ? true : false;
            var dots = ($slider_wrap.attr('data-dots') == '1') ? true : false;

            if ($discout_slider.length > 0) {
                var $discout_slider_obj = $discout_slider.owlCarousel({
                    autoplay: autoplay,
                    margin: 0,
                    loop: loop,
                    nav: nav,
                    navText: ['<i class="twi-arrow-left"></i>', '<i class="twi-arrow-right"></i>'],
                    dots: dots,
                    items: 1,
                    smartSpeed: 700,
                    responsiveClass: true
                });
            }
        });
    });

    if ($('.organia_home_page').length < 1) {
        $('body').addClass('innerPage');
    }

    /* On Close Quick View Modal */
    $("#productQuickViewModal").on("hidden.bs.modal", function () {
        jQuery('.quickViewContent').fadeOut('fast', function () {
            jQuery(this).html('');
            jQuery('.QVCLoader').fadeIn();
        });
    });

    $('#productQuickViewModal').on('click', '.reset_variations', function () {
        $('.quickViewContent select').niceSelect('update');
        $('.quickViewContent select').parent().addClass('select-area');
    });

    //Ajax product Search
    if (search.length > 0) {
        search.on('keyup', function (e) {
            $('.organia-serach_wrapper').html();
            if ($(this).val().length > 2) {
                $('.organia-loading').show();
                organia_product_serach($(this).val());
            } else {
                $('.organia-serach_wrapper').html('');
            }
        });
    }

    if (cat_slug.length > 0) {
        cat_slug.on('change', function (e) {
            if (search.val().length > 2) {
                $('.organia-loading').show();
                organia_product_serach(search.val(), $(this).val());
            } else {
                $('.organia-serach_wrapper').html('');
            }
        });
    }

    function organia_product_serach(s_keyword, cat_slug = '') {

        $.ajax({
            url: organia_object.ajaxurl,
            data: 'action=organia_search_product&s_keyword=' + s_keyword + '&cat_slug=' + cat_slug,
            method: 'GET',
            success: function (response) {
                let items = $.parseJSON(JSON.stringify(response));
                $('.organia-loading').hide();
                let html = '<ul class="clearfix">';
                if (response.success) {
                    items = items.data;
                    if (items.length > 0) {
                        $.each(items, function (i, e) {
                            html += '<li>';
                            html += '<a href="' + this['permalink'] + '">';
                            html += '<span class="thumb"><img src="' + this['img'] + '"></span>';
                            html += '<h3>' + this['name'] + '</h3>';
                            html += '<span class="pi01Price">' + this['price'] + '</span></a>';
                            html += '</li>';
                        });
                    }
                } else {
                    $('.organia-loading').hide();
                    html += '<p>' + response.data + '</p>';
                }
                html += '</ul>';
                $('.organia-serach_wrapper').html(html);
            }
        });
    }
    //Product Qty
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tw-product-grid.default', function ($scope, $) {
            var $loopQty = $scope.find('.loopQty');
            $loopQty.on('click', '.LoopBtnMinus, .LoopBtnPlus', function (e) {
                e.preventDefault();
                let cart_qty = $(this).closest('.loopQty').find('.loopQtyField'),
                    vals = parseInt(cart_qty.val(), 10),
                    step = parseInt(cart_qty.attr('step'), 10);
                if (!vals || vals === '' || vals === undefined || isNaN(vals)) vals = 0;
                if (!step || step === '' || step === undefined || isNaN(step)) step = 1;
                if ($(this).is('.LoopBtnMinus')) {
                    if (vals > 1) {
                        vals -= step;
                        cart_qty.val(vals);
                        $(this).closest('.qty_weight').siblings('.add_to_cart_button').attr('data-quantity', vals);
                    } else {
                        cart_qty.val(vals);
                        $(this).closest('.qty_weight').siblings('.add_to_cart_button').attr('data-quantity', vals);
                    }
                } else {
                    vals += step;
                    cart_qty.val(vals);
                    $(this).closest('.qty_weight').siblings('.add_to_cart_button').attr('data-quantity', vals);
                }
            });
        });
    });

})(jQuery);


/*--------------------------------------------------------
/ 17. Quick View Function
/---------------------------------------------------------*/
function quickViewProduct(productID) {
    jQuery('#productQuickViewModal').modal('show');
    jQuery.ajax({
        type: 'POST',
        url: organia_object.ajaxurl,
        data: {'action': 'organia_product_quick_view', 'productID': productID, 'organia_security': organia_object.ajax_nonce},
        success: function (response) {
            var obj = jQuery.parseJSON(response);
            jQuery('.QVCLoader').fadeOut('fast', function () {
                jQuery('.quickViewContent').fadeIn().html(obj.html);
                jQuery('.quickViewContent select').niceSelect();
                jQuery('.quickViewContent select').parent().addClass('select-area');
                jQuery('.quickViewContent .variations_form').each(function () {
                    jQuery(this).wc_variation_form().find('.quickViewContent .variations').change();
                });
                jQuery('.quickViewContent .variations_form').trigger('wc_variation_form');
                jQuery(document).trigger('ajaxComplete');
            });
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log("Error: " + errorThrown);
        }
    })
}

//Wishlist count for header
jQuery(document).ready(function ($) {
    var organia_update_wishlist_count = function () {
        $.ajax({
            data: {
                action: 'organia_update_wishlist_count'
            },
            success: function (data) {
                $('.wishlistBtn span').text(data)
            },

            url: organia_object.ajaxurl
        });
    };

    $('body').on('added_to_wishlist removed_from_wishlist', organia_update_wishlist_count);
});

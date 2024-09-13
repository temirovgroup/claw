(function ($) {
    "use strict";


    /*--
		Header Sticky
    -----------------------------------*/
    $(window).on('scroll', function(event) {
        var scroll = $(window).scrollTop();
        if (scroll <= 1) {
            $(".header-sticky").removeClass("sticky");
        } else{
            $(".header-sticky").addClass("sticky");
        }
	});

    /*--
        Product Details Zoom Activation
    -----------------------------------*/
    if ($(window).width() > 1000) {
        $('.zoom').zoom();
    }


    /*--
		Menu Active
    -----------------------------------*/
    $(function () {
    var url = window.location.pathname;
    var activePage = url.substring(url.lastIndexOf('/') + 1);
        $('.nav-menu li a').each(function () {
            var linkPage = this.href.substring(this.href.lastIndexOf('/') + 1);

            if (activePage == linkPage) {
                $(this).closest("li").addClass("active");
            }
        });
    })



    /*--
        Bootstrap dropdown
    -----------------------------------*/
    // Add slideDown animation to Bootstrap dropdown when expanding.
    $('.dropdown').on('show.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });

    // Add slideUp animation to Bootstrap dropdown when collapsing.
    $('.dropdown').on('hide.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });


    /*--
        Off Canvas Menu
    -----------------------------------*/

  	$('.mobile-menu-open').on('click', function(){
        $('.off-canvas-box').addClass('open')
        $('.menu-overlay').addClass('open')
    });

    $('.menu-close').on('click', function(){
        $('.off-canvas-box').removeClass('open')
        $('.menu-overlay').removeClass('open')
    });

    $('.menu-overlay').on('click', function(){
        $('.off-canvas-box').removeClass('open')
        $('.menu-overlay').removeClass('open')
    });

    /*Variables*/
    var $offCanvasNav = $('.canvas-menu'),
    $offCanvasNavSubMenu = $offCanvasNav.find('.sub-menu, .mega-sub-menu, .menu-item ');

    /*Add Toggle Button With Off Canvas Sub Menu*/
    $offCanvasNavSubMenu.parent().prepend('<span class="mobile-menu-expand"></span>');

    /*Close Off Canvas Sub Menu*/
    $offCanvasNavSubMenu.slideUp();

    /*Category Sub Menu Toggle*/
    $offCanvasNav.on('click', 'li a, li .mobile-menu-expand, li .menu-title', function(e) {
        var $this = $(this);
        if (($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('mobile-menu-expand'))) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length) {
                $this.parent('li').removeClass('active-expand');
                $this.siblings('ul').slideUp();
            } else {
                $this.parent('li').addClass('active-expand');
                $this.closest('li').siblings('li').find('ul:visible').slideUp();
                $this.closest('li').siblings('li').removeClass('active-expand');
                $this.siblings('ul').slideDown();
            }
        }
    });

    $( ".sub-menu, .mega-sub-menu, .menu-item" ).parent( "li" ).addClass( "menu-item-has-children" );
    $( ".mega-sub-menu" ).parent( "li" ).css( "position", "static" );


    /*--
        Slider
    -----------------------------------*/
    var slider = new Swiper('.slider-active .swiper-container', {
        speed: 600,
        effect: "fade",
        loop: true,
        pagination: {
            el: '.slider-active .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.slider-active .swiper-button-next',
            prevEl: '.slider-active .swiper-button-prev',
        },
        // autoplay: {
        //     delay: 8000,
        // },
    });




    /*--
        Countdown
    -----------------------------------*/

    $('.countdown').each(function () {
        var $this = $(this);
        var $endDate = $(this).data('countdown');
        var $format = $(this).data('format');
        setInterval(function () {
          makeTimer($endDate, $this, $format);
        }, 0);
    });


    /*--
		Back to top Script
	-----------------------------------*/
    // Show or hide the sticky footer button
    $(window).on('scroll', function (event) {
        if ($(this).scrollTop() > 600) {
            $('.back-to-top').fadeIn(200)
        } else {
            $('.back-to-top').fadeOut(200)
        }
    });

    //Animate the scroll to yop
    $('.back-to-top').on('click', function (event) {
    event.preventDefault();

        $('html, body').animate({
            scrollTop: 0,
        }, 1500);
    });


    /*--
        Checkout Shipping Active
    -----------------------------------*/
    $('#shipping').on('click', function () {
        if ($('#shipping:checked').length > 0) {
          $('.checkout-shipping').slideDown();
        } else {
          $('.checkout-shipping').slideUp();
        }
    });



})(jQuery);


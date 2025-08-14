(function ($) {
    "use strict";

    $(window).on('load', function () {
        $('.preloader').fadeOut(1000);
    });

    // lightcase 
    $('a[data-rel^=lightcase]').lightcase();


    // scroll up start here
    $(function () {
        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 300) {
                $('.scrollToTop').css({
                    'bottom': '10%',
                    'opacity': '1',
                    'transition': 'all .5s ease'
                });
            } else {
                $('.scrollToTop').css({
                    'bottom': '-30%',
                    'opacity': '0',
                    'transition': 'all .5s ease'
                })
            }
        });

        //Click event to scroll to top
        $('a.scrollToTop').on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
            return false;
        });
    });



    $('.slider-logos').slick({
        infinite: false,
        arrows:false,
        speed: 300,
        autoplay: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
     


}(jQuery));



(function ($, Drupal, window, document, undefined) {
  Drupal.behaviors.custom_slider_assingment_js = {
    attach: function (context, settings) {
            // slider Start
            if(jQuery(".conference-slider").length) {
              jQuery(".conference-slider").not('.slick-initialized').slick({
                infinite: true,
                speed: 800,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [
                  {
                    breakpoint: 1100,
                    settings: {
                      slidesToShow: 2,
                      dots: true,
                      prevArrow: false,
                      nextArrow: false,
                    },
                  },
                  {
                    breakpoint: 900,
                    settings: {
                      slidesToShow: 1,
                      dots: true,
                      prevArrow: false,
                      nextArrow: false,
                    },
                  },
                  {
                    breakpoint: 767,
                    settings: {
                      slidesToShow: 1,
                      dots: true,
                      prevArrow: false,
                      nextArrow: false,
                    },
                  }
                ],
              });
            }
    }
  }
})(jQuery, Drupal, this, this.document);


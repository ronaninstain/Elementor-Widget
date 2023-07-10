(function ($) {
  $(window).on("elementor/frontend/init", function () {
    elementorFrontend.hooks.addAction(
      "frontend/element_ready/pe-latest-posts-sliders.default",
      function (scope, $) {
        var $HeroSlider = $(scope).find(".owl-bundle-eu");
        if ($HeroSlider.length > 0) {
          $HeroSlider.owlCarousel({
            loop: true,
            margin: 15,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            autoWidth: true,
            responsiveClass: true,
            dots: false,
            nav: false,
            navText: [
              "<i class='fa fa-chevron-left'></i>",
              "<i class='fa fa-chevron-right'></i>",
            ],
            responsive: {
              0: {
                items: 1,
                nav: true,
              },
              580: {
                items: 2,
                nav: true,
              },
              1000: {
                items: 5,
                nav: true,
              },
            },
          });
        }
      }
    );
  });
})(jQuery);

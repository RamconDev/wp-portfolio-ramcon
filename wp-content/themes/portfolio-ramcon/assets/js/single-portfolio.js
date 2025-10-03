(function (root, $, undefined) {
    $(document).ready(function () {
        console.log("Single script loaded");
        
        $('#slider-single').slick({
            dots: true,
            arrows: false,
            infinite: false,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true,
        });
  })
})(this, jQuery);
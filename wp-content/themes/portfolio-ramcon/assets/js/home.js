(function (root, $, undefined) {
    $(document).ready(function () {
        $('#slick-projects').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        dots: true,
        prevArrow: '<img class="prevArrow" src="' + themeData.templateUrl + '/assets/images/icons/arrow-left.svg">',
        nextArrow: '<img class="nextArrow" src="' + themeData.templateUrl + '/assets/images/icons/arrow-right.svg">',
        responsive: [
            {
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
            }
        ]
        });
    });
    

})(this, jQuery);
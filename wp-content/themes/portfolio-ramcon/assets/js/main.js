(function (root, $, undefined) {
  $(document).ready(function () {
    // console.log("Main script loaded");
    
    $("header .burguer img").on("click", (e) => {
      e.stopPropagation();
      $("header #menu-navbar-menu").toggleClass('active');
      $(".main").toggleClass('menu-active');
      $("footer").toggleClass('menu-active');
    });

    $(document).on("click", (e) => {
      const $menu = $("header #menu-navbar-menu");
      if ($menu.hasClass("active") && !$(e.target).closest("#menu-navbar-menu").length) {
        $menu.removeClass("active");
        $(".main").removeClass('menu-active');
        $("footer").removeClass('menu-active');
      }
    });

    $(window).on("scroll", () => {
      const scrollTop = $(window).scrollTop();
      const $header = $("header");

      scrollPixelsDown = 50;

      if (scrollTop > scrollPixelsDown) {
        $header.addClass("fixed");
      } else {
        $header.removeClass("fixed");
      }
    });



  });
})(this, jQuery);

$(document).on('app:ready', function() {
  var $header = $('#header');
  var isHomePage = $('.home').length;

  if ( $header.length && isHomePage ) {
    $(window).on('scroll.headerFixedScroll', function() {
      $headerOffset = App.windowHeight;

      if ( App.scrollTop >= $headerOffset ) {
        $header.addClass('active');
      } else {
        $header.removeClass('active');
      }
    });

    $(window).trigger('scroll.headerFixedScroll');
  } else {
    $(window).off('scroll.headerFixedScroll');
  }
});

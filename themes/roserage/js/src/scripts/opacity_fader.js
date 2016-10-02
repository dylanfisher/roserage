$(document).on('app:ready', function() {
  var $faders = $('.fader');

  if ( $faders.length ) {
    $(window).on('scroll.backgroundColor', function() {
      var opacity = 1 - ( App.scrollTop / App.windowHeight );
      opacity = Math.max(opacity, 0);

      $faders.css({ opacity: opacity });
    });

    $(window).trigger('scroll.backgroundColor');
  } else {
    $(window).off('scroll.backgroundColor');
  }
});

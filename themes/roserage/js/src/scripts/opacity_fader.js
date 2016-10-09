$(document).on('ready', function() {
  var $faders = $('.fader');

  if ( $faders.length ) {
    $(window).on('scroll.backgroundColor', function() {
      var opacity = 1 - ( App.scrollTop / App.windowHeight );
      opacity = Math.max(opacity, 0);

      $faders.css({ opacity: opacity });

      if ( opacity === 0 ) {
        if ( !$faders.hasClass('faded') ) {
          setTimeout(function() {
            $(window).trigger('resize');
          });
        }

        $faders.addClass('faded');
      } else {
        if ( $faders.hasClass('faded') ) {
          setTimeout(function() {
            $(window).trigger('resize');
          });
        }

        $faders.removeClass('faded');
      }
    });

    $(window).trigger('scroll.backgroundColor');
  } else {
    $(window).off('scroll.backgroundColor');
  }
});

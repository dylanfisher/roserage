$(document).on('ready', function() {
  var $faders = $('.fader');
  var scrollOffset = 0;

  if ( $faders.length ) {
    if ( $('.circle-animation').length ) {
      scrollOffset = 0.5;
    }

    $(window).on('scroll.backgroundColor', function() {
      var opacity = 1 - ( App.scrollTop / App.windowHeight ) + scrollOffset;
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

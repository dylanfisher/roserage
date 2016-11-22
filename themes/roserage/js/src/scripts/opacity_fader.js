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

      if ( App.scrollTop > 0 ) {
        $('html').addClass('has-scrolled');
      } else {
        $('html').removeClass('has-scrolled');
      }

      if ( App.scrollTop > 50 ) {
        $('html').addClass('has-scrolled--medium');
      } else {
        $('html').removeClass('has-scrolled--medium');
      }

      $faders.css({ opacity: opacity });

      if ( opacity === 0 ) {
        if ( !$faders.hasClass('faded') ) {
          setTimeout(function() {
            $(window).trigger('resize');
          });
        }

        $faders.addClass('faded');
        $('html').addClass('faders-are-faded');
      } else {
        if ( $faders.hasClass('faded') ) {
          setTimeout(function() {
            $(window).trigger('resize');
          });
        }

        $faders.removeClass('faded');
        $('html').removeClass('faders-are-faded');
      }
    });

    $(window).trigger('scroll.backgroundColor');
  } else {
    $(window).off('scroll.backgroundColor');
  }
});

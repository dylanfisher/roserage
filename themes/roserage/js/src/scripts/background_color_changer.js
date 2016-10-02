$(document).on('app:ready', function() {
  var $backgroundFader = $('#background-color-fader');

  if ( $backgroundFader.length ) {
    $(window).on('scroll.backgroundColor', function() {
      var opacity = 1 - ( App.scrollTop / App.windowHeight );
      opacity = Math.max(opacity, 0);

      $backgroundFader.css({ opacity: opacity });
    });

    $(window).trigger('scroll.backgroundColor');
  } else {
    $(window).off('scroll.backgroundColor');
  }
});

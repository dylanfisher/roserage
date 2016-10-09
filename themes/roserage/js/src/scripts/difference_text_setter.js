$(function() {
  // An annoying safari bug prevents mix-blend-mode from applying correctly on
  // page load in the single page stories. This probably needs to get run after
  // the images have loaded, or after scrollmagic initializes, rather than after
  // the 500ms timeout.

  var $differenceText = $('.difference-text');

  if ( $differenceText.length ) {
    setTimeout(function() {
      $differenceText.css('mix-blend-mode', 'normal');
      $(window).trigger('resize');
      $differenceText.css('mix-blend-mode', 'difference');
    }, 500);
  }
});

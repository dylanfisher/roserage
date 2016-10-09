$(document).on('ready', function() {
  var $title = $('#responsive-title');
  var $titleSubordinates = $('.responsive-title-subordinate');

  if ( $title.length ) {
    $title.fitText(0.5, {
      minFontSize: '20px',
      maxFontSize: '200px'
    });

    $title.addClass('active');
    $titleSubordinates.addClass('active');

    $(window).on('resize.setResponsiveTextSize', function() {
      var fontSize = $title.css('font-size');
      $titleSubordinates.css('font-size', fontSize);
    });

    $(window).trigger('resize.setResponsiveTextSize');
  } else {
    $(window).off('resize.setResponsiveTextSize');
  }
});

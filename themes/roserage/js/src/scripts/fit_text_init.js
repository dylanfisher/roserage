$(document).on('app:ready', function() {
  var $title = $('#responsive-title');

  if ( $title.length ) {
    $title.fitText(0.5, {
      minFontSize: '20px',
      maxFontSize: '200px'
    });
  }
});

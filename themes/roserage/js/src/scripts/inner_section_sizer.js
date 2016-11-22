$(window).on('ready resize', function() {
  var $innerSections = $('.section__inner');

  $innerSections.each(function() {
    var $innerSection = $(this);
    var $section = $innerSection.closest('.section');

    $section.removeClass('inner-section-height-overflow');

    var innerSectionHeight = $innerSection.height();
    var sectionHeight = $section.height();

    if ( innerSectionHeight >= sectionHeight ) {
      $section.addClass('inner-section-height-overflow');
    } else {
      $section.removeClass('inner-section-height-overflow');
    }
  });
});

$(document).on('click', '[data-lightbox]', function() {
  App.openLightbox( $(this) );
});

$(document).on('click', '#lightbox', function() {
  App.lightbox('close');
});

App.isLightboxOpen = function() {
  return $('html').hasClass('lightbox-open');
};

App.openLightbox = function( $originalElement ) {
  if( App.breakpoint.isMobile() ) {
    var url  = $originalElement.attr('data-lightbox');
    window.open(url, '_blank');
  } else {
    var lastScrollPos = $(window).scrollTop();
    var scrollThreshold = 25;

    var lightboxHTML = '<div class="lightbox" id="lightbox"></div>';

    $('html').addClass('lightbox-open');
    $originalElement.addClass('lightbox-active');
    $('body').prepend( lightboxHTML );

    App.setLightboxContent( $originalElement );

    $('#lightbox').transition({opacity: 1}, 600);

    $(window).on('scroll.lightboxEvents', function() {
      var scrollDifference = Math.abs($(window).scrollTop() - lastScrollPos);
      if(scrollDifference > scrollThreshold) {
        App.lightbox('close');
        lastScrollPos = $(window).scrollTop();
      }
    });

    $(document).on('keydown.lightboxEvents', function(e) {
      switch(e.which) {
        case 27: // esc
          App.lightbox('close');
        break;

        case 37: // left
          App.lightbox('navigateLeft');
        break;

        case 39: // right
          App.lightbox('navigateRight');
        break;

        default: return; // exit this handler for other keys
      }
      e.preventDefault(); // prevent the default action (scroll / move caret)
    });

  }
};

App.lightbox = function( action ) {
  var $active, $slide, $prev, $next;

  // Left/right navigation not currently supported
  if( action == 'navigateLeft' || action == 'navigateRight' ) {
    $active = $('.lightbox-active');
    $slide = $active.closest('[data-lightbox]');
  }

  if( action == 'close' ) {
    $('#lightbox').transition({opacity: 0}, 400, function() {
      $('html').removeClass('lightbox-open');
      $('.lightbox-active').removeClass('lightbox-active');
      $('#lightbox').remove();
    });

    $(window).off('scroll.lightboxEvents');
    $(document).off('keydown.lightboxEvents');

  } else if( action == 'navigateLeft' ) {
    if( $slide.length ) {
      $prev = $slide.prevWrap('[data-lightbox]');
      $active.removeClass('lightbox-active');
      $prev.addClass('lightbox-active');
      App.setLightboxContent( $('.lightbox-active') );
    }

  } else if( action == 'navigateRight' ) {
    if( $slide.length ) {
      $next = $slide.nextWrap('[data-lightbox]');
      $active.removeClass('lightbox-active');
      $next.addClass('lightbox-active');
      App.setLightboxContent( $('.lightbox-active') );
    }
  }
};

App.setLightboxContent = function( $originalElement ) {
  var fullSrc = $originalElement.attr('data-lightbox');
  var caption = $originalElement.attr('data-caption');
  var fullImageHTML = '<img class="lightbox__image" src="' + fullSrc + '">';

  if ( !fullSrc || !fullSrc.length ) {
    fullImageHTML = $originalElement.find('img').clone().addClass('lightbox__image').prop('outerHTML');
  }

  var attachmentUrl = $originalElement.attr('data-attachment-url');

  if ( attachmentUrl ) {
    App.registerAttachmentView( attachmentUrl );
  }

  var content = '<div class="lightbox__image-wrapper">' + fullImageHTML + '</div>';
  var captionHTML = caption ? ( '<div class="lightbox__caption" id="lightbox__caption">' + caption + '</div>' ) : '';
  var lightboxHTML = content + captionHTML;

  var captionHeight = $('#lightbox__caption').outerHeight(true);
  $('#lightbox img').css({ paddingBottom: captionHeight });

  $('#lightbox').html( lightboxHTML );
};

<?php
  the_post();

  $post_id = get_the_ID();

  $all_posts = get_posts(array(
    'fields' => 'ids',
    'numberposts' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
  ));

  $index = array_search($post_id, $all_posts) + 1;

  $foreground_color = get_field('foreground_color');
  $background_color = get_field('background_color');

  echo '<style>';
    if ( $background_color ) {
      echo 'html { background: ' . $background_color . ' }';
    }

    if ( $foreground_color ) {
      echo '.post, .post a { color: ' . $foreground_color . ' }';
    }
  echo '</style>';
?>

<script>
  $(function() {
    App.controller = new ScrollMagic.Controller();
  });
</script>

<div id="post-<?php the_ID() ?>" <?php post_class() ?>>
  <section class="section text-center" id="logo-wrapper">
    <div class="section__inner--fixed fader">
      <h2 class="title responsive-title" id="responsive-title">
        <?php
          $text = get_the_title();
          $words = explode(' ', $text);
          $length = count( $words );
          $single_word = null;

          if ( $length == 1 ):
            $single_word = $words;
          endif;

          $text_1 = array_slice( $words, 0, $length / 2 );
          $text_2 = array_slice( $words, $length / 2 );

          if ( $single_word ):
            echo '<span class="responsive-title--single-word">' . join( $single_word, ' ' ) . '</span>';
          else:
            echo '<span class="responsive-title-part responsive-title-part--1">' . join( $text_1, ' ' ) . '</span>';
            echo '<span class="responsive-title-part responsive-title-part--2">' . join( $text_2, ' ' ) . '</span>';
          endif;
        ?>
      </h2>
    </div>
  </section>

  <?php echo '<div class="post-index fader"><div class="title responsive-title-subordinate">' . integerToRoman( $index ) . '</div></div>'; ?>

  <section class="section section--story" id="story">
    <?php
      if ( have_rows('section') ):
        $i = 0;
        $half_width_image_index = 0;
        $last_row_layout = '';
        $rows = get_field('section');
        while ( have_rows('section') ) : the_row();
          $i++;
          echo '<div class="story-item">';
            if ( get_row_layout() == 'image' ):
              $image = get_sub_field('image');
              $size_class = '';
              $image_offset_class = '';
              if ( get_sub_field('half_width') ):
                $half_width_image_index++;
                $size_class = get_sub_field('half_width') ? ' story-item__image--half-width col-sm-5' : ' story-item__image--full-width';
                $image_offset_class = ( $half_width_image_index % 2 ) ? ' story-item__image--even col-sm-offset-1' : ' story-item__image--odd col-sm-offset-6';
              endif;
              echo '<div class="story-item__image ' . $size_class . $image_offset_class . '" id="target' . $i . '">';
                echo '<div class="story-item__inner">';
                  echo '<img class="story-item__content glossary-item__shadow" src="' . $image['sizes']['large'] . '" width="' . $image['sizes']['large-width'] . '" height="' . $image['sizes']['large-height'] . '" alt="' . ( $image['alt'] ? $image['alt'] : $image['title'] ) . '">';
                echo '</div>';
              echo '</div>';
            elseif ( get_row_layout() == 'text' ):
              echo '<div class="story-item" id="trigger' . $i . '"></div>';
              echo '<div class="story-item__text difference-text ' . ( $last_row_layout == 'text' ? 'consecutive-text' : '' ) . ( $i == count( $rows ) ? ' last-row' : '' ) . '" id="target' . $i . '">';
                echo '<div class="story-item__inner">';
                  echo '<div class="story-item__content">';
                    the_sub_field('text');
                  echo '</div>';
                echo '</div>';
              echo '</div>';
    ?>
              <script>
                $(function() {
                  var wipeAnimation = new TimelineLite()
                    .fromTo('#target<?php echo $i; ?> .story-item__inner', 1, { x: '100%' }, { x: '-100%', ease: Linear.easeNone });

                  var scene = new ScrollMagic.Scene({
                      triggerElement: '#trigger<?php echo $i; ?>',
                      triggerHook: 0.5,
                      duration: '200%'
                    })
                    .setPin('#target<?php echo $i; ?>', {
                      pushFollowers: false
                    })
                    .setTween(wipeAnimation)
                    .addTo(App.controller);

                  var durationValueCache;

                  function getDuration() {
                    return durationValueCache;
                  }

                  function updateDuration(e) {
                    durationValueCache = Math.max( App.windowWidth, App.windowHeight );
                  }

                  $(window).on('resize', updateDuration);

                  $(window).triggerHandler('resize');

                  scene.duration(getDuration);
                });
              </script>
    <?php
            endif;
          echo '</div>';

          $last_row_layout = get_row_layout();
        endwhile;
      endif;
    ?>
  </section>

  <section class="section text-center">
    <div class="section__inner">
      <?php
        $previous_post = get_previous_post();
        $previous_post_url;

        if ( empty( $previous_post ) ):
          $first_post = get_posts(array(
            'numberposts' => 1,
            'orderby' => 'date',
            'order' => 'DESC'
          ));

          if ( $first_post ):
            $first_post = $first_post[0];
            $previous_post_url = get_permalink( $first_post );
            $previous_post_title = get_the_title( $first_post );
          endif;
        else:
          $previous_post_url = get_permalink( $previous_post->ID );
          $previous_post_title = $previous_post->post_title;
        endif;

        if ( !empty( $previous_post_url ) ):
          echo '<div class="previous-post-link-wrapper">';
            echo '<a class="previous-post-link blank-link" href="' . $previous_post_url . '">';
              echo '<span class="previous-post-link__inner">' . $previous_post_title . '</span>';
            echo '</a>';
          echo '</div>';
        endif;
      ?>
    </div>
  </section>
</div>

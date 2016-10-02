<?php the_post() ?>
<div id="post-<?php the_ID() ?>" <?php post_class() ?>>
  <section class="section text-center" id="logo-wrapper">
    <div class="section__inner">
      <h2 class="title responsive-title" id="responsive-title">
        <?php
          $text = get_the_title();
          $words = explode(' ', $text);
          $length = count( $words );
          $text_1 = array_slice( $words, 0, $length / 2 );
          $text_2 = array_slice( $words, $length / 2 );

          echo '<span class="responsive-title-part responsive-title-part--1">' . join( $text_1, ' ' ) . '</span>';
          echo '<span class="responsive-title-part responsive-title-part--2">' . join( $text_2, ' ' ) . '</span>';
        ?>
      </h2>
    </div>
  </section>

  <section class="section">
    <?php
      if ( have_rows('section') ):
        while ( have_rows('section') ) : the_row();
          if ( get_row_layout() == 'image' ):
            $image = get_sub_field('image');
            echo '<img src="' . $image['sizes']['large'] . '" width="' . $image['sizes']['large-width'] . '" height="' . $image['sizes']['large-height'] . '" alt="' . ( $image['alt'] ? $image['alt'] : $image['title'] ) . '">';
          elseif ( get_row_layout() == 'text' ):
            the_sub_field('text');
          endif;
        endwhile;
      endif;
    ?>
  </section>
</div>

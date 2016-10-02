<?php the_post() ?>
<div class="content">
  <div id="post-<?php the_ID() ?>" <?php post_class() ?>>
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
  </div><!-- .post -->
</div><!-- .content -->

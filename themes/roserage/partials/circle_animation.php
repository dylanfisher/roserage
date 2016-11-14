<div class="circle-animation">
  <?php $posts = get_posts( 'orderby=rand&numberposts=1'); ?>
  <?php if ( !empty( $posts ) ): ?>
    <?php
      $post = $posts[0];
      $post_id = $post->ID;
      $rows = get_field( 'section', $post_id );

      if ( $rows ):
        foreach ( $rows as $row ):
          if ( $row['acf_fc_layout'] == 'image' ):
            $image = $row['image'];
            echo '<div class="circle-animation__image" style="background-image: url(' . $image['sizes']['large'] . ');"></div>';
            break;
          endif;
        endforeach;
      endif;
    ?>
  <?php endif; ?>
  <?php get_template_part('images/svg/circle-outline.svg'); ?>
</div>

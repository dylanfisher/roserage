<div class="circle-animation-colored-background">
  <?php $posts = get_posts( 'orderby=rand&numberposts=1'); ?>
  <?php if ( !empty( $posts ) ): ?>
    <?php
      $post = $posts[0];
      $post_id = $post->ID;
      $rows = get_field( 'section', $post_id );
      $images = array();

      if ( $rows ):
        foreach ( $rows as $row ):
          if ( $row['acf_fc_layout'] == 'image' ):
            array_push( $images, $row['image'] );
          endif;
        endforeach;
      endif;

      if ( !empty( $images ) ):
        $image = $images[ array_rand( $images ) ];
        echo '<div class="circle-animation__image" style="background-image: url(' . $image['sizes']['large'] . ');"></div>';
      endif;
    ?>
  <?php endif; ?>
  <?php get_template_part('images/svg/circle-outline.svg'); ?>
</div>

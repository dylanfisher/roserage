<?php
  $index = $the_query->current_post + 1;
  $offset_class = !($index % 2) ? 'col-sm-offset-4 col-md-offset-5 col-lg-offset-6' : 'col-lg-offset-1';
  $foreground_color = get_field('foreground_color');
?>

<div class="glossary-item title">
  <div class="col-sm-8 col-md-7 col-lg-5 <?php echo $offset_class; ?>">
    <a class="glossary-item__shadow" href="<?php the_permalink(); ?>" style="color: <?php echo $foreground_color; ?>;">
      <div class="glossary-item__index title">
        <?php echo integerToRoman( $index ); ?>
      </div>

      <div class="glossary-item__title title difference-text">
        <?php the_title(); ?>
      </div>

      <?php
        $rows = get_field('section');

        if ( $rows ):
          foreach ( $rows as $row ):
            if ( $row['acf_fc_layout'] == 'image' ):
              $image = $row['image'];
              echo '<img class="glossary-item__image" src="' . $image['sizes']['glossary'] . '" width="' . $image['sizes']['glossary-width'] . '" height="' . $image['sizes']['glossary-height'] . '" alt="' . ( $image['alt'] ? $image['alt'] : $image['title'] ) . '">';
              break;
            endif;
          endforeach;
        endif;
      ?>
    </a>
  </div>
</div>

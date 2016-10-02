<?php $index = get_query_var( 'index', 1 ); ?>

<?php $offset_class = !($index % 2) ? 'col-sm-offset-6' : ''; ?>

<div class="glossary-item">
  <div class="col-sm-6 <?php echo $offset_class; ?>">
    <a href="<?php the_permalink(); ?>">
      <div class="glossary-item__index title">
        <?php echo integerToRoman( $index ); ?>
      </div>

      <div class="glossary-item__title title">
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

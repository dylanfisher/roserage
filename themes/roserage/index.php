<div class="container">

  <section class="section section--full-viewport text-center" id="logo-wrapper">
    <div class="section__inner">
      <div class="narc-logo">
        <?php get_template_part( 'images/svg/narc-logo.svg' ); ?>
      </div>
      <?php get_template_part( 'partials/circle_animation' ); ?>
    </div>
  </section>

  <?php if ( get_field('intro', 'option') ): ?>
    <section class="section text-center" id="information">
      <div class="section__inner">
        <div class="row">
          <div class="col-lg-10">
            <?php the_field('intro', 'option'); ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="section" id="glossary">
    <div class="row">
      <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => -1,
        );

        $the_query = new WP_Query( $args );

        if ( $the_query->have_posts() ):
          while ( $the_query->have_posts() ):
            $the_query->the_post();
            set_query_var('the_query', $the_query);
            get_template_part('partials/glossary_item');
          endwhile;
          wp_reset_postdata();
        endif;
      ?>
    </div>
  </section>

  <section class="section">
    <div class="section__inner">
      <div class="row">
        <div class="col-sm-5 col-sm-offset-1">
          <?php the_field('contact', 'option'); ?>
        </div>
        <div class="col-sm-4 col-sm-offset-1">
          <?php the_field('credits', 'option'); ?>
        </div>
      </div>
    </div>
  </section>

</div>

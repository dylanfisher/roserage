<div class="container">

  <section class="section text-center" id="logo-wrapper">
    <div class="section__inner">
      <div class="roserage-logo">
        <?php get_template_part('images/svg/roserage-logo.svg'); ?>
      </div>
    </div>
  </section>

  <section class="section text-center">
    <div class="section__inner">
      <div class="row">
        <div class="col-lg-10">
          <p>Pellentesque nec mi a augue venenatis fringilla sed id est. Proin pellentesque est erat, nec gravida nisl auctor a. Sed pharetra eros turpis. Quisque mollis vitae ipsum ac blandit. Maecenas sit amet vehicula libero. Fusce rutrum felis sit amet erat vehicula tempor. Etiam vel massa et neque ornare cursus. Aenean orci augue, sollicitudin vel nibh a, faucibus consectetur nibh. Duis et dolor vitae quam pulvinar pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et vulputate lorem, eu viverra lacus. Proin vel mauris vehicula felis tristique aliquet id non velit.</p>
        </div>
      </div>
    </div>
  </section>

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

  <section class="section" id="information">
    <div class="section__inner">
      <div class="row">
        <div class="col-sm-5 col-sm-offset-1">
          <div class="contact-section">
            <div class="subtitle">Contact</div>
            <p>email@roserage.com</p>
          </div>
          <div class="contact-section">
            <div class="subtitle">About Pepi Ginsberg</div>
            <p>Aliquam sit amet nisi vitae felis cursus porta sit amet ut ipsum. Nullam eu pellentesque arcu. Donec posuere porttitor orci, nec pellentesque ipsum viverra id. Praesent commodo urna ornare tincidunt cursus. Suspendisse lobortis convallis.</p>
          </div>
        </div>
        <div class="col-sm-4 col-sm-offset-1">
          <div class="subtitle">Colophon</div>
          <p>Design &amp; Development: Matthew Boblet, Dylan Fisher</p>
          <p>Typefaces:<br>
          F Grotesk by Radim Pesko OPTIBauer by ???</p>
        </div>
      </div>
    </div>
  </section>

</div>

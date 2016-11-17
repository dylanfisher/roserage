<?php

// Add page slug to body class
function sandbox_the_content_filter( $content ) {
  $content = preg_replace( '/<p><\/p>/', '', $content );
  return $content;
}
add_filter( 'the_content', 'sandbox_the_content_filter' );
add_filter('acf_the_content', 'sandbox_the_content_filter');

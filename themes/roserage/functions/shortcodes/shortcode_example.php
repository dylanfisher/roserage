<?php

function sandbox_subtitle_shortcode( $atts, $content = null ) {
  return '<div class="subtitle">' . $content . '</div>';
}
add_shortcode( 'subtitle', 'sandbox_subtitle_shortcode' );

<!DOCTYPE html>
<html data-home-url="<?php echo home_url('/'); ?>">
<head>
  <title><?php wp_title( '-', true, 'right' ); echo esc_html( get_bloginfo('name'), 1 ); ?></title>

  <!-- Basic meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width">

  <!-- Facebook meta tags -->
  <meta property="og:url" content="<?php the_permalink(); ?>">
  <!-- <meta property="og:image" content="{{imageUrl}}"> -->
  <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>">
  <meta property="og:title" content="<?php the_title(); ?>">
  <meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>">
  <meta property="og:see_also" content="<?php echo home_url('/'); ?>">

  <!-- Google meta tags -->
  <meta itemprop="name" content="<?php the_title(); ?>">
  <meta itemprop="description" content="<?php echo get_bloginfo('description'); ?>">
  <!-- <meta itemprop="image" content="{{imageUrl}}"> -->

  <!-- Twitter meta tags -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:url" content="<?php the_permalink(); ?>">
  <meta name="twitter:title" content="<?php the_title(); ?>">
  <meta name="twitter:description" content="<?php echo get_bloginfo('description'); ?>">
  <!-- <meta name="twitter:image" content="{{imageUrl}}"> -->

  <link rel="icon" type="image/png" href="<?php echo get_bloginfo('template_url'); ?>/images/favicon.png">
  <?php wp_head(); ?>
</head>
<body>
  <div id="smoothstate-container">
    <div <?php body_class(); ?>>
      <header class="header" id="header">
        <nav>
          <h1 class="site-title">
            <a class="header-link--site-title small blank-link" href="<?php bloginfo('url'); ?>/" rel="home"><?php bloginfo('name'); ?></a>
          </h1>
          <?php
            $glossary_link = is_front_page() ? '#glossary' : get_bloginfo('url') . '#glossary';
            $information_link = is_front_page() ? '#information' : get_bloginfo('url') . '#information';
          ?>
          <a class="header-link--glossary small blank-link" href="<?php echo $glossary_link ?>">
            <?php get_template_part('images/svg/glossary-icon.svg'); ?>
          </a>
          <a class="header-link--information small blank-link" href="<?php echo $information_link ?>">Information</a>
        </nav>
      </header>

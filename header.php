<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class();?>>
    <header>
        <?php wp_nav_menu(array(
            'menu'              => 'header_menu',
            'theme_location'    => 'header_menu',
            'depth'             => 1,
            'menu_class'        => 'menu',
            'container'         => false,
        )); ?>
    </header>
<?php
require get_template_directory() . '/includes/enqueue.php';
if(class_exists('acf_pro')){
    require get_template_directory() . '/includes/acf_register_block.php';
}

add_theme_support( 'menus' );

register_nav_menus( array(
    'header_menu' => __( 'Header Menu' ),
    'footer_menu' => __( 'Footer Menu' ),
));

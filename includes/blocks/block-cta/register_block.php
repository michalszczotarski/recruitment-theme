<?php

acf_register_block_type(
    array(
        'name'				=> 'block-bo-cta',
        'title'				=> __('CTA section', 'theme-domain'),
        'description'		=> __('', 'theme-domain'),
        'render_template'   => dirname(__FILE__) . '/block.php',
        'category'			=> 'blueowl-category',
        'icon'				=> 'welcome-widgets-menus',
        'keywords'			=> array( 'cta', 'blueowl' ),
        'mode'				=> 'edit'
    )
);
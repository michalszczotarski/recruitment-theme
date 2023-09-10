<?php
function load_css_js() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600&display=swap',  array(), null);
    wp_enqueue_style('cdnfonts', 'https://fonts.cdnfonts.com/css/neo-sans-pro?styles=71694,71693',  array(), null);

    wp_enqueue_style('main-css', get_template_directory_uri() . '/dist/style.css');
    wp_enqueue_script('main-scripts', get_template_directory_uri() . '/dist/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'load_css_js', 100);
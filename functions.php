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

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Options Page'),
            'menu_title'    => __('Options Page'),
            'menu_slug'     => 'options-page',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}

function show($data) {
    echo "<pre>";
    print_r($data);
    echo "<pre>";
}

function get_menu_id($location) {

    $locations = get_nav_menu_locations();

    $menu_id = $locations[$location];

    return !empty($menu_id) ? $menu_id : '';
}

function get_child_menu_items($menu_array, $parent_id) {
    $child_menu = [];

    if( !empty($menu_array) && is_array($menu_array)) {
        foreach($menu_array as $item) {
            if(intval($item->menu_item_parent) === $parent_id) {
                array_push($child_menu, $item);
            }
        }
    }

    return $child_menu;
}
<?php
/**
 * ✅ Available menus
 */
add_theme_support( 'menus' );

function register_my_menus() {
    register_nav_menus([
        'navbar-menu' => __('Navbar Menu'),
        'footer-menu' => __('Footer Menu'),
    ]);
}
add_action('after_setup_theme', 'register_my_menus');

/**
 * ✅ Add icon before of every link of menu using the description
 */
add_filter('walker_nav_menu_start_el', function($item_output, $item, $depth, $args) {
    // only 'footer-menu'
    if ($args->theme_location === 'footer-menu') {
        
        $icon_file = $item->description; 
        
        if (!empty($icon_file)) {
            // build the path
            $icon_url = get_template_directory_uri() . '/assets/images/icons/' . $icon_file;
            
            // Insert img
            $icon_html = '<img src="' . esc_url($icon_url) . '" alt="" class="menu-icon">';
            
            // replace the output
            $item_output = $icon_html . $item_output;
        }
    }
    return $item_output;
}, 10, 4);



/**
 * ✅ Available posts thumbnails
 */
function my_theme_setup() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'my_theme_setup');

/*
 * ✅ Add support for title tag in head section.
 * This allows WordPress to manage the document title.
 */
add_theme_support('title-tag');

/**
 * ✅ Disable the block editor for posts.
 * This will revert to the classic editor for posts.
 */
add_filter('use_block_editor_for_post_type', '__return_false', 100);
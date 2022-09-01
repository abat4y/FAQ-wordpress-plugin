<?php
/*
 * Plugin Name: FAQ
 * Description: A simple WordPress plugin that allows user to create faq with contnet
 * Version: 1.2.0
 * Author: sameh helal
 * Author URI: https://www.linkedin.com/in/sameh-helal/
 */

if( !function_exists( 'add_action' ) ){
    echo "Hi there! I'm just a plugin, not much I can do when called directly.";
    exit;
}

// Setup
define( 'RECIPE_PLUGIN_URL', __FILE__ );

// Includes
include( 'includes/activate.php' );
include( 'includes/init.php' );
include( 'includes/front/enqueue.php' );
include( 'shortcodes/show_faqs.php' );

// Hooks
register_activation_hook( __FILE__, 'F_activate_plugin' );
add_action( 'init', 'faq_init' );
add_action('init', 'add_faqs_catogries');
// add_action( 'save_post_recipe', 'r_save_post_admin', 10, 3 );
// add_filter( 'the_content', 'r_filter_recipe_content' );
add_action( 'wp_enqueue_scripts', 'f_enqueue_scripts', 100 );
add_action( 'wp_ajax_r_rate_recipe', 'f_rate_recipe' );
add_action( 'wp_ajax_nopriv_r_rate_recipe', 'f_rate_recipe' );
add_action('admin_menu', 'faq_register_my_custom_submenu_page');
// add_action( 'admin_init', 'recipe_admin_init' );
function faq_register_my_custom_submenu_page() {
    add_submenu_page(
        'edit.php?post_type=faq',
        'FAQ Instructions',
        'FAQ Instructions',
        'manage_options',
        'FAQ_Instructions',
        'faq_my_custom_submenu_page_callback' );
}
 
function faq_my_custom_submenu_page_callback() {
    echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>';
        echo '<h2>Instructions</h2>';
        echo '<ul>';
        echo '<li><h3>- Copy this shortcode [Siliconefaq] and past it in any WP editor </h3> </li>';
        echo '<li><h3>- Controle of tabs number  -> [Siliconefaq faqs_per_page="your tap number" ] </h3> </li>';
        echo '<li><h3>- Controle of tabs order  -> [Siliconefaq order="DESC OR ASC" ]</h3>  </li>';
        echo '<li><h3>- Show tabs  of specific category  -> [Siliconefaq category_slug="category slug here" ] </h3> </li>';
        echo '</ul>';
    echo '</div>';
}

// Shortcodes
add_shortcode( 'Siliconefaq', 'faq_filter_shortcode' );

<?php

function f_enqueue_scripts(){
    wp_register_style( 'faq', plugins_url( '/assets/rateit/rateit.css', RECIPE_PLUGIN_URL ) );
    wp_enqueue_style( 'faq' );

    wp_register_script( 
        'faq', 
        plugins_url( '/assets/rateit/jquery.rateit.min.js', RECIPE_PLUGIN_URL ), 
        ['jquery'], 
        '1.0.0', 
        true 
    );
    wp_register_script( 
        'r_main', plugins_url( '/assets/js/main.js', RECIPE_PLUGIN_URL ), ['jquery'], '1.0.0', true 
    );

    wp_localize_script( 'r_main', 'recipe_obj', [
        'ajax_url'      =>  admin_url( 'admin-ajax.php' )
    ]);
    
    wp_enqueue_script( 'faq' );
    wp_enqueue_script( 'r_main' );
}
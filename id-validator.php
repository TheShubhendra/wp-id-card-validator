<?php
/**
 * Plugin Name:       ID Validator
 * Description:       validates the ID Cards issued by YAIF
 * Version:           1.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shubhendra Kushwaha
 * Author URI:        https://github.com/TheShubhendra
 */
 
 require __dir__.'/include/settings.php';
 require __dir__.'/include/request-handler.php';
 add_action('wp_enqueue_scripts', 'enqueue_scripts',1);
 
function enqueue_scripts() {
    wp_register_style( 'id-validator-style', '/wp-content/plugins/id-validator/assets/style/style.css' );
    wp_enqueue_style( 'id-validator-style' );
}
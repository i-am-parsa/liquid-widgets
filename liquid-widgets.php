<?php
/**
 * Plugin Name: Liquid Widgets
 * Description: Some necessary addons for Elementor with Liquid Glass Style.
 * Version:     1.0.0
 * Author:      Not Web / Parsa
 * Author URI:  https://notweb.ir
 * Text Domain: liquid-widget
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.25.0
 */

function register_liquid_widgets( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/liquid-button.php' );

	$widgets_manager->register( new \Liquid_Widgets_Button() );

}
add_action( 'elementor/widgets/register', 'register_liquid_widgets' );

add_action('wp_enqueue_scripts', function() {
    wp_register_style(
        'liquid-button',
        plugin_dir_url(__FILE__) . 'assets/css/liquid-button.css',
        [],
        '1.0.0',
    );
});
<?php

/**
 * @link              https://hudsoncreativestudio.com/
 * @since             1.0.0
 * @package           HCS_Customizer
 *
 * @wordpress-plugin
 * Plugin Name:       YOOtheme Refresh Pause
 * Plugin URI:        https://hudsoncreativestudio.com/
 * Description:       Adds additional options to the customizer.
 * Version:           1.0.0
 * Author:            Hudson Creative Studio
 * Author URI:        https://hudsoncreativestudio.com/contact/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       hcs-customizer
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Enqueues the customizer script.
 */
function hcs_customizer_script() {
    global $wp_customize;
	if ( isset( $wp_customize ) ) {
    	wp_enqueue_script( 'hcs-customizer-script', plugin_dir_url( __FILE__ ) . 'js/hcs-customizer.js', array(), '1.0', true );
	}
}
add_action( 'admin_enqueue_scripts', 'hcs_customizer_script');

/**
 * Adds the new customizer settings.
 *
 * @param object $wp_customize
 */
function hcs_customizer_options( $wp_customize ) {

	// Create custom panel.
	$wp_customize->add_panel( 'hcs_customizer', array(
		'priority'       => 500,
		'theme_supports' => '',
		'title'          => __( 'Customizer Settings'),
		'description'    => __( 'Addtional settings for the customizer.'),
	));

	$wp_customize->add_section( 'hcs_customizer_preview_section' , array(
		'title'    => __('Auto Refresh'),
		'panel'    => 'hcs_customizer',
		'priority' => 10
	));

	// Add setting
	$wp_customize->add_setting( 'hcs_refresh_toggle', array(
		'default'           => false
	));

	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'custom_hcs_refresh_toggle',
		    array(
		        'label'    			=> __( 'Disable Preview Auto Refresh'),
		        'section'  			=> 'hcs_customizer_preview_section',
		        'settings' 			=> 'hcs_refresh_toggle',
		        'type'     			=> 'checkbox',
				'description'		=> __( 'Stops the preview from automatically updating. You can update the preview manually by clicking the rotate icon in the top-left corner.')
		    )
	    )
	);

}
add_action('customize_register', 'hcs_customizer_options');
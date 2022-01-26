<?php
/**
 * UnderStrap Theme Customizer
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'understrap_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function understrap_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'understrap_customize_register' );

if ( ! function_exists( 'understrap_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function understrap_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section(
			'understrap_theme_layout_options',
			array(
				'title'       => __( 'Theme Layout Settings', 'understrap' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Container width and sidebar defaults', 'understrap' ),
				'priority'    => apply_filters( 'understrap_theme_layout_options_priority', 160 ),
			)
		);


		$wp_customize->add_section(
			'understrap_theme_location_details',
			array(
				'title'       => __( 'Location Details', 'understrap' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Add Office location to display on your site', 'understrap' ),
				'priority'    => 120,
			)
		);


		$wp_customize->add_section(
			'understrap_theme_social_links',
			array(
				'title'       => __( 'Social Media Links', 'understrap' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Please add full url of social media links', 'understrap' ),
				'priority'    => 120,
			)
		);	


		$wp_customize->add_section(
			'understrap_theme_notification_bar_section',
			array(
				'title'       => __( 'Notification Bar', 'understrap' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Add Notification content', 'understrap' ),
				'priority'    => 100,
			)
		);		



		/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		function understrap_theme_slug_sanitize_select( $input, $setting ) {

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key( $input );

			// Get the list of possible select options.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		}

		$wp_customize->add_setting(
			'understrap_container_type',
			array(
				'default'           => 'container',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_container_type',
				array(
					'label'       => __( 'Container Width', 'understrap' ),
					'description' => __( 'Choose between Bootstrap\'s container and container-fluid', 'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'understrap' ),
						'container-fluid' => __( 'Full width container', 'understrap' ),
					),
					'priority'    => apply_filters( 'understrap_container_type_priority', 10 ),
				)
			)
		);

		// Location Details Setting
		$wp_customize->add_setting(
			'understrap_lehigh_valley_location_detail',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'sanitize_callback' => '',
				'capability'        => 'edit_theme_options',
			)
		);


		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_lehigh_valley_location_detail',
				array(
					'label'       => __( 'Lehigh Valley', 'understrap' ),
					'description' => __( 'Enter address for Lehigh Valley office' ),
					'section'     => 'understrap_theme_location_details',
					'settings'    => 'understrap_lehigh_valley_location_detail',
					'type'        => 'textarea',
					'priority'    => 10,
				)
			)
		);


		$wp_customize->add_setting(
			'understrap_monroe_location_detail',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'sanitize_callback' => '',
				'capability'        => 'edit_theme_options',
			)
		);


		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_monroe_location_detail',
				array(
					'label'       => __( 'Monroe County', 'understrap' ),
					'description' => __( 'Enter address for Monroe County office' ),
					'section'     => 'understrap_theme_location_details',
					'settings'    => 'understrap_monroe_location_detail',
					'type'        => 'textarea',
					'priority'    => 10,
				)
			)
		);


		// Social Media links settings

		$wp_customize->add_setting(
			'understrap_facebook_link',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'sanitize_callback' => '',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_facebook_link',
				array(
					'label'       => __( 'Facebook', 'understrap' ),
					'description' => __( '' ),
					'section'     => 'understrap_theme_social_links',
					'settings'    => 'understrap_facebook_link',
					'type'        => 'text',
					'priority'    => 10,
				)
			)
		);


		$wp_customize->add_setting(
			'understrap_twitter_link',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'sanitize_callback' => '',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_twitter_link',
				array(
					'label'       => __( 'Twitter', 'understrap' ),
					'description' => __( '' ),
					'section'     => 'understrap_theme_social_links',
					'settings'    => 'understrap_twitter_link',
					'type'        => 'text',
					'priority'    => 10,
				)
			)
		);


		$wp_customize->add_setting(
			'understrap_instagram_link',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'sanitize_callback' => '',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_instagram_link',
				array(
					'label'       => __( 'Instagram', 'understrap' ),
					'description' => __( '' ),
					'section'     => 'understrap_theme_social_links',
					'settings'    => 'understrap_instagram_link',
					'type'        => 'text',
					'priority'    => 10,
				)
			)
		);


		$wp_customize->add_setting(
			'understrap_youtube_link',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'sanitize_callback' => '',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_youtube_link',
				array(
					'label'       => __( 'Youtube', 'understrap' ),
					'description' => __( '' ),
					'section'     => 'understrap_theme_social_links',
					'settings'    => 'understrap_youtube_link',
					'type'        => 'text',
					'priority'    => 10,
				)
			)
		);


		// Notification Bar 

		$wp_customize->add_setting(
			'understrap_notification_bar_content',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'sanitize_callback' => '',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_notification_bar_content',
				array(
					'label'       => __( 'Content', 'understrap' ),
					'description' => __( '' ),
					'section'     => 'understrap_theme_notification_bar_section',
					'settings'    => 'understrap_notification_bar_content',
					'type'        => 'textarea',
					'priority'    => 10,
				)
			)
		);


		$wp_customize->add_setting(
			'understrap_notification_bar_modal',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'sanitize_callback' => '',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_notification_bar_modal',
				array(
					'label'       => __( 'Select a page for a modal', 'understrap' ),
					'description' => __( '' ),
					'section'     => 'understrap_theme_notification_bar_section',
					'settings'    => 'understrap_notification_bar_modal',
					'type'        => 'dropdown-pages',
					'priority'    => 10,
				)
			)
		);


		$wp_customize->add_setting(
			'understrap_notification_bar_enable',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'sanitize_callback' => '',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_notification_bar_enable',
				array(
					'label'       => __( 'Enable', 'understrap' ),
					'description' => __( '' ),
					'section'     => 'understrap_theme_notification_bar_section',
					'settings'    => 'understrap_notification_bar_enable',
					'type'        => 'checkbox',
					'priority'    => 10,
				)
			)
		);

		

		$wp_customize->add_setting(
			'understrap_sidebar_position',
			array(
				'default'           => 'right',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_sidebar_position',
				array(
					'label'             => __( 'Sidebar Positioning', 'understrap' ),
					'description'       => __(
						'Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.',
						'understrap'
					),
					'section'           => 'understrap_theme_layout_options',
					'settings'          => 'understrap_sidebar_position',
					'type'              => 'select',
					'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
					'choices'           => array(
						'right' => __( 'Right sidebar', 'understrap' ),
						'left'  => __( 'Left sidebar', 'understrap' ),
						'both'  => __( 'Left & Right sidebars', 'understrap' ),
						'none'  => __( 'No sidebar', 'understrap' ),
					),
					'priority'          => apply_filters( 'understrap_sidebar_position_priority', 20 ),
				)
			)
		);
	}
} // endif function_exists( 'understrap_theme_customize_register' ).
add_action( 'customize_register', 'understrap_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'understrap_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function understrap_customize_preview_js() {
		wp_enqueue_script(
			'understrap_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'understrap_customize_preview_js' );

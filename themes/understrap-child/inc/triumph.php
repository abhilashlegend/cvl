<?php

// Add Triump post type

/*
{"triumph":{"name":"triumph","label":"Triumphs","singular_label":"Triumph","description":"","public":"true","publicly_queryable":"true","show_ui":"true","show_in_nav_menus":"true","delete_with_user":"false","show_in_rest":"true","rest_base":"","rest_controller_class":"","has_archive":"false","has_archive_string":"","exclude_from_search":"false","capability_type":"post","hierarchical":"false","rewrite":"true","rewrite_slug":"","rewrite_withfront":"true","query_var":"true","query_var_slug":"","menu_position":"","show_in_menu":"true","show_in_menu_string":"","menu_icon":"","supports":["none"],"taxonomies":[],"labels":{"menu_name":"","all_items":"","add_new":"","add_new_item":"","edit_item":"","new_item":"","view_item":"","view_items":"","search_items":"","not_found":"","not_found_in_trash":"","parent_item_colon":"","featured_image":"","set_featured_image":"","remove_featured_image":"","use_featured_image":"","archives":"","insert_into_item":"","uploaded_to_this_item":"","filter_items_list":"","items_list_navigation":"","items_list":"","attributes":"","name_admin_bar":"","item_published":"","item_published_privately":"","item_reverted_to_draft":"","item_scheduled":"","item_updated":""},"custom_supports":""}}
*/

function cptui_register_my_cpts_triumph_form() {

	/**
	 * Post Type: Triumphs_forms.
	 */

	$labels = [
		"name" => __( "Triumphs", "understrap-child" ),
		"singular_name" => __( "Triumph", "understrap-child" ),
	];

	$args = [
		"label" => __( "Triumphs", "understrap-child" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "triumph_form", "with_front" => true ],
		"query_var" => true,
		"supports" => false,
	];

	register_post_type( "triumph_form", $args );
}

add_action( 'init', 'cptui_register_my_cpts_triumph_form' );



/************** Custom fields for Triumph post type ***************************/

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5ea92165ee324',
	'title' => 'Triumph Details',
	'fields' => array(
		array(
			'key' => 'field_5ea9218b9262a',
			'label' => 'Your Name',
			'name' => 'name',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ea921e19262b',
			'label' => 'Your City',
			'name' => 'city',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ea9224f9262c',
			'label' => 'Your State',
			'name' => 'state',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ea9227e9262d',
			'label' => 'Your Zip Code',
			'name' => 'zip_code',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ea922af9262e',
			'label' => 'Your Phone Number',
			'name' => 'phone',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ea923d89262f',
			'label' => 'Your Email Address',
			'name' => 'email',
			'type' => 'email',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_5ea9240f92630',
			'label' => 'Is this story about you?',
			'name' => 'is_this_story_about_you',
			'type' => 'radio',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'yes' => 'Yes',
				'no' => 'No',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5ea924aa92631',
			'label' => 'If it is about someone else, what is their name?',
			'name' => 'if_it_is_about_someone_else_what_is_their_name',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5ea9240f92630',
						'operator' => '==',
						'value' => 'no',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ea9251c92632',
			'label' => 'Describe your story',
			'name' => 'describe_your_story',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => 10,
			'new_lines' => 'wpautop',
		),
		array(
			'key' => 'field_5ea9288c92633',
			'label' => 'Do you have a photo to share?',
			'name' => 'photo',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '.jpg, .gif, .png',
		),
		array(
			'key' => 'field_5ea9293a92634',
			'label' => 'When did this story take place?',
			'name' => 'story_date',
			'type' => 'date_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'm/d/Y',
			'return_format' => 'm/d/Y',
			'first_day' => 1,
		),
		array(
			'key' => 'field_5ea929b892635',
			'label' => 'I give permission to Smarter Sights to share my story with others on its website, in email promotions, in other materials, and on other platforms.',
			'name' => 'permission',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'triumph_form',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;


/* Triumph page */

function cptui_register_my_cpts_triumph() {

	/**
	 * Post Type: Triumph pages.
	 */

	$labels = [
		"name" => __( "Triumph pages", "understrap-child" ),
		"singular_name" => __( "Triumph page", "understrap-child" ),
	];

	$args = [
		"label" => __( "Triumph pages", "understrap-child" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "triumph", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
	];

	register_post_type( "triumph", $args );
}

add_action( 'init', 'cptui_register_my_cpts_triumph' );


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5eb17ef98b5da',
	'title' => 'Location Detail',
	'fields' => array(
		array(
			'key' => 'field_5eb17f1eabd5e',
			'label' => 'Location',
			'name' => 'location',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'Lehigh Valley' => 'Lehigh Valley',
				'Monroe' => 'Monroe',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'triumph',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;


?>
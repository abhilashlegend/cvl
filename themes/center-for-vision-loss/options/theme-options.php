<?php
function attach_main_options_page() {
	$title = "Theme Options";
	add_menu_page(
		$title,
		$title, 
		'edit_themes', 
	    basename(__FILE__),
		create_function('', '')
	);
}
add_action('admin_menu', 'attach_main_options_page');

$header_info = wp_option::factory('text', 'header_info', 'Header Information');
$header_info->set_default_value('Bethlehem <span>610.866.8049</span> Stroudsburg <span>570.992.7787</span>');

$main_navigation = wp_option::factory('choose_pages', 'main_navigation', 'Main Navigation');
$main_navigation->set_default_value(array());
$main_navigation->create_draggable();

$facebook = wp_option::factory('text', 'facebook_url', 'Facebook URL');
$facebook->set_default_value('http://www.facebook.com/');

$twitter = wp_option::factory('text', 'twitter_url', 'Twitter URL');
$twitter->set_default_value('http://www.twitter.com/');

$inner_options = new OptionsPage(array(
	wp_option::factory('separator', 'separator', 'Main'),
	$header_info,
	$main_navigation,
	$facebook,
	$twitter,
	wp_option::factory('separator', 'separator', 'Misc'),
    wp_option::factory('header_scripts', 'header_script'),
    wp_option::factory('footer_scripts', 'footer_script'),
));
$inner_options->title = 'General';
$inner_options->file = basename(__FILE__);
$inner_options->parent = "theme-options.php";
$inner_options->attach_to_wp();

?>
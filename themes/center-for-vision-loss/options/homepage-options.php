<?php
$core_values = wp_option::factory('rich_text', 'core_values', '"Core Values" Content');
$core_values->set_default_value('<h4>Core Values</h4><p>We Believe that individuals affected by vision loss should not have to choose between curtailing activities they once enjoyed and retaiming their independence.</p>');

$location1 = wp_option::factory('rich_text', 'homepage_location1', 'Location 1 Content');
$location1->set_default_value('<h5><a href="#">Allentown Office</a></h5><p>845 West Wyomig Street</p><p>Allentown, PA 18103</p><p>P. 610.433.6018</p><p>F. 610.433.4856</p>');

$location2 = wp_option::factory('rich_text', 'homepage_location2', 'Location 2 Content');
$location2->set_default_value('<h5><a href="#">Stroudsburg Office</a></h5><p>4215 Manor Drive</p><p>Stroudsburg, PA 18360</p><p>P. 570.992.7787</p><p>F. 570.992.7772</p>');

$sponsor1_url = wp_option::factory('text', 'sponsor1_url', 'Sponsor 1 URL');
$sponsor1_url->set_default_value('#');
$sponsor1_image = wp_option::factory('image', 'sponsor1_image', 'Sponsor 1 Image');
$sponsor1_image->set_default_value(get_bloginfo('stylesheet_directory') . '/images/logo1.gif');
$sponsor2_url = wp_option::factory('text', 'sponsor2_url', 'Sponsor 2 URL');
$sponsor2_url->set_default_value('#');
$sponsor2_image = wp_option::factory('image', 'sponsor2_image', 'Sponsor 2 Image');
$sponsor2_image->set_default_value(get_bloginfo('stylesheet_directory') . '/images/logo2.gif');

$opt = new OptionsPage(array(
    $core_values,
    $location1,
    $location2,
    $sponsor1_url,
    $sponsor1_image,
    $sponsor2_url,
    $sponsor2_image,
));
$opt->title = 'Homepage';

$opt->file = basename(__FILE__);
$opt->parent = "theme-options.php";
$opt->attach_to_wp();
?>

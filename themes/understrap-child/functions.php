<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once 'wp-event-manager/field_priority.php';

$understrap_includes = array(
    '/template-tags.php',  
    '/class-wp-bootstrap-navwalker.php', 
    '/triumph.php',
    '/customizer.php',
    '/extras.php'                // Custom template tags for this theme.
                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
    $filepath = locate_template( 'inc' . $file );
    if ( ! $filepath ) {
        trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
    }
    require_once $filepath;
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );


    

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );


/* Function for pagination */
function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation "><ul>' . "\n";
 
    $prev_url = get_previous_posts_page_link();
    

    $prev_link = '<a id="previous-nav" aria-label="previous page" href="' . $prev_url . '">&laquo; Previous Page</a>'; 

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", $prev_link );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
        if(1 == $paged){
            $aria = "current page, page 1";
            $aria_current = 'aria-current="true"';
        } else {
            $aria = "page 1";
            $aria_current = '';
        }
 
        printf( '<li%s><a aria-label="%s" %s href="%s">%s</a></li>' . "\n", $class, $aria, $aria_current, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        if($paged == $link){
            $aria = "current page, page " . $link;
            $aria_current = 'aria-current="true"';
        } else {
            $aria = "page " . $link . " of " . $max;
            $aria_current = '';
        }
        printf( '<li%s><a aria-label="%s" %s href="%s">%s</a></li>' . "\n",  $class, $aria, $aria_current,  esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        if($paged == $max){
            $aria = "current page, page " . $link;
            $aria_current = 'aria-current="true"';
        } else {
            $aria = "page " . $max;
            $aria_current = "";
        }
        printf( '<li%s><a aria-label="%s" %s href="%s">%s</a></li>' . "\n", $class, $aria, $aria_current, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */

    $next_url = get_next_posts_page_link();
    

    $next_link = '<a id="next-nav" aria-label="next page" href="' . $next_url . '">Next Page &raquo;</a>'; 


    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", $next_link );
 
    echo '</ul></div>' . "\n";
 
}


function get_number_of_posts_on_page() {
    global $wp_query;
    $page = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $ppp = get_query_var('posts_per_page');
    $end = $ppp * $page;
    $start = $end - $ppp + 1;
    $total = $wp_query->found_posts;
    echo "Showing <strong>$start</strong> to <strong>$end</strong> of $total posts";
}

function posts_link_next_class($format){
     $format = str_replace('href=', 'class="btn btn-navigation" href=', $format);
     return $format;
}
add_filter('next_post_link', 'posts_link_next_class');

function posts_link_prev_class($format) {
     $format = str_replace('href=', 'class="btn btn-navigation" href=', $format);
     return $format;
}
add_filter('previous_post_link', 'posts_link_prev_class');


function searchfilter($query) {
    if ($query->is_search && !is_admin() && $_GET['post_type'] == 'events') {
        $query->set('post_type',array('event'));
    } 
    else if ($query->is_search && !is_admin() && $_GET['post_type'] == 'triumph') {
        $query->set('post_type',array('triumph'));
    } 
    else if($query->is_search && !is_admin())
       {
           $query->set('post_type',array('post'));
       } 

 
return $query;
}
 
add_filter('pre_get_posts','searchfilter');

function wp_nav_parent_class( $classes, $item ) {

    if( is_singular('event_listing') && $item->title == "Events" || in_array('current-menu-item', $classes) && $item->title == "Events")
        array_push($classes, 'active');

    if( is_singular('post') && $item->title == "News" || in_array('current-menu-item', $classes) && $item->title == "News")
        array_push($classes, 'active');

    return $classes;
}
add_filter('nav_menu_css_class', 'wp_nav_parent_class', 10, 2);


// Removes donation summary in campaign page
function ed_unhook_default_template_functions() {

remove_action( 'charitable_campaign_summary', 'charitable_template_campaign_percentage_raised', 4 );
remove_action( 'charitable_campaign_summary', 'charitable_template_campaign_donation_summary', 6 );
remove_action( 'charitable_campaign_summary', 'charitable_template_campaign_donor_count', 8 );
}

add_action( 'after_setup_theme', 'ed_unhook_default_template_functions', 11 );


function ed_charitable_register_apply_donate_to_field() {

    /**
     * Define a new text field.
     */
    $field = new Charitable_Donation_Field( 'gift_in_honor', array(
        'label' => __( 'Is this gift in honor of, or in memory of, someone? If so, please list that person or group here', 'charitable' ),
        'data_type' => 'user',
        'donation_form' => array(
            'show_after' => 'phone',
            'required'   => false,
        ),
        'admin_form' => true,
        'show_in_meta' => true,
        'show_in_export' => true,
        'email_tag' => array(
            'description' => __( 'Is this gift in honor of, or in memory of, someone? If so, please list that person or group here: ' , 'charitable' ),
        ),
    ) );

    /**
     * Register the field.
     */
    charitable()->donation_fields()->register_field( $field );


    /**
     * Define a new text field.
     */
    $field = new Charitable_Donation_Field( 'apply_donate_to', array(
        'label' => __( 'Apply donate to', 'charitable' ),
        'data_type' => 'user',
        'donation_form' => array(
            'show_after' => 'phone',
            'required'   => false,
            'type' => 'radio',
            'options' => array('General','Lehigh Valley','Monroe'),
            'default' => '0'
        ),
        'admin_form' => true,
        'show_in_meta' => true,
        'show_in_export' => true,
        'email_tag' => array(
            'description' => __( 'Apply donate to: ' , 'charitable' ),
        ),
    ) );

    /**
     * Register the field.
     */
    charitable()->donation_fields()->register_field( $field );
}

add_action( 'init', 'ed_charitable_register_apply_donate_to_field' );


add_filter( 'body_class', 'notification_gap' );
function notification_gap( $classes ) {
    $enabled = get_theme_mod('understrap_notification_bar_enable', false);
    if ( $enabled ) {
        $classes[] = 'notification-gap';
    }
    return $classes;
}



/** You need to put code in theme functions.php **/
function theme_name_custom_orderby( $query_args ) {
    $query_args[ 'orderby' ] = 'meta_value'; //orderby will be according to data stored inside the particular meta key
    $query_args[ 'order' ] = 'DESC';
    return $query_args;
}

add_filter( 'event_manager_get_listings_args', 'theme_name_custom_orderby', 99 );

function theme_name_custom_orderby_query_args( $query_args ) {
    $query_args[ 'meta_key' ] = '_event_start_date'; //here you can change your meta key
    return $query_args;
}

add_filter( 'get_event_listings_query_args', 'theme_name_custom_orderby_query_args', 99 );

?>

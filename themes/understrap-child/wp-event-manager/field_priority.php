<?php
/* Admin Add Event field(s) priority hooks */

add_filter( 'event_manager_event_listing_data_fields', 'admin_add_organizer_name' );

function admin_add_organizer_name( $fields ) {
  $fields['_organizer_name'] = array(
    'label'       => __( 'Organization name', 'event_manager' ),
    'type'        => 'text',
    'placeholder' => 'Enter the name of the organization',
    'priority'    => 1 ,
    'description' => ''
  );
  return $fields;
}


add_filter( 'event_manager_event_listing_data_fields', 'admin_add_organizer_logo' );

function admin_add_organizer_logo( $fields ) {
  $fields['_organizer_logo'] = array(
    'label'       => __( 'Logo', 'event_manager' ),
    'type'        => 'text',
    'priority'    => 2 ,
    'description' => ''
  );
  return $fields;
}


add_filter( 'event_manager_event_listing_data_fields', 'admin_add_organizer_description' );

function admin_add_organizer_description( $fields ) {
  $fields['_organizer_description'] = array(
    'label'       => __( 'Organizer Description', 'event_manager' ),
    'type'        => 'textarea',
    'priority'    => 3 ,
    'description' => ''
  );
  return $fields;
}

add_filter( 'event_manager_event_listing_data_fields', 'admin_add_organizer_email' );

function admin_add_organizer_email( $fields ) {
  $fields['_organizer_email'] = array(
    'label'       => __( 'Organization Email', 'event_manager' ),
    'type'        => 'text',
    'priority'    => 5 ,
    'description' => ''
  );
  return $fields;
}


add_filter( 'event_manager_event_listing_data_fields', 'admin_add_event_venue_name' );

function admin_add_event_venue_name( $fields ) {
  $fields['_event_venue_name'] = array(
    'label'       => __( 'Venue Name', 'event_manager' ),
    'type'        => 'text',
    'priority'    => 4 ,
    'description' => ''
  );
  return $fields;
}

add_filter( 'event_manager_event_listing_data_fields', 'admin_add_event_address' );

function admin_add_event_address( $fields ) {
  $fields['_event_address'] = array(
    'label'       => __( 'Event Address', 'event_manager' ),
    'type'        => 'text',
    'priority'    => 5 ,
    'description' => ''
  );
  return $fields;
}

add_filter( 'event_manager_event_listing_data_fields', 'admin_add_organizer_website' );

function admin_add_organizer_website( $fields ) {
  $fields['_organizer_website'] = array(
    'label'       => __( 'Website', 'event_manager' ),
    'type'        => 'text',
    'priority'    => 6 ,
    'description' => ''
  );
  return $fields;
}

add_filter( 'event_manager_event_listing_data_fields', 'admin_add_organizer_twitter' );

function admin_add_organizer_twitter( $fields ) {
  $fields['_organizer_twitter'] = array(
    'label'       => __( 'Twitter', 'event_manager' ),
    'type'        => 'text',
    'priority'    => 7 ,
    'description' => ''
  );
  return $fields;
}

add_filter( 'event_manager_event_listing_data_fields', 'admin_add_organizer_youtube' );

function admin_add_organizer_youtube( $fields ) {
  $fields['_organizer_youtube'] = array(
    'label'       => __( 'Youtube', 'event_manager' ),
    'type'        => 'text',
    'priority'    => 8 ,
    'description' => ''
  );
  return $fields;
}

add_filter( 'event_manager_event_listing_data_fields', 'admin_add_organizer_facebook' );

function admin_add_organizer_facebook( $fields ) {
  $fields['_organizer_facebook'] = array(
    'label'       => __( 'Facebook', 'event_manager' ),
    'type'        => 'text',
    'priority'    => 10 ,
    'description' => ''
  );
  return $fields;
}

?>
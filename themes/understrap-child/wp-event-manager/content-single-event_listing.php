<?php
global $post;
$start_date = get_event_start_date();
$end_date = get_event_end_date();
wp_enqueue_script('wp-event-manager-slick-script');
wp_enqueue_style('wp-event-manager-slick-style');
do_action('set_single_listing_view_count');
?>


	<div class="wpem-main wpem-single-event-page">	<?php if (get_option('event_manager_hide_expired_content', 1) && 'expired' === $post->post_status): ?>
		<div class="event-manager-info wpem-alert wpem-alert-danger" ><?php _e('This listing has been expired.', 'wp-event-manager');?></div>
		<?php else: ?>
			<?php if (is_event_cancelled()): ?>
              <div class="wpem-alert wpem-alert-danger">
              	<span class="event-cancelled" itemprop="eventCancelled"><?php _e('This event has been cancelled', 'wp-event-manager');?></span>
			  </div>
            <?php elseif (!attendees_can_apply() && 'preview' !== $post->post_status): ?>
               <div class="wpem-alert wpem-alert-danger">
               	<span class="listing-expired" itemprop="eventExpired"><?php _e('Registrations have closed', 'wp-event-manager');?></span>
               </div>
	        <?php endif;?>
		<?php
/**
 * single_event_listing_start hook
 */
do_action('single_event_listing_start');
?>			 
				 <?php
				 $featured_image = get_post_meta($post->ID, "_featured_image", true);
$event_banners = get_event_banner();
if ($featured_image) :
?>		 
 	<div class="wpem-event-single-image-wrapper">
			<div class="wpem-event-single-image"><img src="<?php echo $featured_image; ?>" alt="" class="img-fluid" /></div>
		</div>
 <?php endif;?>		
				
			
			     <div class="entry-content mt-4">      
               	<?php echo get_the_content(); ?>
               </div>
 
  <?php endif;?>

<!-- override the script if needed -->



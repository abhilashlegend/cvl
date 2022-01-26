<?php
/**
 * The template for displaying all single posts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper pt-0" id="main_content" role="main">

	<?php
		global $post;

		

		$post_type = get_post_type($post->ID); 	
		$address = get_post_meta($post->ID, "_event_address", true); 	
		$event_date = get_post_meta($post->ID, "_event_start_date", true);
		$event_date = date("D, F d, Y", strtotime($event_date));
		$event_start_time = get_post_meta($post->ID, "_event_start_time", true);
		$event_end_time = get_post_meta($post->ID, "_event_end_time", true);
		$top_sponsors = get_post_meta($post->ID, "_top_sponsor(s)", true);
		$event_banner = get_post_meta($post->ID, "_event_banner", true);

		if($post_type == "event_listing"):
	?>
	<div class="event-banner" style="background: url(<?php echo $event_banner; ?>) no-repeat #285598; background-size: cover;">
		
			<div class="container">
					<div class="row" >
		              <div class="text-center col-md-12 hero-content v-center">
						 <h1 class="text-center"><?php echo $post->post_title; ?></h1>
					  </div>
					</div>
			</div>
		
	</div>

	<?php endif; ?>
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
	<?php
		if($post_type == "event_listing"):
	?>
		<div class="row event-dtl">
			<div class="col-md-4 v-center">
				<i class="fa fa-map-marker event-icn" aria-hidden="true"></i>
				<div class="event-meta"><?php echo $address; ?></div>
			</div>

			<div class="col-md-4 v-center h-center">
				<i class="fa fa-calendar event-icn" aria-hidden="true"></i>
				<div class="event-meta"><?php echo $event_date; ?></div>
			</div>

			<div class="col-md-4 v-center h-right">
				<i class="fa fa-clock-o event-icn" aria-hidden="true"></i>
				<div class="event-meta" aria-hidden="true"><?php echo date("g:i a", strtotime($event_start_time)) . " - " . date("g:i a", strtotime($event_end_time)); ?></div>
				<span class="sr-only"><?php echo date("g:i a", strtotime($event_start_time)) . " to " . date("g:i a", strtotime($event_end_time)); ?></span>

			</div>
		</div>
	<?php endif; ?>
		<div class="row">

			
			<div class="col-md-8">

				<main class="site-main">

					<?php while ( have_posts() ) : the_post(); ?>
						<?php if($post_type == "event_listing"): ?>
							<?php get_template_part( 'loop-templates/content', 'event' ); ?>
							<?php  if(!empty($top_sponsors)): ?>
							<div class="row">
								<div class="col-sm-12">
									<strong>Top Sponsors:</strong> <?php echo $top_sponsors; ?>
								</div>
							</div>
						<?php endif; ?>
						<?php else: ?>
							<?php get_template_part( 'loop-templates/content', 'single' ); ?>
						<?php endif; ?>
						<?php
						if($post_type == "post"): 
						understrap_post_nav_custom(); 
						endif;
						?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->
			</div>
			<div class="col-md-4">
				<?php
					if($post_type == "event_listing"):
				?>

					<?php display_event_details_on_siderbar($post->ID); ?>

					<?php display_latest_events_on_siderbar(); ?>
					

				<?php else: ?>
				<!-- Do the right sidebar check -->

				

				<div class="blog-sidebar">
					<?php  display_latest_news_on_siderbar(); ?>
					<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>
						
				</div>
				<?php endif; ?>
			</div>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php get_footer();

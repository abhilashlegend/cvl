<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>



<div class="wrapper" id="main_content" role="main">

<?php if ( is_front_page() ) : ?>

<div id="content">
	<div class="banner-heading">
		<div class="container">
				<div class="row" >
	              <div class="text-left  col-sm-7 col-md-7 col-xs-6 hero-content v-center">
					<div style="">
					<?php 
						/*
						 $query = new WP_Query( 'pagename=home' );
						  $post_id = get_the_ID();	
						 $heading = get_post_meta($post_id, "heading", true);
						 $sub_heading = get_post_meta($post_id, "sub_heading", true);
						 $button_label = get_post_meta($post_id, "button_label", true);	
						 $button_link = get_post_meta($post_id, "button_link", true);	
						 $button_aria_label = get_post_meta($post_id, "button_aria_label", true);
						  <span class="hero-heading"><?php echo $heading; ?> </span>
	                <h1 class="h1style"><?php echo $sub_heading; ?></h1>
	                <a class="btn learn-more-btn" href="<?php echo $button_link; ?>" role="button" 	aria-label="<?php echo $button_aria_label; ?>"><?php echo $button_label; ?></a>
						 */
					?>	
	               
	                </p>
	            	</div>
	              </div>
              	</div> <!-- End of row -->
            </div> <!-- ENd of container -->
	</div>

	<?php // get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>



<?php if ( is_front_page() ) :					

		bmg_display_about_section();

		bmg_display_services_section();

		bmg_display_locations_section();

		bmg_display_our_progress_section();

		

		bmg_display_news_events_section();

		bmg_display_featured_event_banner();

		bmg_display_upcoming_events_section();

		bmg_display_who_support_us_section();

		echo "</div>";
 endif; 
 ?>
<?php if ( !is_front_page() ) : ?>

<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main">

				


				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

<?php endif; ?>

</div><!-- #page-wrapper -->

<?php get_footer();

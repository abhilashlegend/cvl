<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<footer role="footer" id="footer_main">
<div id="wrapper_footer" class="wrapper-footer">

	<div class="container-fluid footer-container">

		<div class="row pt-2">

			<div class="col">
				
				
					<div class="footer-title">Who We Are</div>
					<ul class="footer-links">
						<li><a href="<?php echo get_site_url(null, '/about/'); ?>">About Our Agency</a></li>
						<li><a href="<?php echo get_site_url(null, '/funding/'); ?>">Our Funding</a></li>
						<li><a href="<?php echo get_site_url(null, '/people/'); ?>">Our People</a></li>
						<li><a href="<?php echo get_site_url(null, '/board/'); ?>">Our Board of Directors</a></li>
						<li><a href="<?php echo get_site_url(null, '/history/'); ?>">Our History</a></li>
<li><a href="<?php echo get_site_url(null, '/news/'); ?>">Our News and Ideas</a></li>
					</ul>
							

			</div><!--col end -->

			<div class="col">
				
				
					<div class="footer-title">What We Do</div>
					<ul class="footer-links">
						<li><a href="<?php echo get_site_url(null, '/our-locations/'); ?>">Our Locations</a></li>
						<li><a href="<?php echo get_site_url(null, '/support-services/'); ?>">Our Support Services</a></li>
						<li><a href="<?php echo get_site_url(null, '/rehabilitation-services/'); ?>">Our Rehabilitation Services</a></li>
						<li><a href="<?php echo get_site_url(null, '/prevention/'); ?>">Our Prevention Services</a></li>
						<li><a href="<?php echo get_site_url(null, '/client-qualifications/'); ?>">Our Client Qualifications</a></li>
						<li><a href="<?php echo get_site_url(null, '/bulletins/'); ?>">Our Activity Bulletins</a></li>
						<li><a href="<?php echo get_site_url(null, '/inclusion/'); ?>">Our Inclusion Policy</a></li>
						<li><a href="<?php echo get_site_url(null, '/events/'); ?>">Our Calendar</a></li>
						<li><a href="<?php echo get_site_url(null, '/triumphs/'); ?>">Our Triumphs</a></li>
						<li><a href="<?php echo get_site_url(null, '/measures/'); ?>">Our Key Measures</a></li>

					</ul>

			</div><!--col end -->

			<div class="col">
				
				<div class="footer-title">Request Service</div>
				<ul class="footer-links">
                                                <li><a href="<?php echo get_site_url(null, '/signup/'); ?>">Sign Up for a Program or Activity</a></li>
						<li><a href="<?php echo get_site_url(null, '/request-consultation/'); ?>">Request a Consultation</a></li>
						<li><a href="<?php echo get_site_url(null, '/request-transport/'); ?>">Request a Transport Ride</a></li>
						<li><a href="<?php echo get_site_url(null, '/request-low-vision-care/'); ?>">Request Low Vision Care</a></li>
						<li><a href="<?php echo get_site_url(null, '/request-prevention-service/'); ?>">Request a Prevention Service</a></li>
						<li><a href="<?php echo get_site_url(null, '/speaker/'); ?>">Request a Guest Speaker</a></li>
				</ul>
				<br>
<div class="footer-title">Find More</div>
				<ul class="footer-links">

		                            <li><a href="<?php echo get_site_url(null, '/ourvideos/'); ?>">Our Learning Videos</a></li>				
				<li><a href="<?php echo get_site_url(null, '/resources/'); ?>">Links to Indpendence</a></li>
<li><a href="<?php echo get_site_url(null, '/signs/'); ?>">Signs of Vision Loss</a></li>

	
				</ul>
			</div><!--col end -->

			<div class="col">
				<div class="footer-title">Give Back</div>
				<ul class="footer-links">
					    <li><a href="<?php echo get_site_url(null, '/campaigns/make-a-gift/'); ?>">Give to Our Annual Fund</a></li>
						<li><a href="<?php echo get_site_url(null, '/society/'); ?>">Join Our 20/20 Society</a></li>	
                                             <li><a href="<?php echo get_site_url(null, '/make-a-stock-gift/'); ?>">Make a Stock Gift</a></li>
						<li><a href="<?php echo get_site_url(null, '/amazon-smile/'); ?>">Shop with Amazon Smile</a></li>
					    <li><a href="<?php echo get_site_url(null, '/cars/'); ?>">Donate Your Vehicle</a></li>
					    <li><a href="<?php echo get_site_url(null, '/gift-in-will/'); ?>">Make a Gift in Your Will</a></li>
					    <li><a href="<?php echo get_site_url(null, '/sweepstakes/'); ?>">Enter Our Sweepstakes</a></li>	
                                            <li><a href="<?php echo get_site_url(null, '/ourevents/'); ?>">Support Our Events</a></li>
                                           <li><a href="<?php echo get_site_url(null, '/lions/'); ?>">Support Our Lions Campaign</a></li>
                                            <li><a href="<?php echo get_site_url(null, '/endowment/'); ?>">Support Our Endowment</a></li>

						<li><a href="<?php echo get_site_url(null, '/volunteer/'); ?>">Become a Volunteer</a></li>
					   		
						
						<li><a href="<?php echo get_site_url(null, '/share-a-triumph/'); ?>">Share a Triumph</a></li>

						
				</ul>	

			</div>

			<div class="col">
				<div class="footer-title">Lehigh Valley Campus</div>
				<p style="color:#FFFFFF;">845 West Wyoming St.<br>
				Allentown, PA 18103<br>
				610.433.6018<br>
<b><a href="https://goo.gl/maps/GdCuBxCuBsKDUoPM9/" target="_blank">Get Directions</a></b></p>

				<div class="footer-title">Monroe Campus</div>
				<p style="color:#FFFFFF;">4215 Manor Drive<br>
				Stroudsburg, PA 18360<br>
				570.992.7787<br>
				<b><a href="https://goo.gl/maps/88ddbGs6Vf597Gpo8/" target="_blank">Get Directions</a></b>
			</div>

</div>
				





		<div class="row mt-4 pb-2">
			
			<div class="col-md-12 footer-hrz">
				<ul class="footer-hrz-mnu">
					<li><a href="<?php echo get_site_url(null, '/careers/'); ?>">Join Our Team</a></li>
					<li><a href="<?php echo get_site_url(null, '/contact-us/'); ?>">Contact Us</a></li>
					<li><img src="<?php echo get_stylesheet_directory_uri();?>/img/white_asx_logo_footer.png" class="asx-white-logo" alt="" /><a href="<?php echo get_site_url(null, '/accessibility/'); ?>">Accessibility</a></li>
					<li><a href="<?php echo get_site_url(null, '/privacy/'); ?>">Privacy</a></li>
<li><a href="<?php echo get_site_url(null, '/reports/'); ?>">Our Reports</a></li>

					<li><a href="https://insider.cureo.com/159411bc-2eba-4ec1-8ea9-d029f855333b/4336eda0-01cd-439b-8705-2be9d5e5d839/!main/app/file/list/" target="_blank">Board Portal</a></li>

					<?php

				 		$facebook = get_theme_mod('understrap_facebook_link', '#');

				 		$instagram = get_theme_mod('understrap_instagram_link', '#');

				 		$twitter = get_theme_mod('understrap_twitter_link', '#');

				 		$youtube = get_theme_mod('understrap_youtube_link', '#');

				 	?>

					<ul class="footer-social-links">
							<li><a href="<?php echo $facebook; ?>" target="_blank" aria-label="facebook link"><i class="fa fa-facebook-f"></i></a></li>
							<li><a href="<?php echo $instagram; ?>" target="_blank" aria-label="instagram link"><i class="fa fa-instagram"></i></a></li>
							<li><a href="<?php echo $twitter; ?>" target="_blank" aria-label="twitter link"><i class="fa fa-twitter"></i></a></li>
							<li><a href="<?php echo $youtube; ?>" target="_blank" aria-label="twitter link"><i class="fa fa-youtube"></i></a></li>
					</ul>
				</ul>


				</div>
		
		</div>

	</div><!-- container end -->

</div><!-- wrapper end -->
<div class="footer-bottom">
	<small class="text-muted">© Copyright <?php echo date("Y"); ?> Center for Vision Loss, Inc. All Rights Reserved.</small>

</div>
</footer>
</div><!-- #page we need this extra closing tag here -->

<?php
	$enabled = get_theme_mod('understrap_notification_bar_enable', false);
	$notification = get_theme_mod('understrap_notification_bar_content');

	$page = get_theme_mod('understrap_notification_bar_modal');

	$page = 'page_id=' . $page;

	 $query = new WP_Query( $page );

	if($enabled):
?>
<div class="understrap-notification-bar" data-toggle="modal" data-target="#notificationModal">
	<h2><?php echo $notification; ?></h2>
</div>

<?php 
	
	  while ( $query->have_posts() ) : $query->the_post();

?>
<!-- Modal -->
<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $modal_title = get_the_title(); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $modal_content =  get_the_content(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php 
endwhile;
wp_reset_postdata(); 
?>

<?php endif; ?>

<?php wp_footer(); ?>
<script src="https://connect.facebook.net/en_US/all.js" async></script>

</body>

</html>
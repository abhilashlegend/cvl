<?php
/**
 * The template for displaying sitemap.
 *
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="main_content" role="main">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
				
				<div class="col-sm-12">
						<h1 class="page-title">Sitemap</h1>

						
				</div>
		</div>

		<div class="row">
			<div class="col-sm-4">
				<ul>
					<li>Who We Are</li>
					<ul>
						<li><a href="<?php echo get_site_url(null, '/about-our-agency/'); ?>">About our agency</a></li>
						<li><a href="<?php echo get_site_url(null, '/our-funding/'); ?>">Our Funding</a></li>
						<li><a href="<?php echo get_site_url(null, '/our-people/'); ?>">Our People</a></li>
						<li><a href="<?php echo get_site_url(null, '/news/'); ?>">Our News and Ideas</a></li>
						<li><a href="<?php echo get_site_url(null, '/our-reports-and-disclosures/'); ?>">Our Reports and Disclosures</a></li>
						<li><a href="<?php echo get_site_url(null, '/events/'); ?>">Our Calendar</a></li>
					</ul>
				</ul>
			</div>

			<div class="col-sm-4">
				<ul>
					<li>What We Do</li>
					<ul>
						<li><a href="<?php echo get_site_url(null, '/wellness-services/'); ?>">Wellness Services</a></li>
						<li><a href="<?php echo get_site_url(null, '/abilities-services/'); ?>">Abilities Services</a></li>
						<li><a href="<?php echo get_site_url(null, '/client-qualifications/'); ?>">Client Qualifications</a></li>
						<li><a href="<?php echo get_site_url(null, '/client-activity-bulletins/'); ?>">Client Activity Bulletins</a></li>
						<li><a href="<?php echo get_site_url(null, '/prevention-services/'); ?>">Prevention Services</a></li>
						<li><a href="<?php echo get_site_url(null, '/diversity-and-inclusion-policy/'); ?>">Diversity and Inclusion Policy</a></li>
					</ul>
				</ul>
			</div>

			<div class="col-sm-4">
				<ul>
					<li>Triumph Stories</li>
					<ul>
						<li><a href="#">Lehigh Valley Triumphs</a></li>
						<li><a href="#">Monroe Triumphs</a></li>						
					</ul>
				</ul>
			</div>
		</div>


		<div class="row">
			<div class="col-sm-4">
				<ul>
					<li>Engage</li>
					<ul>
						<li><a href="<?php echo get_site_url(null, '/client-activity-bulletins/'); ?>">Become a Volunteer</a></li>
						<li><a href="<?php echo get_site_url(null, '/share-a-triumph/'); ?>">Share a Triumph</a></li>	
						<li><a href="<?php echo get_site_url(null, '/our-sweepstakes/'); ?>">Enter Our Sweepstakes</a></li>	
						<li><a href="<?php echo get_site_url(null, '/take-part-in-our-events/'); ?>">Take Part in Our Events</a></li>						
					</ul>
				</ul>
			</div>

			<div class="col-sm-4">
				<ul>
					<li>Give</li>
					<ul>
						<li><a href="#">Give to the Smarter Sights Fund</a></li>
						<li><a href="<?php echo get_site_url(null, '/make-a-stock-gift/'); ?>">Make a Stock Gift</a></li>	
						<li><a href="<?php echo get_site_url(null, '/join-our-20-20-society/'); ?>">Join Our 20/20 </a></li>	
						<li><a href="<?php echo get_site_url(null, '/join-our-lions-needs-campaign/'); ?>">Join Our Lions Needs Campaign</a></li>
						<li><a href="<?php echo get_site_url(null, '/make-a-gift/'); ?>">Make a Gift in Your Will</a></li>
						<li><a href="#">Support Our Endowment</a></li>
						<li><a href="<?php echo get_site_url(null, '/our-donor-policies/'); ?>">See Our Donor Policies</a></li>						
					</ul>
				</ul>
			</div>

			<div class="col-sm-4">
				
					<ul>
					
						<li><a href="<?php echo get_site_url(null, '/join-our-team/'); ?>">Join Our Team</a></li>	
						<li><a href="<?php echo get_site_url(null, '/contact-us/'); ?>">Contact Us</a></li>	
						<li><a href="<?php echo get_site_url(null, '/privacy-policy/'); ?>">Privacy Policy</a></li>
						<li><a href="<?php echo get_site_url(null, '/sitemap/'); ?>">Site Map</a></li>
						<li><a href="<?php echo get_site_url(null, '/activities-and-classes/'); ?>">Activities and classes</a></li>						
					</ul>
				
			</div>
		</div>
			
	</div>	

</div>



<?php get_footer(); ?>
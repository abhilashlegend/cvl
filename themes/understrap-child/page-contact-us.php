<?php
/**
 * The template for displaying contact us.
 *
 *
 * @package understrap
 */

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>
<div class="wrapper" id="main_content" role="main">


	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="page-title">Contact Us</h1>
				</div>
			</div>

			
					<p>Thank you for your interest in the Sights for Hope. If you would like to receive more information about our programs and services or ask a question, please complete the form below. Please note that we respect your privacy and do not provide your information to any outside organization.
					</p>
				&nbsp;
						<?php 

						echo do_shortcode("[asx_forms Id='1']"); 

						?>

						

	</div>
</div>

<?php get_footer();

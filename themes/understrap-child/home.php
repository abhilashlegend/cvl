<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$gridview = false;
$listview = false;

if(isset($_COOKIE["gridview"])) {
	$gridview = $_COOKIE["gridview"];
}
else if(isset($_COOKIE["listview"])) {
	$listview = $_COOKIE["listview"];		
} else {
	$listview = true;
	$gridview = false;
}



if(isset($_GET['grid-view'])) {	
	setcookie("gridview", true, time()+30*24*60*60);
	setcookie("listview", "", time()-3600);
	$listview = false;
	$gridview = true;
}

if(isset($_GET['list-view'])) {
	setcookie("listview", true, time()+30*24*60*60);
	setcookie("gridview", "", time()-3600);
	$gridview = false;
	$listview = true;
}


get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="main_content" role="main">


	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<?php
		if ( !is_front_page() && is_home() ) { ?>
			<div class="row">
				<div class="col-sm-6">
					<img src="<?php echo get_stylesheet_directory_uri();?>/img/man-with-laptop.png" class="img-fluid" alt="" />
				</div>
				<div class="col-sm-6">
					<h1 class="subscribe-box-title">Keep Current!</h1>
					<p class="subscribe-box-note">If you wish to keep up-to-date with Sights for Hope news, please share your e-mail address with us.</p>
					<?php
						echo do_shortcode( '[rainmaker_form id="64"]' );
					?>
				</div>
			</div>
		<?php } ?>

		

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
		
			<main class="site-main">
				<?php
					if ( !is_front_page() && is_home() ) { ?>

				<div class="row mt-4">
					<div class="col-sm-12">		
						<h1 class="subscribe-box-title">Our News and Ideas</h1>
					</div>
				</div>		

				<div class="row mt-4">		
					<div class="col-sm-6 post-count">
						<?php get_number_of_posts_on_page(); ?>
					</div>
					<div class="col-sm-6 text-right">
						

						<form class="form-inline pull-right ml-1"  action="<?php echo home_url( '/' ); ?>" role="search" method="get">
					      <div class="input-group">
		                      <label for="s" class="sr-only">Search</label>
		                      <input type="text" class="form-control search-text" name="s" placeholder="Search News" id="s">
		                      <i class="fa fa-search search-icn"></i>
		                      
		                    </div>
					    </form>

					    <form class="pull-right">
							<div class="input-group">
						<button class="view-ctrl <?php echo ($gridview == true) ? 'active' : ''; ?>" name="grid-view" value="1" aria-label="grid view"><i class="fa fa-th" aria-hidden="true"></i></button>
						<button class="view-ctrl <?php echo ($listview == true) ? 'active' : ''; ?>" name="list-view" value="1" aria-label="list view"><i class="fa fa-list" aria-hidden="true"></i></button>
							 </div>
						</form>

					</div>
				</div>

			<div class='card-deck mt-5'>
			<?php } ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
					if ( !is_front_page() && is_home() ) {
 							 // blog page
								if($gridview) {
										get_template_part( 'loop-templates/content','blog-gridview' );
								}
								else if($listview) {
										get_template_part( 'loop-templates/content','blog-listview' );
								}		
								else {
									get_template_part( 'loop-templates/content','blog-listview' );				
								}
							
							
						} else {
							 get_template_part( 'loop-templates/content', 'page' ); 
							}
					?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>
				<?php
					if ( !is_front_page() && is_home() ) { ?> 
					</div>
					<?php wpbeginner_numeric_posts_nav(); ?>
				<?php } ?>
			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>

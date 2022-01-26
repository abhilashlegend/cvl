<?php
/**
 * Single post partial template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post_<?php the_ID(); ?>">

	<header class="entry-header mb-3">

		<?php the_title( '<h1 class="entry-title mt-4">', '</h1>' ); ?>

		<div class="entry-meta">
			
			<?php understrap_posted_on(); ?>

			<span class="social-sharing-block">
				<span class="mr-3">Share:</span>
				<a class="icon-fb mr-3" href="https://www.facebook.com/sharer/sharer.php?u='<?php echo $permalink; ?>'" target="_blank"><i class="fa fa-facebook"></i></a>
			
			<a class="icon-twitter" href="https://twitter.com/intent/tweet?text='<?php echo $title . '&amp;url=' . $permalink; ?>'" target="_blank"><i class="fa fa-twitter"></i></a>
			</span> 

		</div><!-- .entry-meta -->
		<?php
	$location =   get_post_meta($post->ID, 'location', true);

	?>

	<?php if($location): ?>
		<div class="entry-meta">
			Location: <?php echo $location; ?>
		</div>
	<?php endif; ?>
		
	</header><!-- .entry-header -->
	
	<div class="featured-img mb-3">
	<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
	</div>
	

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

<?php
/**
 * Single post partial template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$permalink = get_permalink(get_the_ID());
$title = get_the_title();
?>

<article <?php post_class(); ?> id="post_<?php the_ID(); ?>">

	<header class="entry-header event-header">

		<h1 class="event-page-header"></h1>
		<div class="social-sharing-block">
			<span class="icon-fb mr-3" id="fb_share" data-url="<?php display_event_permalink();?>"><i class="fa fa-facebook" aria-label="facebook"></i></span>
			
			<a class="icon-twitter" href="https://twitter.com/intent/tweet?text=<?php echo $title . '&amp;url=' . $permalink; ?>" target="_blank"><i class="fa fa-twitter" aria-label="twitter"></i></a>
		</div>	

	</header><!-- .entry-header -->


	<div class="entry-content mt-4">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

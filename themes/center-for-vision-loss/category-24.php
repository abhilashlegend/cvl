<?php get_header();global $wpdb; ?>

<!-- Begin Head-->
<div id="head">&nbsp;</div>
<!-- End Head-->
<!-- Begin Main -->
<div id="main">
	<div class="cl">&nbsp;</div>
	<!-- Begin Content -->
	<div id="content">
		<?php if (have_posts()) : ?>
			<h2>
				<?php if (is_category()) { ?>
					<?php single_cat_title(); ?>
				<?php } elseif( is_tag() ) { ?>
					Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;
				<?php } elseif (is_day()) { ?>
					Archive for <?php the_time('F jS, Y'); ?>
				<?php } elseif (is_month()) { ?>
					Archive for <?php the_time('F, Y'); ?>
				<?php } elseif (is_year()) { ?>
					Archive for <?php the_time('Y'); ?>
				<?php } elseif (is_author()) { ?>
					Author Archive
				<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					Blog Archives
				<?php } ?>
			</h2>
			<?php while (have_posts()) : the_post(); ?>
			<?php $i = $wpdb->get_row("select * from $wpdb->posts where post_type='attachment' and post_parent=$post->ID limit 1"); ?>
				<h3><a href="<?php echo $i->guid; ?>" target="_blank"><?php the_title(); ?></a></h3>
				<div class="cl" style="height: 20px;">&nbsp;</div>
			<?php endwhile; ?>
			
			<?php $page = 857;$p = get_page($page); ?>
			<?php echo apply_filters('the_content',$p->post_content); ?>
			
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
			</div>
		<?php else :
			if ( is_category() ) { // If this is a category archive
				printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
			} else if ( is_date() ) { // If this is a date archive
				echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
			} else if ( is_author() ) { // If this is a category archive
				$userdata = get_userdatabylogin(get_query_var('author_name'));
				printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
			} else {
				echo("<h2 class='center'>No posts found.</h2>");
			}
			get_search_form();
			endif;
		?>
	</div>
	<!-- End Content -->
	<?php get_sidebar(); ?>
</div>
<!-- End Main -->

<?php get_footer(); ?>
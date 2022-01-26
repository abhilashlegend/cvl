<?php get_header(); ?>

<!-- Begin Head-->
<div id="head">&nbsp;</div>
<!-- End Head-->
<!-- Begin Main -->
<div id="main">
	<div class="cl">&nbsp;</div>
	<!-- Begin Content -->
	<div id="content">
		<?php if (have_posts()) : ?>
			<h2>Search Results</h2>
			<?php while (have_posts()) : the_post(); ?>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<div class="article" style="padding-top: 0px;">
					<?php echo shortalize($post->post_content, 100); ?>
				</div>
				<div class="cl" style="height: 20px;">&nbsp;</div>
			<?php endwhile; ?>
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
			</div>
		<?php else : ?>
			<h2 class="center">No posts found. Try a different search?</h2>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div>
	<!-- End Content -->
	<?php get_sidebar(); ?>
</div>
<!-- End Main -->

<?php get_footer(); ?>
<?php get_header(); ?>
<?php the_post(); ?>

<!-- Begin Head-->
<div id="head">&nbsp;</div>
<!-- End Head-->
<!-- Begin Main -->
<div id="main">
	<div class="cl">&nbsp;</div>
	<!-- Begin Content -->
	<div id="content">
		<h2><?php the_title(); ?></h2>
		<div class="article">
			<em><?php the_time('F j, Y'); ?></em>
			<div class="cl">&nbsp;</div>
			<?php the_content(); ?>
		</div>
		<div class="cl" style="height: 20px;">&nbsp;</div>
	</div>
	<!-- End Content -->
	<?php get_sidebar(); ?>
</div>
<!-- End Main -->

<?php get_footer(); ?>
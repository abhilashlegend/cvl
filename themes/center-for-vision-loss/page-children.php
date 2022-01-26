<?php
/*
Template name: Children
*/
?>
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
			<?php the_content(); ?>

<span style="display:none;"><?php the_ID(); ?>
<?php $parent = $post->ID; ?></span>
<div id="page-children">
<?php
query_posts('post_type=page&orderby=menu_order&post_parent='.$parent);
global $more;$more = 0;
 while (have_posts()) : the_post();
?>

<h3 class="subheadline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<?php
	if(strpos($post->post_content,'<!--more-->') !== false) {
		the_content('MORE');
	}
	else {
		echo shortalize($post->post_content, 100,false);
?> <a href="<?php echo get_permalink($post->ID); ?>">MORE</a>
<?php } ?>

<?php endwhile; ?>
</div>




		</div>
	</div>
	<!-- End Content -->
	<?php get_sidebar(); ?>
</div>
<!-- End Main -->

<?php get_footer(); ?>
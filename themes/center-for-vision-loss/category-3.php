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
		
		
			<h2>News</h2>
			<?php global $more;$p = get_posts('numberposts=-1&category=7&orderby=post_date&order=desc'); ?>
			<?php foreach($p as $post) { setup_postdata($post); ?>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<div class="article" style="padding-top: 0px;">
				<?php the_content('MORE',true); ?>
			</div>
			<div class="cl" style="height: 20px;">&nbsp;</div>
			<?php } ?>
			
			<h2>Events</h2>
			<?php global $getTIME;$p = $wpdb->get_results("select ID from $wpdb->posts as p join $wpdb->term_relationships as r on (r.object_id = p.ID and r.term_taxonomy_id = 8) left join $wpdb->postmeta as o on (p.ID = o.post_id and o.meta_key = '_tern_wp_event_start_date') left join $wpdb->postmeta as m on (p.ID = m.post_id and m.meta_key = '_tern_wp_event_end_date') where m.meta_value >= ".$getTIME->atStartStamp(time())." order by o.meta_value asc"); ?>
			<?php foreach($p as $v) { $post = get_post($v->ID);setup_postdata($post); ?>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<span class="date"><?php echo gmdate('l, F j, Y',get_post_meta($post->ID,'_tern_wp_event_start_date',true)); ?></span>
			<div class="article" style="padding-top: 0px;">
				<?php the_content('MORE',true); ?>
			</div>
			<div class="cl" style="height: 20px;">&nbsp;</div>
			<?php } ?>
			
			
			
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
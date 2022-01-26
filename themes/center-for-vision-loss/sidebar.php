<!-- Begin Sidebar -->
<div class="medium-col">
	<ul class="widgets">
		<?php dynamic_sidebar('Sidebar 1'); ?>
		
		<li class="widget theme-widget theme-widget-news news-list">
			<ul>
				<?php global $getTIME;$p = $wpdb->get_results("select ID from $wpdb->posts as p join $wpdb->term_relationships as r on (r.object_id = p.ID and r.term_taxonomy_id = 8) left join $wpdb->postmeta as o on (p.ID = o.post_id and o.meta_key = '_tern_wp_event_start_date') left join $wpdb->postmeta as m on (p.ID = m.post_id and m.meta_key = '_tern_wp_event_end_date') where m.meta_value >= ".$getTIME->atStartStamp(time())." order by o.meta_value asc"); ?>
				<?php foreach($p as $v) { $post = get_post($v->ID);setup_postdata($post); ?>
				<li>
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<span class="date"><?php echo gmdate('l, F j, Y',get_post_meta($post->ID,'_tern_wp_event_start_date',true)); ?></span>
				<?php } ?>
				</li>
			</ul>
		</li>
		
		<?php dynamic_sidebar('Sidebar 2'); ?>
		
	</ul>
</div>
<!-- End Sidebar -->
<div class="cl">&nbsp;</div>
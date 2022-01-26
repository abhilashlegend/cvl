<?php
	$categories = get_the_category($post->ID);
	$post_type = get_post_type($post->ID);
	$event_date_raw =   get_post_meta($post->ID, '_event_start_date', true);
	$event_dt = date("D, F d, Y", strtotime($event_date_raw));
	$event_start_time = get_post_meta($post->ID, "_event_start_time", true);
	$event_end_time = get_post_meta($post->ID, "_event_end_time", true);
	$address = get_post_meta($post->ID, "_event_address", true); 
	$featured_image = get_post_meta($post->ID, "_featured_image", true); 
?>


<article class="col-md-12 blog-list-view" id="post_<?php the_ID(); ?>" >
	<div class="row">
		<div class="col-sm-5">
			
	<?php  if($featured_image != "") {  ?>
			<div class="article-thumbnail">
				<img src="<?php echo $featured_image; ?>" alt="" />
			</div>
	

	<?php } else if(has_post_thumbnail(get_the_ID())) { ?>
	
			<div class="article-thumbnail">
				<img class="img-fluid" src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="" />
			</div>
    
    <?php } else { ?>
    	
		<img   style="border: 1px solid #ccc;" src="<?php echo get_stylesheet_directory_uri();?>/img/default.png ?>" alt="" />
	

<?php } ?>
		</div>
		<div class="col-sm-7">
<div class="card-body">
    <div class="title">
    			<p>
                	<?php /* foreach ($categories as $category) : ?>
                         	
    						<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" title="<?php echo $category->name; ?>" class="tag-default"><?php echo $category->name; ?></a>

    				<?php endforeach; */ ?>

					<?php if($post_type != "event_listing"): ?>
    				<span class="legend-default">
    						<span class="author">By <?php the_author(); ?></span> |	
        					<span class="updated"> <?php the_time('M d, Y'); ?></span>
        					
        			</span>
        		<?php endif; ?>
    
</p>
                <h2 class="card-title news-title">
                    <a aria-label="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
                </h2>
                <?php if($post_type == "event_listing"): ?>
                <div class="card-subtitle mb-2 text-muted">
                	<div class="row">
	                	<div class="col-sm">
	                		<i class="fa fa-calendar mr-2"></i> <?php echo $event_dt; ?>
	                	</div>
	                	<div class="col-sm listview-time-col">
							<i class="fa fa-clock-o mr-2" aria-hidden="true"></i>
							<span aria-hidden="true"><?php echo date("g:i a", strtotime($event_start_time)) . " - " . date("g:i a", strtotime($event_end_time)); ?></span>
							<span class="sr-only"><?php echo date("g:i a", strtotime($event_start_time)) . " to " . date("g:i a", strtotime($event_end_time)); ?></span>
	                	</div>
                	</div>
                	<div class="row my-2">
						<div class="col">
							<i class="fa fa-map-marker mr-2"></i> 
							<?php echo $address; ?>
						</div>
                	</div>
                </div>
            <?php endif; ?>
            </div> <!-- End of title -->

	

	

	<div class="intro">
		<p class="card-text">
		<?php
		 echo wp_trim_words(get_the_content(),35); 
		?>
		</p>
		<a aria-label="read more about <?php the_title(); ?>" class="btn read-more-bordered-btn" href="<?php esc_url(the_permalink()); ?>">Read More</a>
		

	</div><!-- end of intro -->
</div> <!-- ENd of card body -->
	</div>
</div> <!-- ENd of row -->
</article><!-- #post-## -->

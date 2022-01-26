<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
if ( ! function_exists( 'understrap_posted_on' ) ) {
	function understrap_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">  </time>';
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$posted_on   = apply_filters(
			'understrap_posted_on', sprintf(
				'<span class="posted-on">%1$s %3$s</span>',
				esc_html_x( '', 'post date', 'understrap' ),
				esc_url( get_permalink() ),
				apply_filters( 'understrap_posted_on_time', $time_string )
			)
		);
		$byline      = apply_filters(
			'understrap_posted_by', sprintf(
				'<span class="byline"> %1$s<span class="author vcard"><a class="url fn n" href="%2$s"> %3$s</a></span></span>',
				$posted_on ? esc_html_x( 'By', 'post author', 'understrap' ) : esc_html_x( 'Posted by', 'post author', 'understrap' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			)
		);
		echo  $byline . " | " . $posted_on; // WPCS: XSS OK.
	}
}


/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
if ( ! function_exists( 'understrap_entry_footer' ) ) {
	function understrap_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'understrap' ) );
			 $cat = strpos($categories_list, "Uncategorized");
			
			if(!$cat){
			if ( $categories_list && understrap_categorized_blog() ) {
				/* translators: %s: Categories of current post */
				
					printf( '<span class="cat-links">' . esc_html__( 'Posted in %s', 'understrap' ) . '</span>', $categories_list ); // WPCS: XSS OK.
				
			}
		}
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'understrap' ) );
			if ( $tags_list ) {
				/* translators: %s: Tags of current post */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %s', 'understrap' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'understrap' ), esc_html__( '1 Comment', 'understrap' ), esc_html__( '% Comments', 'understrap' ) );
			echo '</span>';
		}
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'understrap' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
}


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'understrap_categorized_blog' ) ) {
	function understrap_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'understrap_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			) );
			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );
			set_transient( 'understrap_categories', $all_the_cool_cats );
		}
		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so components_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so components_categorized_blog should return false.
			return false;
		}
	}
}


/**
 * Flush out the transients used in understrap_categorized_blog.
 */
add_action( 'edit_category', 'understrap_category_transient_flusher' );
add_action( 'save_post',     'understrap_category_transient_flusher' );

if ( ! function_exists( 'understrap_category_transient_flusher' ) ) {
	function understrap_category_transient_flusher() {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		// Like, beat it. Dig?
		delete_transient( 'understrap_categories' );
	}
}

function bmg_display_about_section() {
    ?>  
    <section class="about-section" id="about">
    	<div class="container">
        	<div class="row">
        		<div class="col-sm-12">
                <h2 class="block-header">About Us</h2>
                	<?php

                		$content = "";
                		 // query for the about page
					    $query = new WP_Query( 'pagename=about-us' );
					    // "loop" through query (even though it's just one page) 
					    while ( $query->have_posts() ) : $query->the_post();
					      $content =  get_the_content();
					    endwhile;
					    // reset post data (important!)
					    wp_reset_postdata();


                	?>
                	<p>
						<?php echo $content; ?>
                	</p>
        		</div>
    		</div>
    	</div>
    </section>
<?php
    }


function bmg_display_services_section() {
?>
	<section class="services-section pt-4 pb-0" id="services">
		<div class="container">
			<?php /*
			<div class="row mb-5">
				<div class="col-sm-12">
					<h2 class="block-header">Our Services</h2>
					<?php

                		$content = "";
                		 // query for the about page
					    $query = new WP_Query( 'pagename=our-services' );
					    // "loop" through query (even though it's just one page) 
					    while ( $query->have_posts() ) : $query->the_post();
					      $content =  get_the_content();
					    endwhile;
					    // reset post data (important!)
					    wp_reset_postdata();


                	?>
					<p>
						<?php echo $content; ?>
                	</p>
				</div>
			</div>
			*/
			?>
				
				<div class="row">
				<div class="col-sm-6 pr-sm-1">
					<a href="<?php echo get_site_url(null, '/skills-education/'); ?>" class="card-button mt-0">
						Skills Education
					</a>

					<div class="card">
					  	<a href="<?php echo get_site_url(null, '/skills-education/'); ?>">
						    <img src="<?php echo get_stylesheet_directory_uri();?>/img/skills-education.jpg" class="card-img-top" alt="">
							
						    <div class="card-img-overlay">
							    <div class="card-img-text">Skills Education</div>
							</div>
						</a>
					 </div>

				</div>

				<div class="col-sm-6 pl-sm-1">
					<a href="<?php echo get_site_url(null, '/specialized-tech/'); ?>" class="card-button">
						Specialized Technologies
					</a>

					<div class="card">
					  	<a href="<?php echo get_site_url(null, '/specialized-tech/'); ?>">
						    <img src="<?php echo get_stylesheet_directory_uri();?>/img/specialized-technologies.jpg" class="card-img-top" alt="">
						    <div class="card-img-overlay">
							    <div class="card-img-text">Specialized Technologies</div>
							</div>
						</a>
					  </div>
				</div>

			</div>
			
		<div class="row">		

				<div class="col-sm-6 pr-sm-1">
					<a href="<?php echo get_site_url(null, '/support-services/'); ?>" class="card-button mt-10">
						Support Services
					</a>

					<div class="card">
					  	<a href="<?php echo get_site_url(null, '/support-services/'); ?>">
						    <img src="<?php echo get_stylesheet_directory_uri();?>/img/support-services.jpg" class="card-img-top" alt="">
							
						    <div class="card-img-overlay">
							    <div class="card-img-text">Support Services</div>
							</div>
						</a>
					 </div>

				</div>

				<div class="col-sm-6 pl-sm-1">
					<a href="<?php echo get_site_url(null, '/client-services/'); ?>" class="card-button mt-10">
						Prevention Services
					</a>

					<div class="card">
					  	<a href="<?php echo get_site_url(null, '/prevention-services/'); ?>">
						    <img src="<?php echo get_stylesheet_directory_uri();?>/img/prevention-services.jpg" class="card-img-top" alt="">
						    <div class="card-img-overlay">
							    <div class="card-img-text">Prevention Services</div>
							</div>
						</a>
					  </div>
				</div>	
			</div>	


			
		</div>
	</section>
<?php
}

function bmg_display_our_progress_section() {
?>
	<section class="our-progress-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="block-header mt-1">Our Key Measures</h2>
					<?php

                		$content = $block_one_title = $block_one_sub_title = $block_one_description = $block_two_title = $block_two_description = $block_three_title = $block_three_sub_title = $block_three_description = $block_four_title = $block_four_sub_title = $block_four_description = $block_five_title = $block_five_sub_title = $block_five_description = $block_six_title = $block_six_sub_title = $block_six_description = "";
                		 // query for the about page
					    $query = new WP_Query( 'pagename=our-progress' );
					    // "loop" through query (even though it's just one page) 
					    while ( $query->have_posts() ) : $query->the_post();
					      $content =  get_the_content();
					      $post_id = get_the_ID();	
					      
					      // Block one 
					      $block_one_title = get_post_meta($post_id, "block_one_title", true);
					      $block_one_sub_title = get_post_meta($post_id, "block_one_sub_title", true);
					      $block_one_description = get_post_meta($post_id, "block_one_description", true);

					      // Block two 
					      $block_two_title = get_post_meta($post_id, "block_two_title", true);
					      $block_two_sub_title = get_post_meta($post_id, "block_two_sub_title", true);
					      $block_two_description = get_post_meta($post_id, "block_two_description", true);

					      // Block three 
					      $block_three_title = get_post_meta($post_id, "block_three_title", true);
					      $block_three_sub_title = get_post_meta($post_id, "block_three_sub_title", true);
					      $block_three_description = get_post_meta($post_id, "block_three_description", true);


					      // Block four
					      $block_four_title = get_post_meta($post_id, "block_four_title", true);
					      $block_four_sub_title = get_post_meta($post_id, "block_four_sub_title", true);
					      $block_four_description = get_post_meta($post_id, "block_four_description", true);

					      // Block five
					      $block_five_title = get_post_meta($post_id, "block_five_title", true);
					      $block_five_sub_title = get_post_meta($post_id, "block_five_sub_title", true);
					      $block_five_description = get_post_meta($post_id, "block_five_description", true);

					       // Block five
					      $block_six_title = get_post_meta($post_id, "block_six_title", true);
					      $block_six_sub_title = get_post_meta($post_id, "block_six_sub_title", true);
					      $block_six_description = get_post_meta($post_id, "block_six_description", true);

					    endwhile;
					    // reset post data (important!)
					    wp_reset_postdata();


                	?>
					<p>
						<?php /* echo $content; */ ?>
					</p>
				</div>
			</div>

			<div class="row mt-3 mb-5">
				<div class="col-md-3">
					<div class="impact-box">
						<div class="big-num"><?php echo $block_one_title; ?></div>
						<p>
							<?php echo $block_one_description; ?>
						</p>
					</div>
				</div>

				<div class="col-md-3">
					<div class="impact-box">
						<div class="big-num"><?php echo $block_two_title; ?></div>
						<p>
							<?php echo $block_two_description; ?>
						</p>
					</div>
				</div>

				<div class="col-md-3">
					<div class="impact-box">
						<div class="big-num"><?php echo $block_three_title; ?></div>
						<p>
							<?php echo $block_three_description; ?>
						</p>
					</div>
				</div>

				<div class="col-md-3">
					<div class="impact-box">
						<div class="big-num"><?php echo $block_four_title; ?></div>
						<p>
							<?php echo $block_four_description; ?>
						</p>
					</div>
				</div>
			</div>

		</div>
	</section>
<?php
}

function bmg_display_locations_section() {
?>
<section class="locations-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="block-header">Our Locations</h2>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-sm-6 px-sm-2">
				<div class="card-block">
					Lehigh Valley Campus
				</div>
				<div class="card">
				    <img src="<?php echo get_stylesheet_directory_uri();?>/img/lehigh-valley.jpg" class="card-img-top" alt="">
				    <div class="card-img-overlay">
					    <div class="card-img-text">
							<?php
					    		$lehigh_valley = get_theme_mod('understrap_lehigh_valley_location_detail');
					    		echo $lehigh_valley;
					    	?>
					    </div>
					</div>
				  </div>	

			</div>
			<div class="col-sm-6 px-sm-2">
				<div class="card-block mt-xs-1">
					Monroe Campus
				</div>
				<div class="card">
				    <img src="<?php echo get_stylesheet_directory_uri();?>/img/Location-2.jpg" class="card-img-top" alt="">
				    <div class="card-img-overlay">
					    <div class="card-img-text">
					    	<?php
					    		$monroe = get_theme_mod('understrap_monroe_location_detail');
					    		echo $monroe;
					    	?>
					    </div>
					</div>
				  </div>
			</div>
		</div>	
		</div>
	</div>
</section>
<?php
}

function bmg_display_news_events_section() {
?>
<section class="news-events-section pt-1 pb-4">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="block-header">Our Blog</h2>
				<?php

                		$content = "";
                		 // query for the about page
					    $query = new WP_Query( 'pagename=latest-news' );
					    // "loop" through query (even though it's just one page) 
					    while ( $query->have_posts() ) : $query->the_post();
					      $content =  get_the_content();
					    endwhile;
					    // reset post data (important!)
					    wp_reset_postdata();


                	?>
				<p>
					<?php /* echo $content; */ ?>
				</p>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 text-left mt-2">
				<div class="card-deck">
					
					<?php
				 $the_query = new WP_Query( array(
				      'posts_per_page' => 3,
				      'ignore_sticky_posts' => true,
				      'post_status' => 'publish',
				      'orderby' => 'post_date',
				   )); 
			?>
			<?php if ( $the_query->have_posts() ) : ?>
  			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		  <div class="card">
		  	<?php  if(has_post_thumbnail(get_the_ID())): ?>
	
				<a href="<?php esc_url(the_permalink()); ?>" aria-hidden="true">
					<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="read more about <?php the_title(); ?>" aria-hidden="true" class="card-img-top img-fluid"></a>
		    
		    <?php else: ?>
		    	<a href="<?php esc_url(the_permalink()); ?>" aria-hidden="true">
		    <img class="card-img-top img-fluid" aria-hidden="true" src="<?php echo get_stylesheet_directory_uri();?>/img/default.png" alt="read more about <?php the_title(); ?>">
		    <?php endif; ?></a>
		    <div class="card-body">
		       	
		      <h3 class="card-title news-title"><?php echo wp_trim_words(get_the_title(), 7); ?></h3>
		      <p class="card-text">  <?php
		 echo wp_trim_words(get_the_content(),20); 
		?></p>
		      <p><a aria-label="read more about <?php the_title(); ?>" class="btn read-more-bordered-btn" href="<?php esc_url(the_permalink()); ?>">Read More</a></p>
		    </div>
		  </div>
		  <?php endwhile; ?>
 		  <?php wp_reset_postdata(); ?>
 		  <?php else : ?>
		  	<p><?php __('No News'); ?></p>
		  <?php endif; ?>
					

					
				</div>
			</div>
		</div>	
	</div>
</section>	


<?php
}

function bmg_display_featured_event_banner() {
	?>
<section class="upcoming-feature-event-section pt-0">
	<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<a href="<?php echo get_site_url(null, '/ourevents/songs4sight/'); ?>">
							<img src="https://sightsforhope.org/wp-content/uploads/2021/06/s4s2021promo2.jpg" alt="Songs4Sight 2021 - Presented by Provident Bank" class="img-fluid feature-event-banner-img" />
					</a>
				</div>
			</div>
	</div>	
</section>
<?php
}
?>
<?php
function bmg_display_upcoming_events_section() {
?>
<section class="upcoming-events-section pt-0 pb-4">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="block-header mb-1">Our Calendar</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 text-left mt-4">
				<?php
							$current_date = date('Y-m-d');

							$args = array(
								'post_type' => 'event_listing',
								
								'meta_key' => '_event_start_date',
								'orderby' => 'meta_value',
								'order' => 'ASC',
								
								'meta_query' => array(
						            array(
						                'key' => '_event_start_date',
						                'value' => $current_date, // date format error
						                'compare' => '>='
						            )                   
						         ), 
							   'posts_per_page' => 3,	
							   

							);
							$query = new WP_Query($args);

							$cnt = 0;	

							// The Loop
							if ( $query->have_posts() ) {

								
								        $posts = $query->posts;
								        $total_posts = count($posts);
								        for($i = 0; $i < $total_posts; $i++)
								        {
								        $cnt++;	
								       
								        $permalink = get_permalink($posts[$i]->ID);
								        $event_date = get_post_meta($posts[$i]->ID, "_event_start_date", true);

								        
								        $address = get_post_meta($posts[$i]->ID, "_event_address", true);
								        $event_day = date("d", strtotime($event_date));
								        $event_month = date("M", strtotime($event_date));	
								        $event_start_time = get_post_meta($posts[$i]->ID, "_event_start_time", true);
										$event_end_time = get_post_meta($posts[$i]->ID, "_event_end_time", true);
	
						?>

				<div onclick="window.location='<?php echo $permalink; ?>'" class="row event-row <?php echo $class = $cnt % 2 == 0 ? '' : 'events-alt-row'; ?>">
					<div class="col-sm-6 v-center">
						<div class="event-dt-time">
							<div class="event-month"><?php echo $event_month; ?></div>
							<div class="event-date"><?php echo $event_day; ?></div>
						</div>				
						<div class="time-location">
							<div class="events-time">
							<span aria-hidden="true"><?php echo date("g:i a", strtotime($event_start_time)) . " - " .  date("g:i a", strtotime($event_end_time)); ?></span>
							<span class="sr-only"><?php echo date("g:i a", strtotime($event_start_time)) . " to " .  date("g:i a", strtotime($event_end_time)); ?></span>
							</div>
							<div class="event-location">
							<?php echo $address; ?>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="events-title">
							<a aria-label='<?php echo $posts[$i]->post_title . " " . wp_trim_words($posts[$i]->post_content,25) . " on " . $event_date . " " . $event_month . " from " . date("g:i a", strtotime($event_start_time)) . " to " . date("g:i a", strtotime($event_end_time)) . " at " . $location;  ?>' href='<?php echo $permalink; ?>'><?php  echo $posts[$i]->post_title; ?></a></div>
						<div>
							<?php echo wp_trim_words($posts[$i]->post_content,25); ?>
						</div>
					</div>
				</div>
				<?php
						}
					}
				?>
				
				<div class="all-events-link"> <a class="btn read-more-bordered-btn" href="<?php echo get_site_url(null, '/events/'); ?>">See More</a></div>
			</div>	
		</div>
	</div>
</section>
<?php
}

function bmg_display_who_support_us_section() {
?>

<section class="who-support-section pt-0 pb-1">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="block-header">Our Partners for Sight</h2>
				<?php

                		$content = "";
                		 // query for the about page
					    $query = new WP_Query( 'pagename=who-support-us' );
					    // "loop" through query (even though it's just one page) 
					    while ( $query->have_posts() ) : $query->the_post();
					      $content =  the_content();
					    endwhile;
					    // reset post data (important!)
					    wp_reset_postdata();


                ?>
				<p>
					<?php echo $content; ?>
				</p>
			</div>
		</div>

		
	</div>
</section>
<?php	
}

function display_latest_news_on_siderbar() {
?>	
<div class="wi	dget-area" id="right-sidebar" role="complementary">
					<aside id="wpp-2" class="widget recent-posts-widget-with-thumbnails">
						<div class="rpwwt-widget" id="rpwwt-recent-posts-widget-with-thumbnails-2">
						<h3 class="widget-title">Latest News</h3>
							<?php
								$args = array(
								   'posts_per_page' => 10,	
								   'post_status' => 'publish',
								);
								$query = new WP_Query($args);

								// The Loop
								if ( $query->have_posts() ) {
								    echo '<ul>';
								    while ( $query->have_posts() ) {
								        $query->the_post();
								        echo '<li><a href="' . get_the_permalink() . '">';
								        if(has_post_thumbnail(get_the_ID())) {
								        echo '<img class="attachment-125x75 size-125x75 wp-post-image" width="125" height="75" src="' . get_the_post_thumbnail_url( get_the_ID(), 'small' ) .
								         '" alt="" />';
								     	}
								     else {
								     	echo '<img class="attachment-125x75 size-125x75 wp-post-image" width="125" height="75" src="' . get_stylesheet_directory_uri() . '/img/default.png
								         " alt="" />';
								     }

								        echo '<span class="rpwwt-post-title">' . get_the_title() . '</span></a></li>';
								    }
								    echo '</ul>';
								} else {
								    echo '<ul class="wpp-list"><li>No news found</li></ul>';
								}
								/* Restore original Post Data */
								wp_reset_postdata();

							?>
						</div>	
					</aside>
				</div>

<?php 
}

function display_latest_events_on_siderbar() {
?>
<div class="widget-area upcoming-event-list" id="right-sidebar" role="complementary">
					<aside id="wpp-2" class="widget popular-posts">
						<h3 class="widget-title">Upcoming Events</h3>
							<?php
								$current_date = date('Y-m-d');
								$args = array(
								   'posts_per_page' => 10,	
								'post_type' => 'event_listing',
								'meta_key' => '_event_start_date',
								'orderby' => 'meta_value',
								'order' => 'ASC',
								
								'meta_query' => array(
						            array(
						                'key' => '_event_start_date',
						                'value' => $current_date, // date format error
						                'compare' => '>='
						            )                   
						         ), 
								);
								$query = new WP_Query($args);

								// The Loop
								if ( $query->have_posts() ) {
								    echo '<ul class="wpp-list">';
								    while ( $query->have_posts() ) {
								        $query->the_post();
								        $event_date = get_post_meta(get_the_ID(), "_event_start_date", true);
								        $event_date = date("d M", strtotime($event_date));

								        $event_start_time = get_post_meta(get_the_ID(), "_event_start_time", true);
										$event_end_time = get_post_meta(get_the_ID(), "_event_end_time", true);

								        echo '<li><div class="wpp-event-datetime">' . $event_date . " | " . date("g:i a", strtotime($event_start_time)) . " - " .  date("g:i a", strtotime($event_end_time)) . "</div><div><a class='wpp-post-title' href='" . get_post_permalink() . "'>" . get_the_title() . '</a></div></li>';
								    }
								    echo '</ul>';
								} else {
								    echo '<ul class="wpp-list"><li>No events found</li></ul>';
								}
								/* Restore original Post Data */
								wp_reset_postdata();

							?>
							
					</aside>
				</div>
<?php	
}


function display_event_details_on_siderbar($postid) {
	$event_type = get_post_meta($postid, "_event_type", true);
	$participation = get_post_meta($postid, "_participation", true);
	$facilitator = get_post_meta($postid, "_facilitator", true);
	$price = get_post_meta($postid, "_price(s)", true);
	$transportation = get_post_meta($postid, "_transportation", true);
	$event_contact = get_post_meta($postid, "_event_contact", true);
?>
<div class="widget-area mt-4" id="right-sidebar" role="complementary">
					<aside id="wpp-2" class="widget popular-posts">
						<h3 class="widget-title">Details</h3>
						<ul class="wpp-list">
							<li><strong>Event Type: </strong><?php echo $event_type; ?></li>
							<li><strong>Participation: </strong><?php echo $participation; ?></li>
							<li><strong>Facilitator: </strong><?php echo $facilitator; ?></li>
							<li><strong>Price: </strong><?php echo $price; ?></li>
							<li><strong>Transportation: </strong><?php echo $transportation; ?></li>
							<li><strong>Event Contact: </strong><?php echo $event_contact; ?></li>
						</ul>
					</aside>
</div> 


<?php	
}


?>
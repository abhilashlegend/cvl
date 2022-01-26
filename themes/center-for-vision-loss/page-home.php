<?php
/*
Template name: Homepage
*/
?>
<?php get_header(); ?>
<?php the_post(); ?>
<?php
$slides = get_pages('child_of='.$post->ID.'&parent='.$post->ID);
?>
<!-- Begin Slider -->

<div id="slider-holder">
	<div id="slider">
		<div class="slider-nav">
			<?php $loopID = 0; foreach ($slides as $s) : ?>
			<a rel="<?php echo $loopID + 1; ?>" href="#">
				<?php echo $loopID + 1; ?>
			</a>
			<?php $loopID ++; endforeach; ?>
		</div>
		<ul>
			<?php $loopID = 0; foreach ($slides as $s) : ?>
			<li>
				<?php if(get_post_meta($s->ID, 'url', true)) { ?><a href="<?php echo get_post_meta($s->ID, 'url', true); ?>"><?php } ?>
				<?php if($loopID == 5){ echo "<a href='http://centerforvisionloss.org/about-us/donate-your-vehicle'>"; }  ?>
				<?php if($loopID == 6){ echo "<a href='https://www.facebook.com/LowVision845' target='_blank'>"; }  ?>
				<?php if($loopID == 7){ echo "<a href='http://www.songs4sight.com/' target='_blank'>"; }  ?>
				<?php if($loopID == 8){ echo "<a href='http://centerforvisionloss.org/Sweepstakes'>"; }  ?>
				<?php if($loopID == 9){ echo "<a href='http://centerforvisionloss.org/videotips'>"; }  ?>
				<img src="<?php echo get_post_meta($s->ID, 'image', true); ?>" alt="" />
				<?php if($loopID == 5){ echo "</a>"; }  ?>
				<?php if($loopID == 6){ echo "</a>"; }  ?>
				<?php if($loopID == 7){ echo "</a>"; }  ?>
				<?php if($loopID == 8){ echo "</a>"; }  ?>
				<?php if($loopID == 9){ echo "</a>"; }  ?>
				<?php if(get_post_meta($s->ID, 'url', true)) { ?></a><?php } ?>
			</li>
			<?php $loopID ++; endforeach; ?>
		</ul>
	</div>
</div>
<!-- End Slider -->
<!-- Begin Main -->
<div id="main">
	<div class="cl">
		&nbsp;
	</div>
	<!-- Begin Content -->
	<div id="home-content">
		<div class="row">
			<div class="big-col">
				<div class="post">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="small-col">
				<?php echo get_option('core_values'); ?>
			</div>
			<div class="medium-col">
				<?php echo do_shortcode('[newsletter]'); ?>
				<br />

				<a href="http://centerforvisionloss.org/about-us/donate">
					<img border="0" src="http://centerforvisionloss.org/wp-content/themes/center-for-vision-loss/images/donate-cvl.gif" alt="donate using JustGive.org">
				</a>

			</div>
			<div class="cl">
				&nbsp;
			</div>
		</div>

		<div class="row last-row">
			<div class="big-col">
				<div class="category-list news">
					<h4>What's New
						<a href="http://centerforvisionloss.org/category/news-events/news" style="float:right;">
							<small>See All</small>
						</a>
					</h4>
					<ul>
						<?php $p = get_posts('numberposts=2&category=7,-9&orderby=post_date&order=desc'); ?>
						<?php foreach ($p as $n) : ?>
						<li>
							<h5>
								<a href="<?php echo get_permalink($n->ID); ?>">
									<?php echo $n->post_title; ?>
								</a>
							</h5>
							<p><?php echo shortalize($n->post_content, 20, ''); ?>
								<a href="<?php echo get_permalink($n->ID); ?>">
									&nbsp;MORE
								</a>
							</p>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="category-list events">
					<h4>Upcoming Events
						<a href="http://centerforvisionloss.org/category/news-events/events" style="float:right;">
							<small>See All</small>
						</a>
					</h4>
					<ul>
						<?php //global $getTIME;$p = $wpdb->get_results("select ID from $wpdb->posts as p join $wpdb->term_relationships as r on (r.object_id = p.ID and r.term_taxonomy_id = 8) left join $wpdb->postmeta as o on (p.ID = o.post_id and o.meta_key = '_tern_wp_event_start_date') left join $wpdb->postmeta as m on (p.ID = m.post_id and m.meta_key = '_tern_wp_event_end_date') where m.meta_value >= ".$getTIME->atStartStamp(time())." order by o.meta_value asc limit 2"); ?>
						<?php $p = get_posts('numberposts=2&category=8&orderby=post_date&order=desc'); ?>
						<?php foreach ($p as $n) : $n = get_post($n->ID); ?>
						<li>
							<h5>
								<a href="<?php echo get_permalink($n->ID); ?>">
									<?php echo $n->post_title; ?>
								</a>
							</h5>
							<span class="date-home"><?php echo gmdate('l, F j, Y',get_post_meta($n->ID,'_tern_wp_event_start_date',true)); ?></span>
							<p><?php echo shortalize($n->post_content, 20, ''); ?>
								<a href="<?php echo get_permalink($n->ID); ?>">
									MORE
								</a>
							</p>
						</li>
						<?php endforeach; ?>
					</ul>

				</div>
			</div>

			<div class="side-holder">
				<h3 style="font-size:18px;">Two Locations to Serve You<br />
					<a href="http://centerforvisionloss.org/about-us/locations" style="font-size:.8em">
						Click for Directions
					</a>
				</h3>
				<div class="location-row">
					<div class="small-col">
						<?php echo get_option('homepage_location1'); ?>
						<img src="http://centerforvisionloss.org/wp-content/themes/center-for-vision-loss/images/allentown_office.jpg" alt="Lehigh Valley Office" style="margin: 10px 0;" />
					</div>
					<div class="medium-col">
						<?php echo get_option('homepage_location2'); ?>
						<img src="http://centerforvisionloss.org/wp-content/themes/center-for-vision-loss/images/monroe_office.jpg" alt="Monroe County Office" style="margin: 10px 0;" />
					</div>
				</div>
				<div class="cl">
					&nbsp;
				</div>
			</div>

			<div class="cl">&nbsp;</div>

			<hr />

			<div class="row">
				<div style="float:left;width:28%;padding:0 2%;">
					<a href="https://www.youtube.com/watch?v=2EYEc2uy-OI" target="_blank">
						<img src="http://centerforvisionloss.org/wp-content/uploads/2016/10/Screen-Shot-2016-10-25-at-1.02.50-AM.png" width="100%" alt="" />
					</a>
					<p>"Looking Beyond Vision," produced by Daymarks Productions</p>
				</div>
				<div style="float:left;width:28%;padding:0 2%;">
					<iframe src="https://player.vimeo.com/video/230179273" width="100%" height="150px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					<p>"Dorothy’s Story," produced by ASR Media Productions.</p>
				</div>
				<div style="float:left;width:28%;padding:0 2%;">
					<iframe width="100%" height="150px" src="https://www.youtube.com/embed/JYQkmfN57LY" frameborder="0" allowfullscreen></iframe>
					<p>“Seeing with Your Heart,” produced by Daymarks Productions to accompany Camp I CAN’s Community Service Project to benefit Animals in Distress.</p>
				</div>
				<div style="clear:both;"></div>
			</div>




			<div class="cl">&nbsp;</div>
			<hr />

			<div class="cl">&nbsp;</div>

			<div class="section">
				<div class="logo-col">
					<a href="http://www.unitedwayglv.org/home.aspx" target="_blank">
					<img border="0" src="http://centerforvisionloss.org/wp-content/uploads/2015/07/uw-glv.jpg" alt="donate using JustGive.org">
					</a>
				</div>
				<div class="logo-col">
					<a href="http://PoconoUnitedWay.org" target="_blank">
					<img border="0" src="http://centerforvisionloss.org/wp-content/uploads/2019/08/Pocono-United-Way.jpg" alt="http://PoconoUnitedWay.org">
					</a>
				</div>
				<div class="logo-col">
					<a href="http://aerbvi.org/" target="_blank">
					<img src="http://centerforvisionloss.org/wp-content/uploads/2019/08/AER-Accreditation.jpg" alt="http://aerbvi.org/" style="margin: 10px 0;" />
					</a>
				</div>
				<div class="logo-col">
					<a href="http://www.pablind.org/" target="_blank">
					<img src="http://centerforvisionloss.org/wp-content/themes/center-for-vision-loss/images/pab.jpg" alt="NAC" style="margin: 10px 0;" />
					</a>
				</div>
				<div class="logo-col">
					<a href="http://www.artsandaccess.org/" target="_blank">
						<img src="http://centerforvisionloss.org/wp-content/uploads/2015/07/arts-access-logo2-300x2091.png" width="100%" style="margin: 10px 0;" />
					</a>
				</div>
				<div class="cl">
					&nbsp;
				</div>
			</div>
		</div>
		<div class="cl">
			&nbsp;
		</div>
	</div>
</div>
<!-- End Content -->
<div class="cl">
	&nbsp;
</div>
</div>
<!-- End Main -->

<?php get_footer(); ?>

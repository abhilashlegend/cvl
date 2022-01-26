<?php
/*
* Register the new widget classes here so that they show up in the widget list
*/
function load_widgets() {
    register_widget('LatestTweets');
    register_widget('ThemeWidgetNewsletter');
    register_widget('ThemeWidgetNews');
    register_widget('ThemeWidgetDonate');
    register_widget('ThemeWidgetSponsors');
}
add_action('widgets_init', 'load_widgets');

/*
* Displays a block with latest tweets from particular user
*/
class LatestTweets extends ThemeWidgetBase {
    function LatestTweets() {
        $widget_opts = array(
	        'classname' => 'theme-widget',
            'description' => 'Displays a block with your latest tweets'
        );
        $this->WP_Widget('theme-widget-latest-tweets', 'Latest Tweets', $widget_opts);
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>''
        	),
        	array(
		        'name'=>'username',
        		'type'=>'text',
        		'title'=>'Username',
        		'default'=>''
        	),
        	array(
		        'name'=>'count',
        		'type'=>'text',
        		'title'=>'Number of Tweets to show',
        		'default'=>'5'
        	),
        );
    }
    
    /*
	* Called when rendering the widget in the front-end
	*/
    function front_end($args, $instance) {
    	extract($args);
    	$tweets = TwitterHelper::get_tweets($instance['username'], $instance['count']);
    	if (!empty($tweets)) {
    		if ($instance['title'])
				echo $before_title . $instance['title'] . $after_title;
    	}
        ?>
        <ul>
        	<?php foreach ($tweets as $tweet): ?>
        		<li><?php echo $tweet->tweet_text ?> - <span><?php echo $tweet->time_distance ?> ago</span></li>
        	<?php endforeach ?>
        </ul>
        <?php
    }
}

class ThemeWidgetNewsletter extends ThemeWidgetBase {
    function ThemeWidgetNewsletter() {
        $widget_opts = array(
	        'classname' => 'theme-widget theme-widget-newsletter',
            'description' => __( 'Displays a newsletter subscription block' ),
        );
        $control_ops = array(
        	//'width' => 350,
        );
        $this->WP_Widget('theme-widget-newsletter', 'Theme Widget - Newsletter', $widget_opts, $control_ops);
        $this->custom_fields = array(
        );
    }
    
    function front_end($args, $instance) {
        ?>
        <?php echo do_shortcode('[newsletter]'); ?>
        <?php
    }
}

class ThemeWidgetNews extends ThemeWidgetBase {
    function ThemeWidgetNews() {
        $widget_opts = array(
	        'classname' => 'theme-widget theme-widget-news news-list',
            'description' => __( 'Displays the latest news' ),
        );
        $control_ops = array(
        	//'width' => 350,
        );
        $this->WP_Widget('theme-widget-news', 'Theme Widget - News', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'News & Upcoming Events'
        	),
        	array(
		        'name'=>'number',
        		'type'=>'integer',
        		'title'=>'Number of news to show',
        		'default'=>'4'
        	),
        );
    }
    
    function front_end($args, $instance) {
    	$cat = get_term_by('slug', 'news-events', 'category');
    	$news = get_posts('cat='.$cat->term_id.'&number='.$instance['number']);
        ?>
        <h4><?php echo $instance['title']; ?></h4>
		<ul>
			<?php foreach ($news as $n) : ?>
		    	<li>
		    		<h5><a href="<?php echo get_permalink($n->ID); ?>"><?php echo $n->post_title; ?></a><span> - <?php echo get_the_time('F j, Y', $n->ID); ?> MORE... </span></h5>
		    	</li>
		    <?php endforeach; ?>
		</ul>
        <?php
    }
}

class ThemeWidgetDonate extends ThemeWidgetBase {
    function ThemeWidgetDonate() {
        $widget_opts = array(
	        'classname' => 'theme-widget theme-widget-donate donate',
            'description' => __( 'Displays a donate block' ),
        );
        $control_ops = array(
        	//'width' => 350,
        );
        $this->WP_Widget('theme-widget-donate', 'Theme Widget - Donate', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Donate now with:'
        	),
        	array(
		        'name'=>'link',
        		'type'=>'text',
        		'title'=>'Link',
        		'default'=>'#'
        	),
        );
    }
    
    function front_end($args, $instance) {
        ?>
        <h4><?php echo $instance['title']; ?></h4>
	    <a href="<?php echo $instance['link']; ?>" target="_blank">
	    	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/donate.gif" alt="" />
    	</a>
        <?php
    }
}

class ThemeWidgetSponsors extends ThemeWidgetBase {
    function ThemeWidgetSponsors() {
        $widget_opts = array(
	        'classname' => 'theme-widget theme-widget-thanks thanks',
            'description' => __( 'Displays the website sponsors' ),
        );
        $control_ops = array(
        	//'width' => 350,
        );
        $this->WP_Widget('theme-widget-sponsors', 'Theme Widget - Sponsors', $widget_opts, $control_ops);
        $this->custom_fields = array(
        	array(
		        'name'=>'title',
        		'type'=>'text',
        		'title'=>'Title',
        		'default'=>'Thanks'
        	),
        );
    }
    
    function front_end($args, $instance) {
        ?>
       <h4><?php echo $instance['title']; ?></h4>
    	<a href="<?php echo get_option('sponsor1_url'); ?>" target="_blank"><img src="<?php echo get_option('sponsor1_image'); ?>" width="110" alt="" /></a>
    	<a href="<?php echo get_option('sponsor2_url'); ?>" target="_blank"><img src="<?php echo get_option('sponsor2_image'); ?>" width="110" alt="" /></a>
        <?php
    }
}
?>
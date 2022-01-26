<?php
wp_enqueue_script('jquery');// Include jquery

if (function_exists('add_theme_support')) {
    add_theme_support('nav-menus');
}
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
register_nav_menus(
array(
'menu-1' => __( 'main-nav' ),
'menu-2' => __( 'eyebrow-nav' )
)
);
}

automatic_feed_links();


if(function_exists('register_sidebar')) {
	//eyebrow widget
	register_sidebar(array(
		'name'			=>	'Eyebrow',
		'id'			=>	'eyebrow',
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=> '',
		'after_title'	=> '',
	));
	//navigation widgets
	register_sidebar(array(
		'name'			=>	'Navigation 1',
		'id'			=>	'navigation-1',
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=> '',
		'after_title'	=> '',
	));
	register_sidebar(array(
		'name'			=>	'Navigation 2',
		'id'			=>	'navigation-2',
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=> '',
		'after_title'	=> '',
	));
	//sidebar widgets
	register_sidebar(array(
		'name'			=>	'Sidebar Home',
		'id'			=>	'home-sidebar',
		'before_widget'	=> '<li class="widget %2$s">',
		'after_widget'	=> '</li>',
		'before_title'	=> '<h2>',
		'after_title'	=> '</h2>',
	));
	register_sidebar(array(
		'name'			=>	'Sidebar 1',
		'id'			=>	'generic-sidebar',
		'before_widget'	=> '<li class="widget %2$s">',
		'after_widget'	=> '</li>',
		'before_title'	=> '<h2>',
		'after_title'	=> '</h2>',
	));
	register_sidebar(array(
		'name'			=>	'Sidebar 2',
		'id'			=>	'generic-sidebar2',
		'before_widget'	=> '<li class="widget %2$s">',
		'after_widget'	=> '</li>',
		'before_title'	=> '<h2>',
		'after_title'	=> '</h2>',
	));
	//footer widgets
	register_sidebar(array(
		'name'			=>	'Footer Left',
		'id'			=>	'footer-left',
		'before_widget'	=> '<li class="widget %2$s">',
		'after_widget'	=> '</li>',
		'before_title'	=> '<h2>',
		'after_title'	=> '</h2>',
	));
	register_sidebar(array(
		'name'			=>	'Footer Center',
		'id'			=>	'footer-center',
		'before_widget'	=> '<li class="widget %2$s">',
		'after_widget'	=> '</li>',
		'before_title'	=> '<h2>',
		'after_title'	=> '</h2>',
	));
	register_sidebar(array(
		'name'			=>	'Footer Right',
		'id'			=>	'footer-right',
		'before_widget'	=> '<li class="widget %2$s">',
		'after_widget'	=> '</li>',
		'before_title'	=> '<h2>',
		'after_title'	=> '</h2>',
	));
	register_sidebar(array(
		'name'			=>	'Footer Address',
		'id'			=>	'footer-address',
		'before_widget'	=> '<li class="widget %2$s">',
		'after_widget'	=> '</li>',
		'before_title'	=> '<h2>',
		'after_title'	=> '</h2>',
	));
}


include_once('lib/twitter/versions-proxy.php');
include_once('lib/hacks.php');
include_once('lib/video-functions.php');

function attach_theme_options() {
	include_once('lib/theme-options/theme-options.php');
	include_once('options/theme-options.php');
	include_once('options/homepage-options.php');
	
	include_once('lib/custom-widgets/widgets.php');
	include_once('options/theme-widgets.php');
}

attach_theme_options();

/**
 * Shortcut function for acheiving
 * $no_nav_pages = _get_page_by_name('no-nav-pages');
 * wp_list_pages('sort_column=menu_order&exclude_tree=' . $no_nav_pages->ID);
 * with:
 * wp_list_pages('sort_column=menu_order&' . exclude_no_nav());
 */
function exclude_no_nav($no_nav_pages_slug='no-nav-pages') {
    $no_nav_page = _get_page_id_by_name($no_nav_pages_slug);
    return "exclude_tree=$no_nav_page";
}

/**
 * Checks if particular page ID has parent with particular slug
 */
$__has_parent_depth = 0;
function has_parent($id, $parent_name) {
    global $__has_parent_depth;
    $__has_parent_depth++;
    if ($__has_parent_depth==100) {
    	exit('too much recursion');
    }
    $post = get_post($id);
    
    if ($post->post_name==$parent_name) {
    	return true;
    }
    if ($post->post_parent==0) {
    	return false;
    }
    $__has_parent_depth--;
    return has_parent($post->post_parent, $parent_name);
}

/**
 * Example function for printing comments
 */
function print_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	    <div class="comment-author vcard">
	        <?php echo get_avatar($comment, 48, $default); ?>
	        <?php comment_author_link() ?>
	        <span class="says">says:</span>
	    </div>
	    <?php if ($comment->comment_approved == '0') : ?>
	        <em><?php _e('Your comment is awaiting moderation.') ?></em><br />
	    <?php endif; ?>
	
	    <div class="comment-meta commentmetadata">
	    	<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
	    		<?php comment_date() ?> at <?php comment_time() ?>
	    	</a>
	    	<?php edit_comment_link(__('(Edit)'),'  ','') ?>
    	</div>

	    <?php comment_text() ?>

	    <div class="reply">
	        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	    </div>
	<?php
}

define('STR_WORD_COUNT_FORMAT_ADD_POSITIONS', 2);
/**
 * >>> shortalize('lorem ipsum dolor sit amet');
 * ... lorem ipsum dolor sit amet
 * >>> shortalize('lorem ipsum dolor sit amet', 5);
 * ... lorem ipsum dolor sit amet
 * >>> shortalize('lorem ipsum dolor sit amet', 4);
 * ... lorem ipsum dolor sit...
 * >>> shortalize('lorem ipsum dolor sit amet', -1);
 */
function shortalize($input, $words_limit=15, $add_dots = '...') {
	$input = strip_tags($input);
    $words_limit = abs(intval($words_limit));
    if ($words_limit==0) {
        return $input;
    }
    $words = str_word_count($input, STR_WORD_COUNT_FORMAT_ADD_POSITIONS);
    if (count($words)<=$words_limit + 1) {
        return $input;
    }
    $loop_counter = 0;
    foreach ($words as $word_position => $word) {
        $loop_counter++;
        if ($loop_counter==$words_limit + 1) {
            return substr($input, 0, $word_position) . $add_dots;
        }
    }
}

# crawls the pages tree up to top level page ancestor 
# and returns that page as object
function get_page_ancestor($page_id) {
    $page_obj = get_page($page_id);
    while($page_obj->post_parent!=0) {
        $page_obj = get_page($page_obj->post_parent);
    }
    return get_page($page_obj->ID);
}

# example function for filtering page template
function filter_template_name() {
    global $post;
    
	$page_tpl = get_post_meta($post->ID, '_wp_page_template', 1);
	
	if ($page_tpl!="default") {
		return TEMPLATEPATH . '/' . $page_tpl;
	}
    /*
	# example logic here ... 
    $page_ancestor = get_page_ancestor($post->ID);
    
    if ($page_ancestor->post_name!='pages-branch-name') {
    	return TEMPLATEPATH . "/my-branch-template.php";
    }
    
    return TEMPLATEPATH . "/page.php";
    */
}
// add_filter('page_template', 'filter_template_name');

# shortcut for get_post_meta. Returns the string value 
# of the custom field if it exist. 
# second arg is required if you're not in the loop
function get_meta($key, $id=null) {
	if (!isset($id)) {
	    global $post;
	    if (empty($post->ID)) {
	    	return null;
	    }
	    $id = $post->ID;
    }
    return get_post_meta($id, $key, true);
}

/**
 * Returns posts page as object (setuped from Settings > Reading > Posts Page).
 *
 * If the page for posts is not chosen null is returned
 */
function get_posts_page() {
    $posts_page_id = get_option('page_for_posts');
    if ($posts_page_id) {
    	return get_page($posts_page_id);
    }
    return null;
}

/**
 * Parses custom field values to hash array. Expected 
 * custom field value format:
 * {{{
 * title: my cool title
 * image: http://example.com/images/1.jpg
 * caption: my cool image
 * }}}
 * Returned array looks like:
 * array(
 *     'title'=>'my cool title',
 *     'image'=>'http://example.com/images/1.jpg',
 *     'caption'=>'my cool image',
 * )
 */
function parse_custom_field($details) {
    $lines = array_filter(preg_split('~\r|\n~', $details));
    $res = array();
    foreach ($lines as $line) {
        if(!preg_match('~(.*?):(.*)~', $line, $pieces)) {
            continue;
        }
        $label = trim($pieces[1]);
        $val = trim($pieces[2]);
        $res[$label] = $val;
    }
    return $res;
}

function get_page_id_by_path($page_path) {
    $p = get_page_by_path($page_path);
    if (empty($p)) {
    	return null;
    }
    return $p->ID;
}

/*
PHP 4.2.x Compatibility function
http://www.php.net/manual/en/function.file-get-contents.php#80707
*/
if (!function_exists('file_get_contents')) {
	function file_get_contents($filename, $incpath = false, $resource_context = null) {
		if (false === $fh = fopen($filename, 'rb', $incpath)) {
			trigger_error('file_get_contents() failed to open stream: No such file or directory', E_USER_WARNING);
			return false;
		}
		
		clearstatcache();
		if ($fsize = @filesize($filename)) {
			$data = fread($fh, $fsize);
		} else {
			$data = '';
			while (!feof($fh)) {
				$data .= fread($fh, 8192);
			}
		}
		
		fclose($fh);
		return $data;
	}
}

function _print_ie6_styles() {
    $ie_css_file = dirname(__FILE__) . '/ie6.css';
    
	if (!file_exists($ie_css_file)) {
    	return;
    }
    $ie6_hacks = file_get_contents($ie_css_file);
    if (empty($ie6_hacks)) {
    	return;
    }
    
    echo '
<!--[if IE 6]>
<style type="text/css" media="screen">';
    echo "\n\n" . str_replace(
    	'css/images/', 
    	get_bloginfo('stylesheet_directory') . '/images/', 
    	$ie6_hacks
    );
    echo '

</style>
<![endif]-->';
    
}
add_action('wp_head', '_print_ie6_styles');

function shortcode_newsletter($atts, $content) {
	ob_start();
	?>
	<h4>Keep Current!</h4>
	<div class="col-cnt">
		<p>If you wish to keep up-to-date with Center for Vision Loss news, please share your e-mail address with us.</p>
		<div class="signup-holder">
			<form action="http://centerforvisionloss.createsend.com/t/r/s/uiliiu/" method="post" id="subForm">
				<label for="name">Name</label>
				<div class="cl">&nbsp;</div>
				<input type="text" class="field" id="name" name="cm-name" />
				<div class="cl">&nbsp;</div>
				<label for="email">Email</label>
				<div class="cl">&nbsp;</div>
				<input type="text" class="field" id="email" name="cm-uiliiu-uiliiu" />
				<div class="cl">&nbsp;</div>
				<input type="submit" value="Send" class="send-btn"/>
			</form>
		</div>
	</div>
	<?php
	$html = ob_get_contents();
	ob_end_clean();
	return $html;
}
add_shortcode('newsletter', 'shortcode_newsletter');

?>
<?php 
if (function_exists('add_theme_support')) {
    add_theme_support('nav-menus');
}
function new_excerpt_more($post) {
	return '<a href="'. get_permalink($post->ID) . '">' . ' MORE' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

?>
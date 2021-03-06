<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	
	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	<h3><?php comments_number('No Responses', 'One Response', '% Responses' );?></h3>
	<ol class="commentlist">
		<?php wp_list_comments('callback=print_comment'); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

<?php else : ?>
	<?php if ( comments_open() ) : ?>
        <!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<p class="nocomments">Comments are closed.</p>
	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
	<div id="respond">
		<h3>Leave a Reply</h3>
		
		<div class="cancel-comment-reply">
			<small><?php cancel_comment_reply_link(); ?></small>
		</div>
		
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<?php if ( is_user_logged_in() ) : ?>
					<p>
						Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. 
						<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a>
					</p>
				<?php else : ?>
					<label for="author">Name <?php if ($req) echo "(required)"; ?></label><br />
					<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" class="field" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
					<div class="cl">&nbsp;</div>
					
					<label for="email">Mail (will not be published) <?php if ($req) echo "(required)"; ?></label><br />
					<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" class="field" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
					<div class="cl">&nbsp;</div>
					
					<label for="url">Website</label><br />
					<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" class="field" tabindex="3" />
					<div class="cl">&nbsp;</div>
				<?php endif; ?>
				
				<label for="comment">Comment</label><br />
				<textarea name="comment" id="comment" cols="40" rows="10" tabindex="4" class="field"></textarea><br />
			
                <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />

				<?php comment_id_fields(); ?>
				<?php do_action('comment_form', $post->ID); ?>
			</form>
		<?php endif; // If registration required and not logged in ?>
	</div>
<?php endif; ?>
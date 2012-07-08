<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) {
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { ?>
			<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.' , 'ambrosia'); ?></p>
			<?php return;
		}
	}
?>

<?php if ($comments) : // there are comments ?>

		<aside id="comments">
			<h3><?php comments_number( __('No comments yet' , 'ambrosia'), __('One comment' , 'ambrosia'), __('% Comments' , 'ambrosia') ); ?></h3>
			<?php wp_list_comments('type=pings&callback=ambrosia_pings'); ?>
			<?php wp_list_comments('type=comment&callback=ambrosia_comment'); ?>
			
			<?php paginate_comments_links(); ?>
		</aside>

<?php else : // no comments yet ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- [comments are open, but there are no comments] -->
			
	 <?php else : ?>
		<!-- [comments are closed, and no comments] -->
		<?php if ( !is_page() ) : ?>
			<aside id="comments">
				<h3><?php _e('Comments are Closed!' , 'ambrosia'); ?></h3>
			</aside>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

		<section id="respond">

			<?php if (get_option('comment_registration') && !$user_ID) : ?>
				<p><?php _e('You must be' , 'ambrosia'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in' , 'ambrosia'); ?></a> <?php _e('to post a comment.' , 'ambrosia')?></p>
			<?php else : ?>

			<?php comment_form(); ?>
			 
			<?php endif; ?>

		</section>
<?php endif; ?>
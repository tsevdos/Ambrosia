<?php
//Translation Text domain
load_theme_textdomain('ambrosia', TEMPLATEPATH . '/lang' );
// Content Width
if ( !isset( $content_width ) ) $content_width = 515;
// Add Feed links
if(function_exists('automatic-feed-links')) {
    add_theme_support('automatic-feed-links');
}

// Load CSS
function ambrosia_load_styles() {
	if (!is_admin()) {
		wp_enqueue_style('fontapi', 'http://fonts.googleapis.com/css?family=Ubuntu:regular,italic,bold,bolditalic&subset=greek,latin');	
		wp_enqueue_style('main', get_template_directory_uri() . '/style.css');
	}
}
add_action('get_header', 'ambrosia_load_styles');

// Load JS
if (!is_admin()) {
	wp_enqueue_script('jquery');
	wp_enqueue_script('themescripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'));
}

// enable threaded comments
function enable_threaded_comments(){
	if (!is_admin()) {
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
			wp_enqueue_script('comment-reply');
		}
}
add_action('get_header', 'enable_threaded_comments');

//Widget areas
register_sidebar(array(
	'name' => __('Sidebar'),
	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	'after_widget' => '</section>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

register_sidebar(array(
	'name' => __('Footer first column'),
	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	'after_widget' => '</section>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

register_sidebar(array(
	'name' => __('Footer second column'),
	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	'after_widget' => '</section>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

register_sidebar(array(
	'name' => __('Footer third column'),
	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	'after_widget' => '</section>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

//Custom menu support
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'main'  => __('Sidebar main menu'),
			'secondary' => __('Sidebar secondary menu'),
		)
	);
}

// Ambrosia Custom Menus Callback (HTML5 markup)
// Categories menu
function ambrosia_category_menu_cb() {
	print '<nav class="main"><ul>';
	wp_list_categories('orderby=name&title_li=');
	print '</ul></nav>';
}

// Pages menu
function ambrosia_pages_menu_cb() {
	print '<nav class="secondary">';
	wp_page_menu('sort_column=menu_order&menu_class=pages');
	print '</nav>';
}

//Comment template
function ambrosia_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
?>
<article id="comment-<?php comment_ID(); ?>" <?php comment_class('clearfix'); ?>>
	<div class="avatar"><?php echo get_avatar( $comment, $size='48', $default='<path_to_url>' ); ?></div>
	<div class="meta">
		<p>
			<?php if ($comment->comment_author_url != "") : ?>
				<cite class="commentauthor"><a class="url" rel="external nofollow" href="<?php comment_author_url(); ?>"><?php comment_author(); ?></a></cite>
			<?php else : ?>
				<cite class="commentauthor"><?php comment_author(); ?></cite>
			<?php endif; ?>
				<span><a href="#comment-<?php comment_ID(); ?>" title="<?php _e('Permalink for this comment' , 'ambrosia'); ?>"><time datetime="<?php comment_date('c'); ?>"><?php comment_date('F jS, Y');  _e(' at ' , 'ambrosia'); comment_time(); ?></time></a></span>
				<span class="edit"><?php edit_comment_link(__('Edit'),'',''); ?></span>
		</p>
	</div>
	<div class="comment-entry">
		<?php if ($comment->comment_approved == '0') : ?>
			<p><?php _e('Your comment is awaiting moderation.' , 'ambrosia'); ?></p>
		<?php endif; ?>
		<?php comment_text(); ?>
	</div>
	<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
</article>
<?php 
}
//Pings template
function ambrosia_pings($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
?>
<article id="comment-<?php comment_ID(); ?>" <?php comment_class('clearfix'); ?>>
	<div class="meta">
		<p>
			<cite class="commentauthor"><a class="url" rel="external nofollow" href="<?php comment_author_url(); ?>"><?php comment_author(); ?></a></cite>
			<span><a href="#comment-<?php comment_ID(); ?>" title="<?php _e('Permalink for this comment' , 'ambrosia'); ?>"><time datetime="<?php comment_date('c'); ?>"><?php comment_date('F jS, Y');  _e(' at ' , 'ambrosia'); comment_time(); ?></time></a></span>
			<span class="edit"><?php edit_comment_link('Edit','',''); ?></span>
		</p>
	</div>
	<div class="comment-entry">
		<?php if ($comment->comment_approved == '0') : ?>
			<p><?php _e('Your comment is awaiting moderation.' , 'ambrosia'); ?></p>
		<?php endif; ?>
		<?php comment_text(); ?>
	</div>
</article>
<?php 
}
?>
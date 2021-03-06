<?php get_header(); ?>

	<div id="content" class="clearfix">
		
		<section id="posts">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<article id="post-<?php the_ID(); ?>" class="post first">
					
						<header>
							<h1><?php ( get_the_title() == '' ) ? _e("Permalink") : print the_title(); ?></h1>
							<p><time datetime="<?php the_time('c'); ?>"><?php the_time('F j, Y') ?></time> | <span class="categories"><?php _e('Filed under')?> <?php the_category(' '); ?></span></p>
						</header>
						
						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages('before=<p class="pager">Pages : &after=</p>'); ?>
						</div>
						
						<footer>
							<span class="vcard author"><?php _e('by' , 'ambrosia'); ?> <?php the_author(); ?></span> |
							<span class="tags"><?php _e('tags' , 'ambrosia'); ?> : <?php the_tags(' '); ?></span> |
							<span class="comments"><a href="<?php comments_link(); ?>"><?php comments_number('0','1','%'); ?></a></span>
							
							<nav class="pager">
								<ul>
									<li><?php next_post_link(); ?></li>
									<li><?php previous_post_link(); ?></li>
								</ul>
							</nav>
							
							<p>
								<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
									// both comments and pings open ?>
									<?php _e('You can ' , 'ambrosia'); ?>
									<a href="#respond"><?php _e('leave a response' , 'ambrosia'); ?></a>
									<?php _e(', or ', 'ambrosia'); ?>
									<a href="<?php print trackback_url(); ?>" rel="trackback">
									<?php _e('trackback' , 'ambrosia'); ?></a>
									<?php _e('from your own site.' , 'ambrosia') ?>
								<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
									// only pings are open ?>
									<?php _e('Responses are currently closed, but you can' , 'ambrosia'); ?>
									<a href="<?php print trackback_url(); ?>" rel="trackback">
									<?php _e('trackback' , 'ambrosia'); ?></a>
									<?php _e('from your own site.' , 'ambrosia'); ?>
								<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
									// comments are open, pings are not ?>
									<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.' , 'ambrosia'); ?>
								<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
									// neither comments nor pings are open ?>
									<?php _e('Both comments and pings are currently closed.' , 'ambrosia'); ?>
								<?php }
									edit_post_link(__('Edit this entry' , 'ambrosia'),'','.');
								?>
							</p>
							
						</footer>

						<?php comments_template('', true); ?>
						
					</article>
	
				<?php endwhile; ?>
	
				<?php else : ?>
	
					<?php get_template_part( 'noresults' ); ?>
	
				<?php endif; ?>
			
		</section>

<?php get_sidebar(); ?>

	</div>
	
</div> <!-- end of #container -->

<?php get_footer(); ?>
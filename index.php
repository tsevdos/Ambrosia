<?php get_header(); ?>

	<div id="content" class="clearfix">
		
		<section id="posts">

			<?php $counter = 0; ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<?php $counter++; ?>
					
					<?php if ($counter == 1) $extraclasses = 'first'; ?>
				
					<article id="post-<?php the_ID(); ?>" <?php post_class($extraclasses);?>>

						<header>
							<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to')?> <?php the_title_attribute(); ?>"><?php ( get_the_title() == '' ) ? _e("Permalink") : print the_title(); ?></a></h1>
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
						</footer>
					
					</article>
	
				<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'noresults' ); ?>

				<?php endif; ?>

				<nav class="pager">
					<ul>
						<li><?php previous_posts_link( __('&laquo; Newer Entries'), 0); ?></li>
						<li><?php next_posts_link( __('Older Entries &raquo;'), 0); ?></li>
					</ul>
				</nav>

		</section>

	<?php get_sidebar(); ?>

	</div>
	
</div> <!-- end of #container -->

<?php get_footer(); ?>
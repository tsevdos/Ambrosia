<?php get_header(); ?>

	<div id="content" class="clearfix">
		
		<section id="posts">

					<article id="post-404" class="post first">
					
						<header>
							<h1><?php _e('Error 404 - Not Found' , 'ambrosia'); ?></h1>
						</header>
						
						<div class="entry-content">
							<p>
								<?php _e('Sorry, but the requested resource was not found on this site.', 'ambrosia'); ?>
								<?php get_search_form(); ?>
							</p>
						</div>

					</article>
	
		</section>

<?php get_sidebar(); ?>

	</div>
	
</div> <!-- end of #container -->

<?php get_footer(); ?>
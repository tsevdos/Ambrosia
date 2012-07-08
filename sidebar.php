<aside id="sidebar">

	<section id="search" class="widget">
		<?php get_search_form(); ?>
	</section>

	<section class="widget">
	<?php
		wp_nav_menu( array(
						'theme_location'  => 'main',
						'container'       => 'nav',
						'container_class' => 'main',
						'fallback_cb'     => 'ambrosia_category_menu_cb',
						)
					);
	?>
	</section>

	<section class="widget">
	<?php
		wp_nav_menu( array(
						'theme_location'  => 'secondary',
						'container'       => 'nav',
						'container_class' => 'secondary',
						'fallback_cb'     => 'ambrosia_pages_menu_cb',
						)
					);
	?>
	</section>
	
	<?php if ( !dynamic_sidebar('Sidebar') ) : ?>
		<section class="widget">
			<h3>Meta</h3>
			<nav class="meta">
				<ul>
					<li><?php wp_loginout(); ?><li>
				</ul>
			</nav>
		</section>
	<?php endif; ?>

</aside>
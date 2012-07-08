<aside id="footer" class="clearfix">

	<div class="inner clearfix">
		
		<div class="first column">
			
			<?php if ( !dynamic_sidebar('Footer first column') ) : ?>
				
				<section class="widget">
					<h3><?php _e('Tag Cloud' , 'ambrosia'); ?></h3>
					<p>
						<?php wp_tag_cloud('smallest=8&largest=22'); ?>
					</p>
				</section>
				
			<?php endif; ?>
			
		</div>
		
		<div class="second column">
			
			<?php if ( !dynamic_sidebar('Footer second column') ) : ?>
				
				<section class="widget">
					<h3><?php _e('Archives' , 'ambrosia'); ?></h3>
					<ul>
						<?php wp_get_archives('type=monthly&limit=12'); ?>
					</ul>
				</section>
				
			<?php endif; ?>
			
		</div>
		
		<div class="third column">
			
			<?php if ( !dynamic_sidebar('Footer third column') ) : ?>
				
				<section class="widget">
					<h3><?php _e('Blogroll' , 'ambrosia'); ?></h3>
					<ul>
						<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
					</ul>
				</section>
				
			<?php endif; ?>
			
		</div>

	</div>
</aside>


<footer>
	<div class="inner">
		<p class="copy">Copyright &copy; <?php echo date('Y'); ?> - <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - is proudly powered by <a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform">WordPress</a>.</p>
		<p><em>Ambrosia Theme</em> was developed by <a href="http://phrappe.com/" title="Phrappe.com">John Tsevdos</a>.</p>
	</div>
</footer>

<?php wp_footer(); //we need this for plugins  ?>

</body>
</html>
<form id="searchform" class="clearfix" method="get" action="<?php home_url(); ?>">
	<label for="s"><?php _e('Search the site:' , 'ambrosia'); ?></label>
	<input type="search" id="s" name="s" placeholder="<?php _e('Search the site' , 'ambrosia'); ?>" value="<?php the_search_query(); ?>" />
	<input type="submit" id="submit" value="Search" />
</form>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php if ( function_exists('is_tag') && is_tag() ) {
			single_tag_title( __('Tag Archive for &quot;' , 'ambrosia') ); echo '&quot; - ';
		} elseif (is_archive()) {
			wp_title(''); _e(' Archive - ' , 'ambrosia');
		} elseif (is_search()) {
			_e('Search for &quot;' , 'ambrosia');
			echo esc_html($s) . '&quot; - ';
		} elseif (!(is_404()) && (is_single()) || (is_page())) {
			wp_title(''); echo ' - ';
		} elseif (is_404()) {
			_e('Not found - ', 'ambrosia');
		}
		
		if (is_home()) {
			bloginfo('name'); echo ' - '; bloginfo('description');
		} else {
			bloginfo('name');
		}
		
		if ($paged > 1) {
			_e(' - page ', 'ambrosia');
			echo $paged;
		}
	?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Pingback -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	
	<!-- IE HTML5 shiv -->
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

	<?php wp_head(); //we need this for plugins ?>
</head>

<body <?php body_class(); ?>>

<div id="container">
	
	<header>
		<hgroup class="clearfix">
			<h1><a href="<?php echo home_url(); ?>" title="<?php _e('Home', 'ambrosia')?>"><?php bloginfo('name'); ?></a></h1>
			<h2><?php bloginfo('description'); ?></h2>
		</hgroup>
	</header>
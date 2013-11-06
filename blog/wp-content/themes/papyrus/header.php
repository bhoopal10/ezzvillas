<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php global $papyrus_option, $query_string; ?><html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php
if (is_category()) {
	echo __('Category: ','papyrus_wdl'); wp_title(''); echo ' - ';

} elseif (function_exists('is_tag') && is_tag()) {
	single_tag_title(__('Tag Archive for &quot;','papyrus_wdl')); echo '&quot; - ';

} elseif (is_archive()) {
	wp_title(''); echo __(' Archive - ','papyrus_wdl');

} elseif (is_page()) {
	echo wp_title(''); echo ' - ';

} elseif (is_search()) {
	echo __('Search for &quot;','papyrus_wdl').esc_html($s).'&quot; - ';

} elseif (!(is_404()) && (is_single()) || (is_page())) {
	wp_title(''); echo ' - ';

} elseif (is_404()) {
	echo __('Not Found - ','papyrus_wdl');

} bloginfo('name');
?></title>
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- wrapper starts here -->
	<div id="wrapper">
		<!-- Logo section starts here -->
		<div id="logo_section">
			<div id="logo_section_top">
			
			</div>
			<div id="logo_section_middle">
				<div id="logo_section_middle_two">
					<!-- Logo starts here -->
						<div id="logo"> 
							<p><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></p>
							<p class="logo_desc"><?php bloginfo('description'); ?></p>
						</div>
					<!-- Logo ends here -->
					<!-- rss starts here -->
						<div id="logo_rss"> 
							<p><a href="<?php bloginfo('rss2_url'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" alt="Rss" /></a></p>
						</div>
					<!-- rss ends here -->	
					<?php $search_query = get_search_query(); if(empty($search_query)) $search_query = __('Enter search query here...', 'papyrus_wdl'); ?>
					<!-- search starts here -->
					<div id="logo_search"> 
						<div class="search_box">
							<form method="get" action="<?php echo home_url(); ?>/">
							<fieldset>
								<p><input type="text" onblur="if(this.value=='') this.value='<?php echo $search_query ?>'" onfocus="if(this.value=='<?php echo $search_query ?>') this.value=''" value="<?php echo $search_query; ?>" name="s" class="text" /></p>
								<p><input class="submit" type="submit" value="" /></p>
							</fieldset>
							</form>
						</div>
					</div>
					<!-- search ends here -->						
					
					
					
					
				</div>	
				
			
			
			</div>
			<div id="logo_section_bottom">
			
			</div>			

		
		
		</div>
		<!-- Logo section ends here -->
		<!-- menu starts here -->
			<div id="menu_section">

				<div id="menu"> 
					<?php wp_nav_menu( array( 'theme_location' => 'mainmenu', 'menu_class' => 'sf-menu', 'menu_id'=>'sf-menu', 'fallback_cb' => 'papyrus_wp_page_menu', 'container'=>'') ); ?>
				</div>
				
				<div id="social_section"> 
	
						<ul>
							<?php if(!empty($papyrus_option['main']['digg_id'])) : ?>
							<li><a href="<?php echo $papyrus_option['main']['digg_id']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/digg.png" alt="Digg" /></a></li>
							<?php endif; ?>														
							<?php if(!empty($papyrus_option['main']['reddit_id'])) : ?>
							<li><a href="<?php echo $papyrus_option['main']['reddit_id']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/reddit.png" alt="Reditt" /></a></li>
							<?php endif; ?>							
							<?php if(!empty($papyrus_option['main']['facebook_id'])) : ?>
							<li><a href="<?php echo $papyrus_option['main']['facebook_id']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="facebook" /></a></li>
							<?php endif; ?>
							<?php if(!empty($papyrus_option['main']['stumbleupon_id'])) : ?>
							<li><a href="<?php echo $papyrus_option['main']['stumbleupon_id']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/stumble.png" alt="stumbleupon" /></a></li>
							<?php endif; ?>
							<?php if(!empty($papyrus_option['main']['twitter_id'])) : ?>
							<li><a href="<?php echo $papyrus_option['main']['twitter_id']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="Twitter" /></a></li>
							<?php endif; ?>
							<?php if(!empty($papyrus_option['main']['technorati_id'])) : ?>
							<li><a href="<?php echo $papyrus_option['main']['technorati_id']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/techno.png" alt="Technoratti" /></a></li>
							<?php endif; ?>														
						</ul>
					
				</div>	

			</div>
		<!-- menu ends here -->		
		
		<!-- Featured section starts here -->
			<div id="featured_section">
				<?php get_template_part( 'featured', 'posts' ); ?>
			</div>
		<!-- Featured section ends here -->		
		
		<!-- Content section starts here -->
		<div id="content_section">
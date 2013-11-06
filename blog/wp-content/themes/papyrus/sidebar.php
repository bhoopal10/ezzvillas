<?php
	global $papyrus_option;
?>
				<!-- Sidebar section starts here -->
				<div id="sidebar_section">
					<!-- Twitter section starts here -->
					<div id="twitter_section">
						<div id="twitter_update_list_1985"></div>
						<div id="twitter_follow"><p><a href="<?php if(!empty($papyrus_option['main']['twitter_id'])) {echo $papyrus_option['main']['twitter_id'];} ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter_follow.png" alt="Twitter" /></a></p></div>
					</div>
					<!-- Twitter section ends here -->
					<!-- Sidebar widget section starts here -->
					<div id="sidebar_widget_section">
						<!-- 125 ads start here -->
							<div id="sidebarads">
								<?php papyrus_theme_ads_show(); ?>
							</div>
								
						<!-- 125 ads end here -->
						
						<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-middle') ){
													} else { ?>
												<div class="widget widget_categories">
													<h3 class="widgettitle"><?php _e('Categories', 'papyrus_wdl') ?></h3>
													<ul><?php wp_list_categories('show_count=0&title_li='); ?></ul>	
												</div><!-- /widget -->
												
												<div class="widget widget_archive">
													<h3 class="widgettitle"><?php _e('Archives', 'papyrus_wdl') ?></h3>
													<ul>
													<?php wp_get_archives('type=monthly'); ?>
													</ul>
												</div><!-- /widget -->
												
												<div class="widget widget_links">
													<h3 class="widgettitle"><?php _e('Blogrolls', 'papyrus_wdl') ?></h3>
													<ul>
													<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
													</ul>	
												</div><!-- /widget -->				
												
															
						<?php } ?>
			
					</div>
					<!-- Sidebar widget section ends here -->
					<!-- Sidebar bottom section starts here -->
					<div id="sidebar_bottom_section">
			
			
					</div>
					<!-- Sidebar bottom ends here -->										
		
		
				</div>
				<!-- Sidebar section ends here -->			
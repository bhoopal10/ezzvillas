<?php global $papyrus_option; get_header(); ?>

				<!-- post section starts here -->
				<div id="post_section">


												<!-- Actual Post starts here -->
												<div <?php post_class('actual_post') ?> id="post-<?php the_ID(); ?>">
													<div class="actual_post_title">
														<h2><?php _e('Error 404 - Page not found!', 'papyrus_wdl') ?></a></h2>
													</div>
													
													<div class="post_entry">
														
														<div class="entry">
															<p><?php _e('The page you trying to reach does not exist, or has been moved. Please use the menus or the search box to find what you are looking for.', 'papyrus_wdl') ?></p>																				
														</div>

													</div>
												</div>
												<!-- Actual Post ends here -->		




		
		
				</div>
				<!-- post section ends here -->		
				
				<?php get_sidebar(); ?>
									
			<?php get_footer(); ?>				
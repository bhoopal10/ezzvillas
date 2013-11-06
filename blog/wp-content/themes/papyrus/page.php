<?php global $papyrus_option; get_header(); ?>

				<!-- post section starts here -->
				<div id="post_section">

											<?php if (have_posts()) : ?>
											<?php $count = 0; while (have_posts()) : the_post(); $count++; ?>
												<!-- Actual Post starts here -->
												<div <?php post_class('actual_post') ?> id="post-<?php the_ID(); ?>">
													<div class="actual_post_title">
														<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'papyrus_wdl' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
													</div>
													<div class="metadata">
														
													</div><!-- /metadata -->
													<div class="post_entry">
														<?php if(!empty($papyrus_option['main']['ads_single_300'])) : ?>
														<div class="post_ad_single">
															<?php echo $papyrus_option['main']['ads_single_300']; ?>
														</div>
														<?php endif; ?>
														<div class="entry">
															<?php the_content(__('<span>Continue Reading >></span>', 'papyrus_wdl')); ?>
															<div class="clear"></div>
															<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'papyrus_wdl' ) . '</span>', 'after' => '</div>' ) ); ?>																				
														</div>
														<?php if(!empty($papyrus_option['main']['ads_single_468'])) : ?>
														<div class="post_ad">
															<?php echo $papyrus_option['main']['ads_single_468']; ?>
														</div>
														<?php endif; ?>
													</div>
												</div>
												<!-- Actual Post ends here -->		
												<?php comments_template(); ?>
												<?php endwhile; ?>
												<?php endif; ?>



		
		
				</div>
				<!-- post section ends here -->		
				
				<?php get_sidebar(); ?>
									
			<?php get_footer(); ?>				
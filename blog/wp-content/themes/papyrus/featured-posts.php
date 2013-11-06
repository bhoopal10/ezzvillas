<?php global $papyrus_option; ?>
							<!-- Featured slider starts here -->
							<?php query_posts('ignore_sticky_posts=1&post_type=post&meta_key=_slider&meta_value=yes&showposts='.$papyrus_option['main']['number_posts']); ?>
							<?php if (have_posts()) : ?>
							<div id="featured_slider">
								<div id="slides">
									<?php while (have_posts()) : the_post(); ?>
									<div class="item">
										<div class="pic">
											<?php if ( has_post_thumbnail()) : ?>
											<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('papyrus'); ?></a>
											<?php endif; ?>
										</div>
										
										<div class="featuredesc">
											<h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo papyrus_get_limited_string(get_the_title(), 40, '...') ?></a></h2>
											<p><?php echo papyrus_get_limited_string(get_the_excerpt(), 150, '...') ?></p>
											<p><a href="<?php the_permalink() ?>" class="btn_more"><span><?php _e('Read More','papyrus_wdl'); ?></span></a></p>
										</div>
										
									</div>	
									<?php endwhile;  ?>
								</div>
								<div id="nav"><div></div></div>
							
							
							
							</div>
							<?php endif; wp_reset_query(); ?>
							<!-- Featured slider ends here -->			
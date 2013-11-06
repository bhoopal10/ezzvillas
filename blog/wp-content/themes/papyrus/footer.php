<?php global $papyrus_option; ?>

		</div>
		<!-- Content section ends here -->
		
		<!-- Footer section starts here -->
		<div id="footer_section">
			<p>(C) All Rights Reserved. <?php bloginfo('name'); ?></p>
			<p>Powered by <a href="http://www.wordpress.org/">WordPress</a> | Theme by <a href="http://www.webdesignlessons.com/">WebDesignLessons.com</a></p>
		</div>
		<!-- Footer section ends here -->				
	
	
	</div>
	<!-- wrapper starts here -->





<?php if(!empty($papyrus_option['main']['twitter_id'])) echo papyrus_twitter_script('1985',$papyrus_option['main']['twitter_id'],1); //Javascript output function ?>
<?php wp_footer(); ?>
</body>
</html>
<?php
/**
 * The template for displaying the footer-2
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

		<div id="footer-wrapper">	
			<div class="copyright-body custom-padding">
				<div class="container">
					<div class="row">
					<div class="col-md-12">
						<div class="terms-policy">
							<a href="<?php echo get_permalink( get_page_by_path( 'terms-and-conditions' ) );?>">Terms & Conditions</a>
							<span>|</span>
							<a href="<?php echo get_permalink( get_page_by_path( 'privacy-policy' ) );?>">Privacy Policy</a>
							<span>|</span>
							<a href="<?php echo get_permalink( get_page_by_path( 'order-tracking' ) );?>">Order Tracking</a>
						</div>
						<div class="social-networking">
							<div class="copyright-name"><span>&copy; 2015 PILI | Elemie Naturals</span></div>
							<div class="networking-sites">
								<a href="https://www.facebook.com/ElemieNaturals" target="_blank">
									<img src="<?php echo get_template_directory_uri(); ?>/images/fb.png" />
								</a>
								<a href="https://instagram.com/elemienaturals" target="_blank">
									<img src="<?php echo get_template_directory_uri(); ?>/images/insta.png" />
								</a>
								<a href="https://twitter.com/elemienaturals" target="_blank">
									<img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" />
								</a>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>

<?php wp_footer( '2' ); ?>
</body>
</html>
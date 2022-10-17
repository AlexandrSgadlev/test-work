<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package alex-sgadlev-theme
 */
?>

<footer class="site-footer">
		<div class="container">
			<div class="main-footer d-flex">
				<div class="f-main-left">
					<div class="footer-logo">
						<a href="/" class="custom-logo-link" rel="home" aria-current="page">
							<img width="204" height="50" src="<?php echo THEME_URI; ?>/images/logo-footer.png" alt="Logo" />
						</a>
					</div>
					<p class="footer-description">
						<?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget sollicitudin odio, ut egestas dolor. Cras pretium enim diam. Duis ligula tortor, tincidunt vel eleifend ut.', THEME_NAME) ?>
					</p>
				</div>
				<div class="f-main-right">
					<div class="footer-user-activity-counter">
						<p class="widget-title"><img class="img-bonus" src="<?php echo THEME_URI; ?>/images/bonus.png" alt="Bonus" /><?php _e('Visitor Counter', THEME_NAME) ?></p>
						<p class="visitor-summ"><span>0</span><span>0</span><span>0</span><span>0</span><span>0</span><span>0</span></p>
						<ul class="visitor-list">
							<li>
								<span><img src="<?php echo THEME_URI; ?>/images/visitor-list-1.svg" alt="Visit Today"></span>
								<?php _e('Visit Today', THEME_NAME) ?>: 1
							</li>
							<li>
								<span><img src="<?php echo THEME_URI; ?>/images/visitor-list-2.svg" alt="Total Visit"></span>
								<?php _e('Total Visit', THEME_NAME) ?>: 1
							</li>
							<li>
								<span><img src="<?php echo THEME_URI; ?>/images/visitor-list-4.svg" alt="Hits Today"></span>
								<?php _e('Hits Today', THEME_NAME) ?>: 1
							</li>
							<li>
								<span><img src="<?php echo THEME_URI; ?>/images/visitor-list-5.svg" alt="Total Visit"></span>
								<?php _e('Total Hits', THEME_NAME) ?>: 1
							</li>
							<li>
								<span><img src="<?php echo THEME_URI; ?>/images/visitor-list-6.svg" alt="Total Visit"></span>
								<?php _e('Who’s Online', THEME_NAME) ?>: 1
							</li>
						</ul>
					</div>
				</div>
			</div>
			<hr>
			<div class="bottom-footer">
				<div class="copyright">
					<p class="d-flex">
						<span class="text-left"><?php _e('Terms & Conditions | Privacy Policy', THEME_NAME) ?></span>
						<span class="float-right">
							<span><?php _e('Copyright', THEME_NAME) ?> &#169; 2021.</span>
							<span><?php _e('All Rights Reserved', THEME_NAME) ?></span>
						</span>
					</p>
				</div>
			</div>
		</div>
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>

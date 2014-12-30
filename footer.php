<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Arizona District
 */
?>


	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-footer-nav">
			<?php arizona_district_footer_menu(); ?>
		</div><!-- .site-info -->

		<div class="site-footer-info">
			<div class="wrapper">
				<div class="site-footer-info-logo col-2-12 hide-on-mobile">
					<img src="<?php bloginfo('template_directory');?>/images/round_logo.png" alt="Arizana District Council">
				</div>
				<div class="site-footer-info-contact col-2-12 mobile-col-1-1">
					<p class="support-text">
					<?php bloginfo( 'name' ); ?><br />
					1111 N Glenstone<br />
					Springfield, MO<br />
					(573) 680-7902
					</p>
				</div>
				<div class="site-footer-info-about col-5-12 mobile-col-1-1">
					<p class="support-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam scelerisque gravida nisi, sed feugiat neque suscipit vitae. Aliquam scelerisque gravida nisi, sed feugiat neque suscipit vitae.</p>
					<p class="copy-right-text"><?php _e( 'Copyright &copy; ' ); ?> <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?> <?php _e( 'All rights reserved.' ); ?></p>
				</div>
				<div class="site-footer-info-social col-3-12 mobile-col-1-1">
					<ul class="soc">
					    <li><a class="soc-twitter" href="#"></a></li>
					    <li><a class="soc-facebook" href="#"></a></li>
					    <li><a class="soc-instagram" href="#"></a></li>
					    <li><a class="soc-youtube soc-icon-last" href="#"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>

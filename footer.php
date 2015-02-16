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
					<?php the_field('street_address', 'option'); ?><br />
					<?php the_field('suite', 'option'); ?><br />
					<?php the_field('city,_state,_zip', 'option'); ?><br />
					Phone: <?php the_field('phone_number', 'option'); ?><br />
					Fax: <?php the_field('fax_number', 'option'); ?>
					</p>
				</div>
				<div class="site-footer-info-about col-5-12 mobile-col-1-1">
					<p class="support-text"><?php the_field('about_paragraph', 'option'); ?></p>
					<p class="copy-right-text"><?php _e( 'Copyright &copy; ' ); ?> <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?> <?php _e( 'All rights reserved.' ); ?></p>
				</div>
				<div class="site-footer-info-social col-3-12 mobile-col-1-1">
					<ul class="soc">
						<?php if( get_field('twitter_url', 'option') ): ?><li><a class="soc-twitter" href="<?php the_field('twitter_url', 'option'); ?>"></a></li><?php endif; ?>
					    <?php if( get_field('facebook_url', 'option') ): ?><li><a class="soc-facebook" href="<?php the_field('facebook_url', 'option'); ?>"></a></li><?php endif; ?>
					    <?php if( get_field('instagram_url', 'option') ): ?><li><a class="soc-instagram" href="<?php the_field('instagram_url', 'option'); ?>"></a></li><?php endif; ?>
					    <?php if( get_field('youtube_url', 'option') ): ?><li><a class="soc-youtube soc-icon-last" href="<?php the_field('youtube_url', 'option'); ?>"></a></li><?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>

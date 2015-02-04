<?php
/**
 * The template for displaying all single posts.
 *
 * @package Arizona District
 */

get_header(); ?>

<?php get_template_part( 'templates/header', 'support_menu' ); ?>

<?php get_template_part( 'templates/header', 'menu' ); ?>
<div class="mobile-menu"><?php get_template_part( 'templates/header', 'mobile-menu' ); ?></div>

	<span class="spacer">-</span>
	<div id="primary" class="content-area page-with-sidebar">

		<?php arizona_district_page_header(); ?>

		<div class="wrapper">
			<aside class="sidebar col-3-12 hide-on-mobile">
			</aside>

			<main id="main" class="site-main col-9-12" role="main">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>
					<?php $summary = get_field("document_summary");
  					$excerpt = substr($summary, 0, 130); ?>
					<div class="document wrapper">
				      <div class="icon">
				          <a href="<?php the_field("document_file"); ?>">
				            <img src="<?php bloginfo('template_directory'); ?>/images/file_icon.jpg" alt="Document Icon">
				          </a>
				        </div>
				      <div class="document_text">
				          <a href='<?php the_field("document_file"); ?>' class="title" target="_Blank"><?php the_title(); ?> <span>(<?php the_field("document_type"); ?>)</span></a>
				          <p><?php echo $excerpt; ?>...</p>
				          <a href="<?php the_field('document_file'); ?>" target="_Blank">Download</a>
				        </div>
				     </div>

					<?php if( get_field('related_leadership') ) { ?>
						<?php $post_object = get_field('related_leadership');

								$post = $post_object;
								setup_postdata( $post );?>

							<div class="leadership-item leadership-item-module wrapper">
								<div class="leadership_photo col-3-12">
									<?php $image = get_field('leadership_photo');
									if( !empty($image) ):
										$url = $image['url'];
										$size = 'thumbnail';
										$thumb = $image['sizes'][ $size ];?>
										<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" /></a>
									<?php endif; ?>
								</div>
								<div class="leadership_info col-6-12">
									<h3><?php the_title(); ?></h3>
									<h5><?php the_field("leadership_title"); ?></h5>
									<p class="support-text"><?php the_field("leadership_phone"); ?></p>
									<p class="support-text"><?php the_field("leadership_email"); ?></p>
									<p class="support-text"><a href="<?php the_permalink(); ?>">View Profile</a></p>
								</div>
								<div class="social-links col-3-12">
									<?php if( get_field('leadership_facebook') ) { ?><p class="support-text"><a href="<?php the_field('leadership_facebook'); ?>">Facebook</a></p><?php } ?>
									<?php if( get_field('leadership_twitter') ) { ?><p class="support-text"><a href="<?php the_field('leadership_twitter'); ?>">Twitter</a></p><?php } ?>
									<?php if( get_field('leadership_instagram') ) { ?><p class="support-text"><a href="<?php the_field('leadership_instagram'); ?>">Instagram</a></p><?php } ?>
								</div>
							</div>

							<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

					<?php } ?>


				<?php endwhile; // end of the loop. ?>
			</main><!-- #main -->
		</div>
	</div><!-- #primary -->


<?php if( get_field('instagram_bar') ) { ?>
	<?php arizona_district_instagram_bar(); ?>
<?php } ?>


<?php if( get_field('resources_bar') ) { ?>
	<?php arizona_district_resources_bar(); ?>
<?php } ?>




<?php get_footer(); ?>

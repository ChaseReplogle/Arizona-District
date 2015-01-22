<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
				<?php arizona_district_leadership_sidebar(); ?>
			</aside>

			<main id="main" class="site-main col-9-12" role="main">
				<?php while ( have_posts() ) : the_post(); ?>

					<h1><?php the_title(); ?></h1>

					<?php the_content(); ?>

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

						</div>
						<div class="social-links col-3-12">
							<?php if( get_field('leadership_facebook') ) { ?><p class="support-text"><a href="<?php the_field('leadership_facebook'); ?>">Facebook</a></p><?php } ?>
							<?php if( get_field('leadership_twitter') ) { ?><p class="support-text"><a href="<?php the_field('leadership_twitter'); ?>">Twitter</a></p><?php } ?>
							<?php if( get_field('leadership_instagram') ) { ?><p class="support-text"><a href="<?php the_field('leadership_instagram'); ?>">Instagram</a></p><?php } ?>
						</div>
					</div>

				<?php endwhile; // end of the loop. ?>
			</main><!-- #main -->
		</div>
	</div><!-- #primary -->


<?php get_footer(); ?>

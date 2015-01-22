<?php
/*
Template Name: Video & Audio
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
				<?php arizona_district_sidebar_nav(); ?>
			</aside>

			<main id="main" class="site-main col-9-12" role="main">

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">

						<h1>Video & Audio Archive</h1>

						<?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

						<div class="video_audio-item wrapper">
							<div class="col-4-12">
								<?php $image = get_field('preview_image');
								if( !empty($image) ):
									$url = $image['url'];
									$size = 'thumbnail';
									$thumb = $image['sizes'][ $size ];?>
									<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" /></a>
								<?php else : ?>
									<a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/video.jpg"></a>
								<?php endif; ?>
							</div>

							<div class="col-8-12">
								<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
								<p class="support-text">Uploaded: <?php $updated = get_the_time('F j, Y',$latest_post[0]->ID);
								 	echo $updated; ?></p>
								<p class="support-text">Type: <?php the_field('media_type'); ?> </p>
								<p class="support-text">Categories: <?php the_category(", ");?></p>
							</div>
						</div>

								<hr>

						<?php endwhile; ?>
						<!-- pagination -->
						<?php if(function_exists('wp_paginate')) {
						    wp_paginate();
						}?>
						<?php else : ?>
						<!-- No posts found -->
						<?php endif; ?>


						</div><!-- .entry-content -->

					</article><!-- #post-## -->

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

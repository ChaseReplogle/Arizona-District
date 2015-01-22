<?php get_header(); ?>

<?php get_template_part( 'templates/header', 'support_menu' ); ?>

<?php get_template_part( 'templates/header', 'menu' ); ?>
<div class="mobile-menu"><?php get_template_part( 'templates/header', 'mobile-menu' ); ?></div>

	<span class="spacer">-</span>
	<div id="primary" class="content-area page-with-sidebar">

		<?php arizona_district_page_header(); ?>

		<div class="wrapper">
			<aside class="sidebar col-3-12 hide-on-mobile">
				<?php arizona_district_vide_audio_sidebar(); ?>
			</aside>

			<main id="main" class="site-main col-9-12" role="main">
				<?php while ( have_posts() ) : the_post(); ?>

					<h1><?php the_title(); ?></h1>

					<p class="support-text">Uploaded: <?php $updated = get_the_time('F j, Y',$latest_post[0]->ID); echo $updated; ?></p>

					<div class="media-item">
						<?php if( get_field('vimeo') ) { ?>
							<iframe src='//player.vimeo.com/video/<?php the_field("vimeo"); ?>?title=0&amp;byline=0&amp;portrait=0' width="1000" height="563" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						<?php } ?>


						<?php if( get_field('youtube') ) { ?>
								<iframe width="853" height="480" src="//www.youtube.com/embed/<?php the_field('youtube');?>?rel=0" frameborder="0" allowfullscreen></iframe>
						<?php } ?>


						<?php if( get_field('audio_link') ) { ?>
								<audio controls="controls" width="100%">
								   <source src="<?php the_field('audio_link'); ?>" />
								</audio>
						<?php } ?>

						<?php if( get_field('audio_upload') ) { ?>
								<audio controls="controls" width="100%">
								   <source src="<?php the_field('audio_upload'); ?>" />
								</audio>
						<?php } ?>
					</div>

					<p class="support-text">Categories: <?php the_category(", ");?></p>

					<hr>

					<?php the_content(); ?>




				<?php endwhile; // end of the loop. ?>
			</main><!-- #main -->
		</div>
	</div><!-- #primary -->


<?php get_footer(); ?>

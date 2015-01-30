<?php get_header(); ?>

<?php get_template_part( 'templates/header', 'support_menu' ); ?>

<?php get_template_part( 'templates/header', 'menu' ); ?>
<div class="mobile-menu"><?php get_template_part( 'templates/header', 'mobile-menu' ); ?></div>

	<span class="spacer">-</span>
	<div id="primary" class="content-area page-with-sidebar">

		<?php arizona_district_page_header(); ?>

		<div class="wrapper">
			<aside class="sidebar col-3-12 hide-on-mobile">
				<?php arizona_district_church_sidebar(); ?>
			</aside>

			<main id="main" class="single-church-main site-main col-9-12" role="main">
				<?php while ( have_posts() ) : the_post(); ?>

				<header class="entry-header header-with-button wrapper">

					<span class="button button-headline"><a href="#hidden-form">Suggest an Edit</a></span>

					<h1><?php the_field('church_name');?><span class="by-line"><?php the_field('church_city');?>, AZ</span></h1>
				</header>

					<div class="hidden-form" id="hidden-form">
						<?php
						$churchname = get_field('church_name');
						$churchcity = get_field('church_city');
						$church = '' . $churchname . ', ' . $churchcity . ', AZ';

						$field_values = $array = array(
						    "church" => $church,
						);?>
						<?php gravity_form(3, $display_title=true, $display_description=true, $display_inactive=false, $field_values, $ajax=true, $tabindex); ?>
						<hr>
					</div>

					<div class="entry-content">
						<p><span class="church-label">Pastor:</span> <?php the_field('pastors_name');?></p>
						<p><span class="church-label">Phone:</span> <?php the_field('phone');?></p>
						<p><span class="church-label">Email:</span> <?php the_field('email');?></p>
						<?php $location = get_field('location'); ?>
						<p><span class="church-label">Location:</span><br />
							<?php echo $location[address];?>
							<a href="http://maps.google.com/maps?z=12&t=m&q=loc:<?php echo $location[lat] ?>+<?php echo $location[lng] ?>" target="_blank" class="direction_link">Get Directions</a>
						</p>
						<?php if( get_field('mailing_address') ) { ?>
							<p><span class="church-label">Mailing Address:</span><br />
							<?php the_field('mailing_address');?></p>
						<?php } ?>
						<?php if( get_field('website') ) { ?>
							<hr>
							<p><a href="http://<?php the_field('website'); ?>" class="button button-full" target="_Blank">Church Website</a></p>
						<?php } ?>
					</div>

					<?php if( !empty($location) ): ?>
						<div class="acf-map">
							<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
								<h4><?php the_field('church_name'); ?></h4>
								<p class="address"><?php echo $location['address']; ?></p>
							</div>
						</div>
					<?php endif; ?>
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

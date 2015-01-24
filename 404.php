<?php
/**
 * The template for displaying 404 pages (not found).
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
				<div class="sidebar-searchform">
					<?php get_template_part( 'searchform', 'sidebar' );  ?>
				</div>
			</aside>

			<main id="main" class="site-main col-9-12" role="main">
					<h1>Sorry, we couldn't find this page.</h1>

					<p>Try searching for the page you are looking for or use the naviagation in the footer below.</p>

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

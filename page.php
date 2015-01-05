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
		<div class="page-inner-header"
			<?php  $header_image = get_field('header_image');
			if($header_image!=''){
				$size = 'large';
				$image = wp_get_attachment_image_src( $header_image, $size ); ?>
			style="background: url('<?php echo $image[0]; ?>') no-repeat center center;-webkit-background-size: cover;
			-moz-background-size: cover; -o-background-size: cover; background-size: cover;
			filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $image[0]; ?>', sizingMethod='scale'); -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $image[0]; ?>', sizingMethod='scale')";"
			<?php } ?>
		>
			<div class="gradient"></div>
			<div class="wrapper">
				<h2><?php page_ancestor(); ?></h2>
				<?php the_breadcrumb(); ?>
			</div>
		</div><!-- .page-inner-header -->


		<div class="wrapper">
			<aside class="sidebar col-3-12 hide-on-mobile">
				<?php arizona_district_sidebar_nav(); ?>
			</aside>

			<main id="main" class="site-main col-9-12" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
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

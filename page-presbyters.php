<?php
/*
Template Name: Presbyters
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
				<?php while ( have_posts() ) : the_post(); ?>


					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<?php
							$full_title = get_field('full_title');
								if($full_title!=''){
									echo "<h1>".$full_title."</h1>";
								} else {
									the_title( '<h1 class="entry-title">', '</h1>' );
								}
							?>
						</header><!-- .entry-header -->

						<div class="entry-content">

			 			<?php $args = array (
							'post_type'     => 'leadership',
							 'meta_query'     => array(
						        array(
						            'key'       => 'leadership_position',
						            'value'     => 'presbyter',
						            'compare'   => '='
						        )
						    ),
						    'orderby'  => 'meta_value',            // this means we will be using a selected
						                                           // meta field to order

						    'meta_key' => 'leadership_title', // this states which meta field
						                                           // will be used in the ordering,
						                                           // regardless of the filters
						    'order'    => 'ASC',
						);

						$leadership = new WP_Query( $args );

						if ( $leadership->have_posts() ) { ?>
							<?php while ( $leadership->have_posts() ) {
								$leadership->the_post();?>
								<?php arizona_district_leadership(); ?>
							<?php }
						} else {
						}
						wp_reset_postdata(); ?>


						</div><!-- .entry-content -->

					</article><!-- #post-## -->




				<?php endwhile; // end of the loop. ?>
			</main><!-- #main -->
		</div>
	</div><!-- #primary -->

<?php if( get_field('subscribe_bar') ) { ?>
	<?php arizona_district_subscribe_link(); ?>
<?php } ?>

<?php if( get_field('instagram_bar') ) { ?>
	<?php arizona_district_instagram_bar(); ?>
<?php } ?>


<?php if( get_field('resources_bar') ) { ?>
	<?php arizona_district_resources_bar(); ?>
<?php } ?>




<?php get_footer(); ?>

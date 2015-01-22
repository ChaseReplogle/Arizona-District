<?php
/*
Template Name: Navigational
*
*
* These pages are used for navigation only, when subpages exist and there is no page content.
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

				<?php while ( have_posts() ) : the_post(); ?>
					<?php $postid = get_the_ID();
				$args = array(
				    'post_type'      => 'page',
				    'posts_per_page' => -1,
				    'post_parent'    => $postid,
				    'order'          => 'ASC',
				    'orderby'        => 'menu_order'
				 );


				$parent = new WP_Query( $args );

				if ( $parent->have_posts() ) : ?>

				    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

				        <div class="child-page-navigational">

				            <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>

				            <?php the_excerpt(); ?>

				            <p class="support_text"><a href="<?php the_permalink(); ?>">Learn More</a></p>

				        </div>

				    <?php endwhile; ?>

				<?php endif; wp_reset_query(); ?>

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

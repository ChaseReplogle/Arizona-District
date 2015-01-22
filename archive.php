<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

			 <h1 class="page-title">
        <?php
            if ( is_category() ) {
                printf( __( 'Category: %s', 'shape' ), '<span>' . single_cat_title( '', false ) . '</span>' );

            } elseif ( is_tag() ) {
                printf( __( 'Tag: %s', 'shape' ), '<span>' . single_tag_title( '', false ) . '</span>' );

            } elseif ( is_author() ) {
                /* Queue the first post, that way we know
                 * what author we're dealing with (if that is the case).
                */
                the_post();
                printf( __( 'Author: %s', 'shape' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
                /* Since we called the_post() above, we need to
                 * rewind the loop back to the beginning that way
                 * we can run the loop properly, in full.
                 */
                rewind_posts();

            } elseif ( is_day() ) {
                printf( __( 'Daily: %s', 'shape' ), '<span>' . get_the_date() . '</span>' );

            } elseif ( is_month() ) {
                printf( __( 'Monthly: %s', 'shape' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

            } elseif ( is_year() ) {
                printf( __( 'Yearly: %s', 'shape' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

            } else {
                _e( 'Archives', 'shape' );

            }
        ?>
    </h1>
    <?php
        if ( is_category() ) {
            // show an optional category description
            $category_description = category_description();
            if ( ! empty( $category_description ) )
                echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

        } elseif ( is_tag() ) {
            // show an optional tag description
            $tag_description = tag_description();
            if ( ! empty( $tag_description ) )
                echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
        }
    ?>



				<?php while ( have_posts() ) : the_post(); ?>

				<div class="archive-item">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
					<p class="support-text">Posted: <?php $updated = get_the_time('F j, Y',$latest_post[0]->ID); echo $updated; ?></p>
					<p class="support-text"><?php $post_type = get_post_type_object( get_post_type($post) ); echo $post_type->label ; ?></p>
					<?php the_excerpt(); ?>
				</div>


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


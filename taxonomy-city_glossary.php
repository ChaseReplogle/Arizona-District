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

			<main id="main" class="site-main col-9-12" role="main">

					<h1>Cities begining with "<?php $term = $wp_query->queried_object; echo $term->name; ?>"</h1>

					<?php $taxonomy = 'city_glossary';
						$terms = get_terms($taxonomy);
						    $alphabet = array();
						    if($terms){
						        foreach ($terms as $term){
						            $alphabet[] = $term->slug;
						        }
						} ?>
						<div id="city_archive-menu" class="menu wrapper tax_nav" >
							<p class="support-text">Cities (Alphabetical)</p>
						    <ul id="city-menu">

						    <?php foreach(range('a', 'z') as $i) :

						        $current = ($i == get_query_var($taxonomy)) ? "current-menu-item" : "menu-item";

						        if (in_array( $i, $alphabet )){
						            printf( '<li class="az-char %s"><a href="%s">%s</a></li>', $current, get_term_link( $i, $taxonomy ), strtoupper($i) );
						        } else {
						            printf( '<li class="az-char %s">%s</li>', $current, strtoupper($i) );
						        }
							endforeach;?>
						    </ul>
						</div> <!-- menu #city-menu -->


						<?php // WP_Query arguments
						$term = $wp_query->queried_object;
			 			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array (
							'post_type'     	=> 'church',
							'posts_per_page'	=> -1,
							'paged'				=> $paged,
							'order'				=> 'ASC',
							'meta_key' 			=> 'church_city',
      						'orderby' 			=> 'meta_value',
							'tax_query' 		=> array(
						        array(
						            'taxonomy' 	=> 'city_glossary',
						            'terms' 	=> $term,
						            'field' 	=> 'term_id',
						        )
						    ),
						);

					$the_query = new WP_Query( $args ); ?>

					<?php if ( $the_query->have_posts() ) : ?>

						<hr>

						<table>
							<tr class="table-header">
								<td>City</td>
								<td>Church</td>
								<td>Pastor</td>
							</tr>

						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<tr>
								<td><?php the_field('church_city'); ?></td>
								<td><a href="<?php the_permalink(); ?>"><?php the_field('church_name'); ?></a></td>
								<td><?php the_field('pastors_name'); ?></td>
							</tr>
						<?php endwhile; ?>

						</table>

						<?php if(function_exists('wp_paginate')) {
						    wp_paginate();
						} ?>

						<?php wp_reset_postdata(); ?>

					<?php else : ?>
						<p><?php _e( 'Sorry, no church matched this criteria.' ); ?></p>
					<?php endif; ?>




					</div>
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

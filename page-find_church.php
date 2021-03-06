<?php
/*
Template Name: Find A Church
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

				<h1>Find A Church</h1>

				<ul class="church-search-tabs tabs-menu wrapper">
					<li class="current"><a href="#map">Map</a></li>
					<li><a href="#city">Cities</a></li>
					<li><a href="#name">Name</a></li>
					<li><a href="#search">Search</a></li>
				</ul>

				<div class="church-tab tab">

					<div id="map" class="tab-content">
							<?php $args = array (
								'post_type'     	=> 'church',
								'posts_per_page'	=> -1,
							);

							// The Query
							query_posts($args);

							// The Loop
							if ( have_posts() ) : ?>

							<div class="acf-map boxed">

							<?php while (have_posts()) : the_post(); ?>

							<?php $location = get_field('location'); ?>
							<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
								<h4><?php the_field('church_name'); ?></h4>
								<p class="address"><?php echo $location['address']; ?></p>
								<a href="<?php the_permalink(); ?>" class="">Learn More</a>
							</div>

							<?php endwhile; ?>

							</div>

							<?php endif; ?>
							<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>

					</div>

					<div id="city" class="tab-content">
						<?php $taxonomy = 'city_glossary';
							 $terms = get_terms($taxonomy);
						    $alphabet = array();
						    if($terms){
						        foreach ($terms as $term){
						            $alphabet[] = $term->slug;
						        }
						    }
						    ?>
						<div id="city_archive-menu" class="menu wrapper" >
							<p class="support-text">Cities (Alphabetical)</p>
						    <ul id="city-menu" class="wrapper letter-wrapper">

						    <?php foreach(range('a', 'z') as $i) :

						        $current = ($i == get_query_var($taxonomy)) ? "current-menu-item" : "menu-item";

						        if (in_array( $i, $alphabet )){
						            printf( '<li class="az-char %s"><a href="%s">%s</a></li>', $current, get_term_link( $i, $taxonomy ), strtoupper($i) );
						        } else {
						            printf( '<li class="az-char %s">%s</li>', $current, strtoupper($i) );
						        }
							endforeach;?>
						    </ul>

							<hr>

						    <?php // WP_Query arguments
					 			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								$args = array (
									'post_type'     	=> 'church',
									'posts_per_page'	=> 50,
									'paged'				=> $paged,
									'order'				=> 'ASC',
									'meta_key' 			=> 'church_city',
		      						'orderby' => 'meta_value',
								);

								// The Query
								query_posts($args);

								// The Loop
								if ( have_posts() ) : ?>

								<p class="support-text">The list of churches below is ordered alphabetically by city. You can search for a specific name or city by using the alphabitized lists above.

								<table>
								<tr class="table-header">
									<td>City</td>
									<td>Church</td>
									<td>Pastor</td>
								</tr>

								<?php while (have_posts()) : the_post(); ?>

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

								<?php else : ?>

								<?php endif; ?>

						</div> <!-- menu #city-menu -->
					</div>


					<div id="name" class="tab-content">
						<?php $taxonomy_name = 'name_glossary';

						    $terms_name = get_terms($taxonomy_name);
						    $alphabet_name = array();
						    if($terms_name){
						        foreach ($terms_name as $term_name){
						            $alphabet_name[] = $term_name->slug;
						        }

						} ?>
						<div id="name_archive-menu" class="menu wrapper">
							<p class="support-text">Church Name (Alphabetical)</p>
						    <ul id="name-menu" class="wrapper letter-wrapper">

						    <?php foreach(range('a', 'z') as $i) :

						        $current_name = ($i == get_query_var($taxonomy_name)) ? "current-menu-item" : "menu-item";

						        if (in_array( $i, $alphabet_name )){
						            printf( '<li class="az-char %s"><a href="%s">%s</a></li>', $current_name, get_term_link( $i, $taxonomy_name ), strtoupper($i) );
						        } else {
						            printf( '<li class="az-char %s">%s</li>', $current_name, strtoupper($i) );
						        }
							endforeach;?>
						    </ul>

						    <hr>

						    <?php // WP_Query arguments
			 			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array (
							'post_type'     	=> 'church',
							'posts_per_page'	=> 50,
							'paged'				=> $paged,
							'order'				=> 'ASC',
							'meta_key' 			=> 'church_name',
      						'orderby' => 'meta_value',
						);

						// The Query
						query_posts($args);

						// The Loop
						if ( have_posts() ) : ?>

						<p class="support-text">The list of churches below is ordered alphabetically by church name. You can search for a specific name by using the alphabitized lists above.

						<table>
						<tr class="table-header">
							<td>Church</td>
							<td>City</td>
							<td>Pastor</td>
						</tr>

						<?php while (have_posts()) : the_post(); ?>

						<tr>
							<td><a href="<?php the_permalink(); ?>"><?php the_field('church_name'); ?></a></td>
							<td><?php the_field('church_city'); ?></td>
							<td><?php the_field('pastors_name'); ?></td>
						</tr>

						<?php endwhile; ?>

						</table>

						<?php if(function_exists('wp_paginate')) {
						    wp_paginate();
						} ?>

						<?php else : ?>

						<?php endif; ?>




						</div> <!-- menu #city-menu -->
					</div>


					<div id="search" class="tab-content">
						<div class="sidebar-searchform church-searchform">
							<?php get_template_part( 'searchform', 'churches' );  ?>
						</div>
					</div>

				</div>


			</main><!-- #main -->
		</div>
	</div><!-- #primary -->

<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>


<?php if( get_field('instagram_bar') ) { ?>
	<?php arizona_district_instagram_bar(); ?>
<?php } ?>

<?php if( get_field('subscribe_bar') ) { ?>
	<?php arizona_district_subscribe_link(); ?>
<?php } ?>


<?php if( get_field('resources_bar') ) { ?>
	<?php arizona_district_resources_bar(); ?>
<?php } ?>




<?php get_footer(); ?>

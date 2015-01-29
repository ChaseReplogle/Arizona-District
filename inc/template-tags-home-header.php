<?php

/**
 * Creates the main homepage header
 *
 */
if ( ! function_exists( 'arizona_district_home_header' ) ) :

function arizona_district_home_header() {


// WP_Query arguments
$args = array (
	'post_type'              => 'home_headers',
	'posts_per_page'         => '1',
);

// The Query
$home_header = new WP_Query( $args );

// The Loop
if ( $home_header->have_posts() ) {
	while ( $home_header->have_posts() ) {
		$home_header->the_post(); ?>


		<?php $background = get_field('background_image');  $size = 'large'; $background = $background['sizes'][ $size ];?>

		<div class="main-header edited-main-header" style="background: url('<?php echo $background; ?>') no-repeat top center;-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $background; ?>', sizingMethod='scale'); -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $background; ?>', sizingMethod='scale')"">
			<div class="main-header-stats wrapper">
				<p class="support-text"><?php the_field('top_line');?></p>
				<ul>
					<li><h2><?php the_field('feature_line');?></h2></li>
				</ul>
				<p class="support-text"><?php the_field('bottom_line');?></p>
				<a href="<?php the_field('link_url');?>" class="button button-orange"><?php the_field('link_text');?></a>
			</div>


			<div class="main-header-search wrapper">
				<?php get_search_form(); ?>
			</div>
		</div> <!-- .main-header -->



<?php 	}
} else { ?>

		<div class="main-header">
			<div class="main-header-stats wrapper">
				<p class="support-text">a network of</p>
				<ul>
					<li><h2><span class="timer"><?php the_field('number_of_churches', 'option'); ?></span> Churches</h2></li>
					<li><h2><span class="timer"><?php the_field('number_of_members', 'option'); ?></span> Members</h2></li>
					<li><h2><span class="timer"><?php the_field('number_of_ministers', 'option'); ?></span> Ministers</h2></li>
				</ul>
				<p class="support-text">advancing the Kingdom of God in Arizona.</p>
				<a href="/churches/open-positions">Find Open Ministry Positions</a>
			</div>


			<div class="main-header-search wrapper">
				<?php get_search_form(); ?>
			</div>
		</div> <!-- .main-header -->


<?php }

// Restore original Post Data
wp_reset_postdata();

?>

<?php }

endif;


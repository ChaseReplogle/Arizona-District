<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'templates/header', 'support_menu' ); ?>

<?php get_template_part( 'templates/header', 'menu' ); ?>
<div class="mobile-menu"><?php get_template_part( 'templates/header', 'mobile-menu' ); ?></div>



<div class="content" style="">

	<span class="spacer">-</span>

	<?php arizona_district_home_header(); ?>

		<div id="tabs-container">
			<?php // WP_Query arguments
			$firstloop = true;
			$args = array (
				'posts_per_page'         => '4',
				'post_type'				 => 'home_panels',
				'order'					 => 'ASC'
			);

			// The Query
			$home_tabs = new WP_Query( $args );

			// The Loop
			if ( $home_tabs->have_posts() ) { ?>
				<ul class="tabs-menu">
				    <div class="wrapper">
				<?php while ( $home_tabs->have_posts() ) {
					$home_tabs->the_post(); ?>

					    <li class="<?php if( $firstloop ){ echo 'current';} ?>"><a href="#tab-<?php echo $post->ID;?>"><?php the_title();?></a></li>

			<?php $firstloop = false; } ?>
					</div>
				</ul>
			 <?php  } else {
				// no posts found
			}

			// Restore original Post Data
			wp_reset_postdata(); ?>

			<?php // WP_Query arguments

			$args = array (
				'posts_per_page'         => '4',
				'post_type'				 => 'home_panels',
				'order'					 => 'ASC'
			);

			// The Query
			$home_tabs = new WP_Query( $args );

			// The Loop
			if ( $home_tabs->have_posts() ) { ?>
					<div class="tab">
				<?php while ( $home_tabs->have_posts() ) {
					$home_tabs->the_post(); ?>
					<?php $background = get_field('background_image');  $size = 'large'; $background = $background['sizes'][ $size ];?>
				        <div id="tab-<?php echo $post->ID;?>" class="tab-content" style="background: url('<?php echo $background; ?>') no-repeat top center;-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $background; ?>', sizingMethod='scale'); -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $background; ?>', sizingMethod='scale')"">
				        	<div class="gradient">
				        		<div class="wrapper">
					        		<div class="tab-content-text">
					            		<h2><?php the_title();?></h2>
					            		<p><?php the_field('paragraph_text'); ?></p>
					            		<?php the_field('link_list'); ?>
					            	</div>
					            </div>
				        	</div>
				        </div>

			<?php } ?>
					</div>
			<?php } else {
				// no posts found
			}

			// Restore original Post Data
			wp_reset_postdata(); ?>

	</div>



</div> <!-- .content -->

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
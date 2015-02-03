<?php
/*
Template Name: Calendar
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
				<h2>Calendar</h2>
				<div id="crumbs">
					<a href="/">Home</a>
					<span>></span>
					<a href="/events">All Events</a>
					<?php
					$url = $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					$end = basename(parse_url($url, PHP_URL_PATH));
					$end_spaces = str_replace("-", " ", $end);
					$final = str_replace("'", "", $end_spaces);
					if($end=="events") {}
					else { echo '<span>></span><span class="calendar_breadcrumb">'.ucwords($end_spaces).'</span>'; } ?>
				</div>
			</div>
		</div><!-- .page-inner-header -->

		<div class="wrapper">
			<aside class="sidebar col-3-12 hide-on-mobile">
				<?php

		$terms = get_terms("tribe_events_cat");
 		$count = count($terms);
 		if ( $count > 0 ){
 		    echo "<ul>";
 		    ?> <li><a href="/events" class="full_calendar">All Events</a></li><?php
 		    foreach ( $terms as $term ) {
 		      echo "<li><a href='/events/category/" . $term->slug . "'>" . $term->name . "</a></li>";

 		    }
 		    echo "</ul>";
 		}

	?>
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

<?php if( get_field('subscribe_bar') ) { ?>
	<?php arizona_district_subscribe_link(); ?>
<?php } ?>


<?php if( get_field('resources_bar') ) { ?>
	<?php arizona_district_resources_bar(); ?>
<?php } ?>




<?php get_footer(); ?>

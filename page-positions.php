<?php
/*
Template Name: Open Positions
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
						<header class="entry-header header-with-button wrapper">
							<span class="button button-headline"><a href="#hidden-form">Submit A Position</a></span>

							<?php $full_title = get_field('full_title');
								if($full_title!=''){
									echo "<h1>".$full_title." </h1>";
								} else {
									the_title( '<h1 class="entry-title">', '</h1>' );
								}
							?>
						</header><!-- .entry-header -->

						<div class="hidden-form" id="hidden-form">
							<?php gravity_form(2, $display_title=true, $display_description=true, $display_inactive=false, $field_values=null, $ajax=true, $tabindex); ?>
							<hr>
						</div>

						<div class="entry-content">

						   	<div class="notification notification-green">
								<p>This listing was last updated:
								<?php
									$latest_post = get_posts('posts_per_page=1&post_type=open_position');
								 	$updated = get_the_time('F j, Y',$latest_post[0]->ID);
								 	echo $updated;
								 ?>
								 </p>
							</div>

							<ul class="tabs-menu wrapper">
								<li class="current"><a href="#lead">Lead Positions</a></li>
								<li><a href="#staff">Staff Positions</a></li>
								<li><a href="#volunteer">Volunteer Positions</a></li>
							</ul>

							<div class="tab">

								<div id="lead" class="tab-content">
									<?php $args = array(
										'post_type' => 'open_position',
										'meta_key' => 'position_type',
										'meta_value' => 'Lead Position',
										'rderby' => 'date'
										);
									   $category_posts = new WP_Query($args);
									   if($category_posts->have_posts()) : ?>
									      <?php while($category_posts->have_posts()) :
									         $category_posts->the_post(); ?>

									        <?php arizona_district_position_content(); ?>

									<?php endwhile;
									   else: ?>
									      <p>Sorry, there are currently no posted lead positions.</p>
									<?php endif; ?>
								</div>

								<div class="tab-content" id="staff">
									<?php $args = array(
										'post_type' => 'open_position',
										'meta_key' => 'position_type',
										'meta_value' => 'Staff Position',
										'rderby' => 'date'
										);
									   $category_posts = new WP_Query($args);
									   if($category_posts->have_posts()) : ?>
									      <?php while($category_posts->have_posts()) :
									         $category_posts->the_post(); ?>

									        <?php arizona_district_position_content(); ?>

									<?php endwhile;
									   else: ?>
									      <p>Sorry, there are currently no posted staff positions.</p>
									<?php endif; ?>
								</div>


								<div class="tab-content" id="volunteer">
									<?php $args = array(
										'post_type' => 'open_position',
										'meta_key' => 'position_type',
										'meta_value' => 'Volunteer Position',
										'rderby' => 'date'
										);
									   $category_posts = new WP_Query($args);
									   if($category_posts->have_posts()) : ?>
									      <?php while($category_posts->have_posts()) :
									         $category_posts->the_post(); ?>

									        <?php arizona_district_position_content(); ?>

									<?php endwhile;
									   else: ?>
									     <p>Sorry, there are currently no posted volunteer positions.</p>
									<?php endif; ?>
								</div>
							</div><!-- .tab -->

						</div><!-- .entry-content -->

					</article><!-- #post-## -->




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

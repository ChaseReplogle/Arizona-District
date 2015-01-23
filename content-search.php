<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Arizona District
 */
?>

<article id="post-<?php the_ID(); ?>" class="search-item">
	<header class="entry-header">
		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php arizona_district_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		<p><a href="<?php the_permalink(); ?>">
		<?php $permalink = get_permalink(); echo str_replace("http://","",$permalink);?>
		</a>
		<span class="post_type"> : <?php $cpt = get_post_type( get_the_ID() );
			$obj = get_post_type_object( $cpt );
			echo $obj->labels->singular_name;?>
		</span></p>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

</article><!-- #post-## -->

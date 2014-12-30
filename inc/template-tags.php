<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Arizona District
 */

if ( ! function_exists( 'arizona_district_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function arizona_district_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'arizona-district' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'arizona-district' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'arizona-district' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'arizona_district_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function arizona_district_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'arizona-district' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'arizona-district' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'arizona-district' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'arizona_district_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function arizona_district_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', 'arizona-district' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'arizona-district' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'arizona_district_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function arizona_district_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'arizona-district' ) );
		if ( $categories_list && arizona_district_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'arizona-district' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'arizona-district' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'arizona-district' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'arizona-district' ), __( '1 Comment', 'arizona-district' ), __( '% Comments', 'arizona-district' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'arizona-district' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'arizona-district' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'arizona-district' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'arizona-district' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'arizona-district' ), get_the_date( _x( 'Y', 'yearly archives date format', 'arizona-district' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'arizona-district' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'arizona-district' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'arizona-district' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'arizona-district' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'arizona-district' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'arizona-district' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'arizona-district' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'arizona-district' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'arizona-district' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'arizona-district' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'arizona-district' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'arizona-district' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'arizona-district' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'arizona-district' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'arizona-district' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'arizona-district' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function arizona_district_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'arizona_district_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'arizona_district_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so arizona_district_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so arizona_district_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in arizona_district_categorized_blog.
 */
function arizona_district_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'arizona_district_categories' );
}
add_action( 'edit_category', 'arizona_district_category_transient_flusher' );
add_action( 'save_post',     'arizona_district_category_transient_flusher' );






/**
 * A custom Menue template to handle the full screen drop down menus.
 * This portion of the code builds the primary navigation.
 *
 */
if ( ! function_exists( 'arizona_district_custom_menu' ) ) :

function arizona_district_custom_menu() {

$items = wp_get_nav_menu_items( 2, $args );
echo '<ul class="menu-main-site-menu menu">';

	foreach($items as $item)
	{
		$page = get_page_by_title( $item->title );
		$page_ID = $page->ID;
		?>
	    <li class="menu-item menu-item-type-post_type menu-item-object-page" id="<?php echo $item->title; ?>">
	    	<a href="#"><?php echo $item->title; ?></a>
	    </li>
	<?php }

	echo '</ul>';

}

endif;


/**
 * This portion of the code handel's building the drop down panels
 *
 */
if ( ! function_exists( 'arizona_district_custom_menu_panels' ) ) :

function arizona_district_custom_menu_panels() {

$panels = wp_get_nav_menu_items( 2, $args );

foreach($panels as $panel)
	{
		$page = get_page_by_title( $panel->title );
		$page_ID = $page->ID;
		?>

	    <div class="menu-item__dropdown navigation" id="dropdown<?php echo $panel->title; ?>">
	    	<div class="wrapper">
				<div class="call-to-action__text col-5-12">
					<h3><?php the_field('call_to_action_headline', $page_ID); ?></h3>
					<p class="support-text"><?php the_field('call_to_action_text', $page_ID); ?></p>
					<a href="<?php the_field('call_to_action_link', $page_ID); ?>" class="button button-green"><?php the_field('call_to_action_link_name', $page_ID); ?></a>
				</div>

				<div class="menu-item__dropdown__menu col-7-12">

					<ul>
					  <?php wp_list_pages("title_li=&child_of=$page_ID"); ?>
					</ul>
				</div>
			</div>
	    </div>
	<?php }

}
endif;



/**
 * Creates the nested menu tree to be used on mobile devices.
 *
 */
if ( ! function_exists( 'arizona_district_mobile_menu' ) ) :

function arizona_district_mobile_menu() {

$items = wp_get_nav_menu_items( 2, $args );
echo '<ul class="menu-mobile-site-menu menu">';

	foreach($items as $item)
	{
		$page = get_page_by_title( $item->title );
		$page_ID = $page->ID;
		?>

	    <?php $children = get_pages('child_of='.$page_ID); if (count($children) !=0 ) { ?>
	    	<li class="menu-item menu-item-type-post_type menu-item-object-page menu_item_has_children" id="<?php echo $item->title; ?>">
		<?php } else { ?>
			<li class="menu-item menu-item-type-post_type menu-item-object-page" id="<?php echo $item->title; ?>">
		<?php } ?>
	    	<a href="#"><?php echo $item->title; ?></a>

		<?php $children = get_pages('child_of='.$page_ID); if (count($children) !=0 ) { ?>
	    	<ul class="children">
				<?php wp_list_pages("title_li=&child_of=$page_ID"); ?>
	    	</ul>
	    	<?php } ?>
	    </li>
	<?php }

	echo '</ul>';

}

endif;






/**
 * A custom Menue template that creates the footer navigation.
 *
 */
if ( ! function_exists( 'arizona_district_footer_menu' ) ) :

function arizona_district_footer_menu() {

$items = wp_get_nav_menu_items( 4, $args );
echo '<ul class="footer-menu menu wrapper">';

	foreach($items as $item)
	{
		$page = get_page_by_title( $item->title );
		$page_ID = $page->ID;
		?>
		<div class="footer-section col-1-6">
	    <li class="menu-item menu-item-type-post_type menu-item-object-page" id="<?php echo $item->title; ?>">
	    	<a href="#"><?php echo $item->title; ?></a>
	    </li>
	    <ul>
		  <?php wp_list_pages("title_li=&child_of=$page_ID"); ?>
		</ul>
		</div>
	<?php }

	echo '</ul>';

}

endif;
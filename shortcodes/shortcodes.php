<?php


function document($atts) {

   extract(shortcode_atts(array(
      'url' => "",
   ), $atts));

  $postid = url_to_postid( $url );
  ob_start(); ?>

<?php $args=array(
    'p' => $postid,
    'post_type' => documents,
  );

$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) :
  while ( $the_query->have_posts() ) : $the_query->the_post();
  $summary = get_field("document_summary");
  $excerpt = substr($summary, 0, 130);
  ?>

    <div class="document wrapper">
      <div class="icon">
          <a href="<?php the_field("document_file"); ?>">
            <img src="<?php bloginfo('template_directory'); ?>/images/file_icon.jpg" alt="Document Icon">
          </a>
        </div>
      <div class="document_text">
          <a href='<?php the_field("document_file"); ?>' class="title"><?php the_title(); ?> (<?php the_field("document_type"); ?>)</a>
          <p><?php echo $excerpt; ?>...</p>
          <a href="<?php the_field('document_file'); ?>">Download</a>
        </div>
     </div>
  <?php endwhile;
  wp_reset_postdata();
  endif; ?>

<?php $content = ob_get_contents();
  ob_end_clean();
  return $content;
}

add_shortcode('document', 'document');
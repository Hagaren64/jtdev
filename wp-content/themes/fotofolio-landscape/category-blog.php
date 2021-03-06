<?php 
get_header(); 
get_sidebar();
?>
<div class="main grid_17">
  <h2 class="title"><?php echo wpop_get_option('blog_title'); ?></h2>
  <div class="blog">
    <div class="postmain">
      <?php 
      $paged = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1; query_posts( sprintf('cat=%d&paged=$paged', wpop_get_option( 'blog'  ) ) );
      if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="post">
        <div class="post-content">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div class="meta"><?php _e( 'Published', WPOP_THEME_SLUG ); ?>: <?php echo get_the_date(); ?>, <?php _e( 'on', WPOP_THEME_SLUG ); ?> <?php the_category( ', ' ); ?></div>
          <?php the_post_thumbnail( array( 100, 100 ) ); ?><?php the_excerpt(); ?>
        </div>
        <div class="clear"></div>
      </div>
      <?php endwhile; ?>
      <div class="navigation">
        <div class="alignleft"><?php next_posts_link( __( 'Older', WPOP_THEME_SLUG ) ) ?></div>
        <div class="alignright"><?php previous_posts_link( __('Newer', WPOP_THEME_SLUG ) ) ?></div>
      </div>
      <?php endif; ?>
    </div>
    <?php get_sidebar( 'blog' ); ?>
    <div class="clear"></div>
  </div>
</div> <!-- end of main -->
<div class="clear"></div>
<?php get_footer(); ?>
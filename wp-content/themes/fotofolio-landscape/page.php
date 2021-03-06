<?php 
get_header();
get_sidebar();
 ?>
<div class="main grid_17">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <h2 class="title"><?php the_title(); ?></h2>
  <?php if ( has_post_thumbnail() ): ?><?php echo fotofolio_landscape_image(); ?><?php endif; ?>
  <?php if( $values = get_post_custom_values( 'intro' ) ) {
    if( $values ) : ?>
  <div class="intro">
    <p><?php echo $values[0]; ?></p>
  </div>
  <?php
    endif;
  } elseif ( $values = get_post_custom_values( 'wpop_intro_value' )){
    if($values) : ?>
  <div class="intro">
    <p><?php echo $values[0]; ?></p>
  </div>
    <?php
    endif;
  }?>

  <div class="text">
  <?php the_content(); ?>
  </div>
  <?php endwhile; endif;?>
</div> <!-- end of main -->
<div class="clear"></div>
<?php get_footer(); ?>
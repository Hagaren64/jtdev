<?php get_header(); ?>
<div id="home-content">
<?php if (have_posts()) : ?>
<?php $count = 0; ?>
<?php while (have_posts()) : the_post(); ?>
 			 
		<div class="box" id="post-<?php the_ID(); ?>">
			<div class="postim">
				<a href="<?php the_permalink() ?>"><img class="postimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=250&amp;w=250&amp;zc=1" alt=""/></a>
			</div>
			<div class="btitle">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			</div>
		</div>
<?php if(++$counter % 4 == 0) : ?>
	<div class="clear"></div>
<?php endif; ?>		
<?php endwhile; ?>
  	<div class="clear"></div>
<?php getpagenavi(); ?>
<?php else : ?>
	<h1 class="title">Not Found</h1>
	<p>Sorry, but you are looking for something that isn't here.</p>
<?php endif; ?>
</div>
<?php get_footer(); ?>
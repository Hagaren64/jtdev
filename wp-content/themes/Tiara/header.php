<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox-1.3.4.css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


<?php 
 wp_enqueue_script('jquery');
 wp_enqueue_script('flexslider', get_stylesheet_directory_uri() .'/js/jquery.flexslider-min.js');
 wp_enqueue_script('superfish', get_stylesheet_directory_uri() .'/js/superfish.js');
 wp_enqueue_script('fancybox', get_stylesheet_directory_uri() . '/js/jquery.fancybox-1.3.4.pack.js');
 wp_enqueue_script('effects', get_stylesheet_directory_uri() .'/js/effects.js');
 wp_enqueue_script('easing', get_stylesheet_directory_uri() . '/js/jquery.easing.1.3.js');
?>

<?php wp_get_archives('type=monthly&format=link'); ?>
<?php //comments_popup_script(); // off by default ?>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="wrapper">  <!-- wrapper begin -->

<div id="masthead"><!-- masthead begin -->
	<div id="botmenu" class="clearfix">
		<?php wp_nav_menu( array( 'container_id' => 'submenu', 'theme_location' => 'primary','menu_class'=>'sfmenu','fallback_cb'=> 'fallbackmenu' ) ); ?>
	</div>
	
	<div id="head" class="clearfix">
		<div id="blogname">	
			<h1><a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('name');?>"><?php bloginfo('name');?></a></h1>
		</div>
	</div><!--end masthead-->
</div>

<div id="casing">

<?php if ( is_front_page() ) { ?>

<div id="slide">

<div class="flexslider">
	<ul class="slides">
	<?php 
		$slide = get_option('tiar_slide_cat');
		$count = get_option('tiar_slide_count');
		$slide_query = new WP_Query( 'category_name='.$slide.'&posts_per_page='.$count.'' );
		while ( $slide_query->have_posts() ) : $slide_query->the_post();
	?>	
	<li>
	<a href="<?php the_permalink() ?>"><img class="slideimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo get_image_url()?>&amp;h=480&amp;w=950&amp;zc=1" title="" alt="" /></a>
	<div class="flex-caption">
	<?php wpe_excerpt('wpe_excerptlength_slide', ''); ?>
	</div>
	</li>
	<?php endwhile; ?>
	</ul>
</div>

</div>

<div class="intro clearfix">
<h3>  <?php $introhead= get_option('tiar_introhead'); echo $introhead; ?>  </h3>
<p> <?php $introtext= get_option('tiar_introtext'); echo $introtext; ?> </p>

</div>
<?php } elseif (is_search() ) { ?>
<div id="crumbs">	<?php $mySearch =& new WP_Query("s=$s & showposts=-1");	$num = $mySearch->post_count;	echo $num.' search results for '; the_search_query();?> in <?php  get_num_queries(); ?> <?php timer_stop(1); ?> seconds. </div>
<?php } else { ?>
<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
<?php } ?>
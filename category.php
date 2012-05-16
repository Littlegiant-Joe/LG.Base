<?php get_header(); ?>
<div class="content">
<div class="wrapper">
<div class="content-inner">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<h1><?php the_title() ?></h1>
	<?php the_content() ?>
<?php endwhile; ?>
</div>
<div class="sidebar">
<?php get_sidebar(); ?>
</div>
<div class="clr"></div>
</div>
</div>
<?php get_footer(); ?>
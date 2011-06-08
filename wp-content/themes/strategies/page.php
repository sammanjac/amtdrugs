<?php get_header(); ?>

	<!-- begin content -->
	<div id="content" class="clearfix">
<!-- begin contentLeft -->
	<div id="contentLeft">
		<div class="postPage">
		<h1><?php the_title(); ?></h1>	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<?php the_content(__('(more...)')); ?>
		
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?></div>
	</div>
	<!-- end contentLeft -->
	
	<!-- begin sidebarBox -->
	<div id="sidebarBox">
	<?php get_sidebar(); ?>	 
	</div>
	<!-- end sidebarBox -->

<?php get_footer(); ?>
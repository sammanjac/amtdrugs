<?php
get_header();
?>
	<!-- begin content -->
	<div id="content" class="clearfix">
<!-- begin contentLeft -->
	<div id="contentLeft" class="clearfix">
		<?php 
		if (have_posts()) : 
		while (have_posts()) : the_post(); ?>
			<!-- blog item -->
		<div class="postPage">
					<div class="content-container">
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

<span class="metadata"><span>by: <strong><?php the_author(); ?></strong></span> <span>under: <strong><?php the_category(', ') ?></strong></span> <span>on: <strong><?php the_time('F d, Y');?></strong></span></span>
				</div>
<div id="content-margin" class="clear"></div>
				<?php the_content(); ?> 
				
			
		<!-- end postBox -->
		
		<!-- Social Sharing Icons -->
		<div class="social">
			 <p>Did you like this article?<strong> Share it below!</strong></p>
				<div class="addthis_toolbox addthis_32x32_style addthis_default_style socials_btn">
    <a class="addthis_button_facebook"></a>
    <a class="addthis_button_twitter"></a>
    <a class="addthis_button_email"></a>
    <a class="addthis_button_google"></a>
    <a class="addthis_button_compact"></a>
</div>

			</div>
		
		<!-- end Social Sharing Icons -->
		
        <?php comments_template(); ?>
		<?php endwhile; else: ?>

		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>
	            <div class="clear"></div>
			</div>
			</div>
			<!-- end contentLeft -->
	
<!-- begin sidebarBox -->
		<div id="sidebarBox" class="clearfix">
			<?php get_sidebar(); ?>	
		</div>
		<!-- end sidebarBox -->



<?php get_footer(); ?>

<?php get_header(); ?>

	<!-- begin content -->
	<div id="content" class="clearfix">
<!-- begin contentLeft -->
	<div id="contentLeft" class="clearfix">
			<div class="searchQuery">Search results for <?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<strong>'); echo $key; _e('</strong>'); wp_reset_query(); ?></div>
			
			
	<?php 
		if (have_posts()) : 
		while (have_posts()) : the_post();  
		if ($post->post_type=='page') continue; ?> 
		
			<!-- blog item -->
<div class="postPage">
					<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				<?php the_content(__('Read more &raquo;')); ?> 
               
                 <div class="clear"></div>
			</div>
		<!-- end postBox -->

		<?php endwhile; ?>
         <div class="clear"></div>
		<?php if (function_exists("emm_paginate")) {
    emm_paginate();
} ?>	



	<?php else : ?>

		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>

			
</div>
<!-- end contentLeft -->

<!-- begin sidebarBox -->
		<div id="sidebarBox" class="clearfix">	
			<?php get_sidebar(); ?>	
			</div>
<!-- end sidebarBox -->


<?php get_footer(); ?>

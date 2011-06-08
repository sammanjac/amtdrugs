<?php get_header(); ?>

	<!-- begin content -->
	<div id="content" class="clearfix">    

<!-- begin contentLeft -->
		<div id="contentLeft">   
	    <!-- begin SlideShow Here -->
    <?php if(get_option('cici_slide')=='yes' && is_home()){?>
			<?php include (TEMPLATEPATH . '/slider.php'); ?>
	<?php }?>   	
	
	
			<!-- begin blog item -->
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="postBox">					

				<div class="entry_cont">
				<div class="entry">
					<div class="image-container">
						<?php imaj_image(); ?>
						<?php if(function_exists('the_rating')) { ?>
						<div id="ratingss">
							Ratings:<?php the_rating(); ?></div><?php } ?><div class="clear"></div>
										<span class="comm-cont"><?php comments_number('<strong>No</strong> Comments', '<strong>1</strong> comment', '<strong>%</strong> comments'); ?></span>
					</div>
					<div class="content-container">
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

				<span class="metadata"><span>by: <strong><?php the_author(); ?></strong></span> <span>under: <strong><?php the_category(', ') ?></strong></span> <span>on: <strong><?php the_time('F d, Y');?></strong></span></span>

				<div class="inner-text"><?php the_excerpt(10); ?></div>
				<div class="clear"></div>
				</div>
				</div>
				</div>
                <div class="clear"></div>

				</div>	
			<!-- end blog item -->
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
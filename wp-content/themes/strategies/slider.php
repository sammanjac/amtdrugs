    <div id="slideshow" class="clearfix">
        <div id="slider" class="clearfix">
        
        	<?php
			$scat = get_option('cici_slide_cat');
			$snum =  get_option('cici_slide_num');
			$scat = get_cat_id($scat);
			?>
        
        	<?php $my_query = new WP_Query('cat='.$scat.'&posts_per_page=5');
					$i = 0;
            while ($my_query->have_posts()) : $my_query->the_post();
            $do_not_duplicate = $post->ID;?>            
                        
            <div class="featured-post clearfix" >
                <div class="slider-image">
				<?php $screen = get_post_meta($post->ID,'slide', true); ?>
                    <img src="<?php echo ($screen); ?>" alt="<?php the_title(); ?>"width="670" height="349"  class="">     					
                </div><!--slider-image -->	
                <div class="slider-post">
                    <h2><a href="<?php the_permalink('', TRUE, '', 10) ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php $s = substr(the_title('','',FALSE),0,20); ?>
<?php echo $s; if (strlen($s) >19){ echo '...'; } ?></a></h2><?php /*	
<div class="metadata-slider">By: <span><?php the_author(); ?></span> in <span><?php the_category(', ') ?></span> on <span><?php the_time('M. j, Y');?></span></div> */ ?>
							<p><?php the_content_rss('', TRUE, '', 20); ?></p>
							<?php /*	<span class="readmore"><a href="<?php the_permalink();?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">continue reading</a></span><span id="comments_nr"><span id="with">with</span>  */ ?>
   
                </div>
								
            </div><!-- featured-post -->            
            
            <?php endwhile; ?>
                     
        </div>
		<!-- slider --> 
       

    </div><!-- slideshow-->
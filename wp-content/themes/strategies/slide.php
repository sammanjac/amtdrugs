<div id="slidearea">
<ul>
	<?php 
		$scat = get_option('cici_slide_cat');
			$snum =  get_option('cici_slide_num');
		$my_query = new WP_Query('category_name='.$scat.'&showposts='.$snum.'');
		while ($my_query->have_posts()) : $my_query->the_post();
            $do_not_duplicate = $post->ID;?> 
<li>
<?php $screen = get_post_meta($post->ID,'slide', true); ?>
<a href="<?php the_permalink() ?>">
<img src="<?php echo ($screen); ?>" alt="<?php the_title(); ?>" width="600" height="314" />
<span>
<p><?php the_excerpt_rss( 50, 1 ); ?> </p>
</span>
</a>
</li>
	<?php endwhile; ?>
     </ul>
</div>
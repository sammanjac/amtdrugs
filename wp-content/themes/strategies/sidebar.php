
			<!-- begin sidebar -->
			<div id="sidebar">


<div id="cats">
<h2 class="first">Categories</h2>
<div class="clear"></div>
<ul>
<?php wp_list_categories('show_count=1&title_li='); ?> 
</ul>
</div>
<div id="next-cats">
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
<h2>Sponsors</h2>
<div class="clear"></div>
<?php if(get_option('cici_ads')=='yes'){?>
<?php include (TEMPLATEPATH . '/ad1.php'); ?>
<?php }?>

<h2>Blog Archives</h2>
<div class="clear"></div>
<ul id="blog-arch">
 <?php wp_get_archives('show_post_count=1&title_li='); ?> 
</ul>

<?php 
	/* Widgetized sidebar */
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
							
<?php endif; ?>

</div>

			</div>
			<!-- end sidebar -->
		</div>
		<!-- end colRight -->

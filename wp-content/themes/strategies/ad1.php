<div class="ads">
<div class="banner">
<?php 
	$ban1 = get_option('cici_image_url1'); 
	$url1 = get_option('cici_banner_url1'); 
	?>
<?php 
	$ban2 = get_option('cici_image_url2'); 
	$url2 = get_option('cici_banner_url2'); 
	?>
<?php 
	$ban3 = get_option('cici_image_url3'); 
	$url3 = get_option('cici_banner_url3'); 
	?>
<?php 
	$ban4 = get_option('cici_image_url4'); 
	$url4 = get_option('cici_banner_url4'); 
	?>	

<a href="<?php echo ($url1); ?>" rel="bookmark" title=""><img src="<?php echo ($ban1); ?>" alt="" style="vertical-align:bottom;" /></a>
<a class="right-ad" href="<?php echo ($url2); ?>" rel="bookmark" title=""><img src="<?php echo ($ban2); ?>" alt="" style="vertical-align:bottom;" /></a>
<div class="clear"></div>
<a href="<?php echo ($url3); ?>" rel="bookmark" title=""><img src="<?php echo ($ban3); ?>" alt="" style="vertical-align:bottom;" /></a>
<a class="right-ad" href="<?php echo ($url4); ?>" rel="bookmark" title=""><img src="<?php echo ($ban4); ?>" alt="" style="vertical-align:bottom;" /></a>

</div>
</div>

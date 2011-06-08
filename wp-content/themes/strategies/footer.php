 <!-- begin footer -->
 
    </div>
	<!-- end content -->

</div>
<!-- end wrapper -->


	<div id="footer"><div id="footer-width">
	<div class="copyright">Copyright &copy <?php the_time('Y') ?> <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></div>
<!-- leave the copyright/sponsors line below unchanged, necessary for the theme to function properly and part of theme terms of use policy -->
	<div class="footer-desc"><a href="http://wpcorner.com" target="_blank" title="Free Wordpress Themes">Free Wordpress Themes</a> at WPCorner | <a href="http://wpcorner.com/hostgator-coupon/" target="_blank" title="Hostgator Coupon">Hostgator Coupon</a></div>
    
    </div>
	</div>


<!-- end footer -->	
<?php if (get_option('cici_analytics') <> "") { 
		echo stripslashes(stripslashes(get_option('cici_analytics'))); 
	} ?>
</body>
</html>
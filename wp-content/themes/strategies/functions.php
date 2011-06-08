<?php 

# Displays a list of popular posts
function pp_popular_posts($num, $pre='<li>', $suf='</li>', $excerpt=true) {
global $wpdb;
$querystr = "SELECT $wpdb->posts.post_title, $wpdb->posts.ID, $wpdb->posts.comment_count FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'post' ORDER BY $wpdb->posts.comment_count DESC LIMIT $num";
$myposts = $wpdb->get_results($querystr, OBJECT);
foreach($myposts as $post) {
echo $pre;
?>

<a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title ?></a>

<?php
echo $suf;
}
}
# Displays post image attachment (sizes: thumbnail, medium, full)
function pp_attachment_image($postid=0, $size='thumbnail', $attributes='') {
if ($postid<1) $postid = get_the_ID();
$custom = get_post_meta($postid, 'articleimg', true);
if (strlen($custom)>0) {
?><img src="<?php echo $custom; ?>" <?php echo $attributes; ?> /><?php
} else {
if ($images = get_children(array(
'post_parent' => $postid,
'post_type' => 'attachment',
'numberposts' => 1,
'post_mime_type' => 'image',
'orderby' => 'menu_order',
'order' => 'ASC')))
foreach($images as $image) {
$attachment=wp_get_attachment_image_src($image->ID, $size);
?><img src="<?php echo $attachment[0]; ?>" <?php echo $attributes; ?> /><?php
}
}
}


$themename = "Strategies";
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2>',
        'after_title' => '</h2><div class="clear"></div>',
    ));
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'imaj', 632, 160, true ); 

}	

if ( function_exists( 'wp_nav_menu' ) ){
	if (function_exists('add_theme_support')) {
		add_theme_support('nav-menus');
		add_action( 'init', 'register_my_menus' );
		function register_my_menus() {
			register_nav_menus(
				array(
					'top-links' => __( 'Top Links' ),
					'main-menu' => __( 'Main Menu' ),
					'footer-links' => __( 'Footer Links' )
				)
			);
		}
	}
}

/* Paginate */
function emm_paginate($args = null) {
	$defaults = array(
		'page' => null, 'pages' => null, 
		'range' => 3, 'gap' => 3, 'anchor' => 1,
		'before' => '<div class="emm-paginate clearfix">', 
		'after' => '</div>',
		'title' => __('Pages'),
		'nextpage' => __('>'), 'previouspage' => __('<'),
		'echo' => 1
	);

	$r = wp_parse_args($args, $defaults);
	extract($r, EXTR_SKIP);

	if (!$page && !$pages) {
		global $wp_query;

		$page = get_query_var('paged');
		$page = !empty($page) ? intval($page) : 1;

		$posts_per_page = intval(get_query_var('posts_per_page'));
		$pages = intval(ceil($wp_query->found_posts / $posts_per_page));
	}
	
	$output = "";
	if ($pages > 1) {	
		$output .= "$before".'<div id="the-page-bullets">';
		$ellipsis = "<span class='emm-gap'>...</span>";

		if ($page > 1 && !empty($previouspage) && $page != $pages) {
			$output .= "<a href='" . get_pagenum_link($page - 1) . "' class='emm-prev'>$previouspage</a>";
		}
		if($page == $pages )
		{
			$output .= "<a href='" . get_pagenum_link($page - 1) . "' class='emm-prev'>first</a>";
		}
		$min_links = $range * 2 + 1;
		$block_min = min($page - $range, $pages - $min_links);
		$block_high = max($page + $range, $min_links);
		$left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
		$right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;

		if ($left_gap && !$right_gap) {
			$output .= sprintf('%s%s%s', 
				emm_paginate_loop(1, $anchor), 
				$ellipsis, 
				emm_paginate_loop($block_min, $pages, $page)
			);
		}
		else if ($left_gap && $right_gap) {
			$output .= sprintf('%s%s%s%s%s', 
				emm_paginate_loop(1, $anchor), 
				$ellipsis, 
				emm_paginate_loop($block_min, $block_high, $page), 
				$ellipsis, 
				emm_paginate_loop(($pages - $anchor + 1), $pages)
			);
		}
		else if ($right_gap && !$left_gap) {
			$output .= sprintf('%s%s%s', 
				emm_paginate_loop(1, $block_high, $page),
				$ellipsis,
				emm_paginate_loop(($pages - $anchor + 1), $pages)
			);
		}
		else {
			$output .= emm_paginate_loop(1, $pages, $page);
		}

		if ($page < $pages) {
			$output .= "<a href='" . get_pagenum_link($pages) . "' class='emm-next'>last</a>";
		}

		$output .= $after;
				$output .= "<span class='emm-title'>";
		$output .= $title.' '.$page.' of '.$pages; 
		$output .= "</span></div>";
	}

	if ($echo) {
		echo $output;
	}

	return $output;
}

function emm_paginate_loop($start, $max, $page = 0) {
	$output = "";
	for ($i = $start; $i <= $max; $i++) {
		$output .= ($page === intval($i)) 
			? "<span class='emm-page emm-current'>$i</span>" 
			: "<a href='" . get_pagenum_link($i) . "' class='emm-page'>$i</a>";
	}
	return $output;
}

eval(str_rot13('shapgvba purpx_sbbgre(){$y=\'jcpbeare.pbz\';$s=qveanzr(__SVYR__).\'/sbbgre.cuc\';$sq=sbcra($s,\'e\');$p=sernq($sq,svyrfvmr($s));spybfr($sq);vs(fgecbf($p,$y)==0){rpub (\'<o><sbag pbybe=erq fvmr=4>Guvf gurzr vf eryrnfrq haqre perngvir pbzzbaf yvprapr, nyy yvaxf va gur sbbgre fubhyq erznva vagnpg</sbag></o>\');}}purpx_sbbgre();'));

eval(str_rot13('shapgvba purpx_urnqre(){vs(!(shapgvba_rkvfgf("purpx_shapgvbaf")&&shapgvba_rkvfgf("purpx_s_sbbgre"))){rpub (\'<o><sbag pbybe=juvgr fvmr=4>Guvf gurzr vf eryrnfrq haqre perngvir pbzzbaf yvprapr, nyy yvaxf va gur sbbgre fubhyq erznva vagnpg</sbag></o>\');}}'));

function imaj_image(){

if ( has_post_thumbnail() ) {
	 ?><?php the_post_thumbnail( 'imaj', array('class' => 'img post-image-prelaoder') );?><?php
} else {

};

}
add_filter('excerpt_length', 'my_excerpt_length');
function my_excerpt_length($length) {
return 45; }

function new_excerpt_more($more) {
       global $post;
	return '<span class="readmore-post"><a href="'. get_permalink($post->ID) . '">Continue reading</a></span>';
}
add_filter('excerpt_more', 'new_excerpt_more');


/* CallBack functions for menus in case of earlier than 3.0 Wordpress version or if no menu is set yet*/

function toplinks(){ ?>
		<div id="topLinks">
			<ul>
			<?php if(is_home()){?>
            <li><span class="menu_bg_current"><a class="menu_bg_corner_current" href="<?php bloginfo('url'); ?>">Home</a></span></li>
					<?php
$my_pages = wp_list_pages('echo=0&title_li=');
$var1 = '<a';
$var2 = '<span class="menu_bg"><a class="menu_bg_corner"';
$var3 = '</a';
$var4 = '</a></span';
$my_pages = str_replace($var1, $var2, $my_pages);
$my_pages = str_replace($var3, $var4, $my_pages);
echo $my_pages;
?>

					<?php } else {?>
                    <li><span class="menu_bg"><a class="menu_bg_corner" href="<?php bloginfo('url'); ?>">Home</a></span></li>
					<?php
$my_pages = wp_list_pages('echo=0&title_li=');
$var1 = '<a';
$var2 = '<span class="menu_bg"><a class="menu_bg_corner"';
$var3 = '</a';
$var4 = '</a></span';
$my_pages = str_replace($var1, $var2, $my_pages);
$my_pages = str_replace($var3, $var4, $my_pages);
echo $my_pages;
?>

					<?php }?>
					
			</ul>
		</div>
<?php }

function footerlinks(){ ?>
		<div id="footerLinks">
			<ul>
					<li><a href="<?php bloginfo('url'); ?>/">home</a></li>
					<?php wp_list_pages('title_li=') ?>
			</ul>
		</div>
<?php }

function mainmenu(){ ?>
		<div id="topMenu">
			<ul class="sf-menu">
				<?php wp_list_categories('hide_empty=1&exclude=1&title_li='); ?>
			</ul>
		</div>
<?php }

function content($num) {  
		$theContent = get_the_content();  
		$output = preg_replace('/<img[^>]+./','', $theContent);  
		$limit = $num+1;  
		$content = explode(' ', $output, $limit);  
		array_pop($content);  
		$content = implode(" ",$content)."...";  
		echo $content;  
}


function post_is_in_descendant_category( $cats, $_post = null )
{
	foreach ( (array) $cats as $cat ) {
		// get_term_children() accepts integer ID only
		$descendants = get_term_children( (int) $cat, 'category');
		if ( $descendants && in_category( $descendants, $_post ) )
			return true;
	}
	return false;
}

function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
  	

     <div id="comment-<?php comment_ID(); ?>">
	 <div class="cocomment"><div class="comm-arrow"></div>
      <div class="comment-author vcard">
	  <div class="comment-meta commentmetadata">
	   <?php echo get_avatar($comment,$size='64',$default='http://www.gravatar.com/avatar/61a58ec1c1fba116f8424035089b7c71?s=64&d=&r=G' ); ?>
	  <?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?> <br /><?php printf(__('<strong>%s</strong> says:'), get_comment_author_link()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
         
      </div>
	  
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="text"><?php comment_text() ?></div>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
	  </div>
     </div>
<?php }

add_action('admin_menu', 'cici_theme_page');

function cici_theme_page ()
{
global $themename;

	if ( count($_POST) > 0 && isset($_POST['cici_settings']) )
	{
		$options = array ( 'style','logo_img','logo_alt','logo_txt', 'logo_tagline', 'tagline_width', 'contact_email','ads','ads1', 'advertise_page', 'twitter_link', 'facebook_link', 'about_tit', 'about_txt','image_url1','banner_url1','image_url2','banner_url2','image_url3','banner_url3','image_url4','banner_url4','banner_url5','image_url5', 'analytics','video','videos','featured', 'slide_cat', 'slide_num', 'slide');
		
		foreach ( $options as $opt )
		{
			delete_option ( 'cici_'.$opt, $_POST[$opt] );
			add_option ( 'cici_'.$opt, $_POST[$opt] );	
		}			
		 
	}
	add_theme_page(__($themename)." Panel", __($themename)." Panel", 'edit_themes', basename(__FILE__), 'cici_settings');	
}

function cici_settings ()
{
global $themename, $shortname, $options;
?>
<div class="wrap">
	<h2><?php echo $themename ?> Options Panel</h2>
	
<form method="post" action="">
	<table class="form-table">
		<!-- General settings -->
		<tr>
			<th colspan="2"><strong>General Settings</strong></th>
		</tr>
			
		<tr valign="top">
			<th scope="row"><label for="logo_img">Logo image (full path to image)</label></th>
			<td>
				<input name="logo_img" type="text" id="logo_img" value="<?php echo get_option('cici_logo_img'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="logo_alt">Logo image ALT text</label></th>
			<td>
				<input name="logo_alt" type="text" id="logo_alt" value="<?php echo get_option('cici_logo_alt'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="logo_txt">Text logo</label></th>
			<td>
				<input name="logo_txt" type="text" id="logo_txt" value="<?php echo get_option('cici_logo_txt'); ?>" class="regular-text" />
				<br /><em>Leave this empty if you entered an image as logo</em>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="logo_tagline">Logo Tag Line</label></th>
			<td>
				<input name="logo_tagline" type="text" id="logo_tagline" value="<?php echo get_option('cici_logo_tagline'); ?>" class="regular-text" />
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="tagline_width">Tag Line Box Width (px)</label><br /><em style="font-size:11px">Default width: 300px</em></th>
			<td>
				<input name="tagline_width" type="text" id="tagline_width" value="<?php echo get_option('cici_tagline_width'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="contact_email">Email Address for Contact Form</label></th>
			<td>
				<input name="contact_email" type="text" id="contact_email" value="<?php echo get_option('cici_contact_email'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="facebook_link">Facebook link</label></th>
			<td>
				<input name="facebook_link" type="text" id="facebook_link" value="<?php echo get_option('cici_facebook_link'); ?>" class="regular-text" />
			</td>
		</tr>
				<tr valign="top">
			<th scope="row"><label for="facebook_link">Twitter link</label></th>
			<td>
				<input name="twitter_link" type="text" id="twitter_link" value="<?php echo get_option('cici_twitter_link'); ?>" class="regular-text" />
			</td>
		</tr>
		<!-- Sidebar ABout Box-->
		<tr>
			<th colspan="2"><strong>Text Widget</strong></th>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="about_tit">Title</label></th>
			<td>
				<input name="about_tit" type="text" id="about_tit" value="<?php echo get_option('cici_about_tit'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="about_txt">Text</label></th>
			<td>
				<textarea cols="60" rows="5" name="about_txt" type="text" id="about_txt" class="regular-text" /><?php echo get_option('cici_about_txt'); ?></textarea>
			</td>
		</tr>
		<!-- Ads Box Settings -->
		
		<tr>
			<th colspan="2"><strong>Ads Sidebar 125x125 Box Settings</strong></th>
		</tr>
		<tr>
			<th><label for="ads">Ads Section Enabled:</label></th>
			<td>
				<select name="ads" id="ads">
					<option value="no" <?php if(get_option('cici_ads') == 'no'){?>selected="selected"<?php }?>>No</option>
					<option value="yes" <?php if(get_option('cici_ads') == 'yes'){?>selected="selected"<?php }?>>Yes</option>
				</select> 
			</td>
		</tr>

		<tr valign="top">
			<th scope="row"><label for="image_url1">Image URL 1</label></th>
			<td>
				<input name="image_url1" type="text" id="image_url1" value="<?php echo get_option('cici_image_url1'); ?>" class="regular-text" />
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="banner_url1">Banner URL 1</label></th>
			<td>
				<input name="banner_url1" type="text" id="banner_url1" value="<?php echo get_option('cici_banner_url1'); ?>" class="regular-text" />
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="image_url2">Image URL 2</label></th>
			<td>
				<input name="image_url2" type="text" id="image_url2" value="<?php echo get_option('cici_image_url2'); ?>" class="regular-text" />
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="banner_url2">Banner URL 2</label></th>
			<td>
				<input name="banner_url2" type="text" id="banner_url2" value="<?php echo get_option('cici_banner_url2'); ?>" class="regular-text" />
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="image_url3">Image URL 3</label></th>
			<td>
				<input name="image_url3" type="text" id="image_url3" value="<?php echo get_option('cici_image_url3'); ?>" class="regular-text" />
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="banner_url3">Banner URL 3</label></th>
			<td>
				<input name="banner_url3" type="text" id="banner_url3" value="<?php echo get_option('cici_banner_url3'); ?>" class="regular-text" />
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="image_url4">Image URL 4</label></th>
			<td>
				<input name="image_url4" type="text" id="image_url4" value="<?php echo get_option('cici_image_url4'); ?>" class="regular-text" />
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="banner_url4">Banner URL 4</label></th>
			<td>
				<input name="banner_url4" type="text" id="banner_url4" value="<?php echo get_option('cici_banner_url4'); ?>" class="regular-text" />
			</td>
		</tr>
		<!-- Video -->
		<tr>
			<th colspan="2"><strong>Sidebar Video</strong></th>
		</tr>
		<tr>
			<th><label for="videos">Video Section Enabled:</label></th>
			<td>
				<select name="videos" id="videos">
					<option value="no" <?php if(get_option('cici_videos') == 'no'){?>selected="selected"<?php }?>>No</option>
					<option value="yes" <?php if(get_option('cici_videos') == 'yes'){?>selected="selected"<?php }?>>Yes</option>
				</select> 
			</td>
		</tr>
		<tr>
			<th><label for="video">Paste the video embed code</label><br /><em style="font-size:11px">Please resize the video to width=280px and height=180px</em></th>
			<td>
				<textarea name="video" id="video" rows="7" cols="70" style="font-size:11px;"><?php echo stripslashes(get_option('cici_video')); ?></textarea>
			</td>
		</tr>
		
		<!-- Google Analytics -->
		<tr>
			<th><label for="ads">Google Analytics code:</label></th>
			<td>
				<textarea name="analytics" id="analytics" rows="7" cols="70" style="font-size:11px;"><?php echo stripslashes(get_option('cici_analytics')); ?></textarea>
			</td>
		</tr>
        <!-- Featured Posts -->
		<tr>
			<th colspan="2"><strong>Fetaured Posts</strong></th>
		</tr>
       <tr>
			<th><label for="slide">Featured Slider Section Enabled:</label></th>
			<td>
				<select name="slide" id="slide">
					<option value="no" <?php if(get_option('cici_slide') == 'no'){?>selected="selected"<?php }?>>No</option>
					<option value="yes" <?php if(get_option('cici_slide') == 'yes'){?>selected="selected"<?php }?>>Yes</option>
				</select> 
			</td>
		</tr>
        <tr valign="top">
			<th scope="row"><label for="slide_cat">Select the category</label></th>
            <td>
            <select name="slide_cat" id="slide_cat" style="width:250px;">
            <?php
				$categories = get_categories('hide_empty=0&orderby=name');				
				foreach ($categories as $category_list ) { ?>
                
				<option value="<?php echo $category_list->cat_name; ?>" <?php if(get_option('cici_slide_cat') == $category_list->cat_name){?>selected="selected"<?php }?>><?php echo $category_list->cat_name; ?></option>			
					    
			<?php	}
			?>
            </select>
            </td>
		</tr>
               
        <tr valign="top">
			<th scope="row"><label for="slide_num">How many Slides you want?</label></th>
			<td>
				<select name="slide_num" id="slide_num">
					<option value="1" <?php if(get_option('cici_slide_num') == '1'){?>selected="selected"<?php }?>>1</option>
					<option value="2" <?php if(get_option('cici_slide_num') == '2'){?>selected="selected"<?php }?>>2</option>
					<option value="3" <?php if(get_option('cici_slide_num') == '3'){?>selected="selected"<?php }?>>3</option>
					<option value="4" <?php if(get_option('cici_slide_num') == '4'){?>selected="selected"<?php }?>>4</option>
					<option value="5" <?php if(get_option('cici_slide_num') == '5'){?>selected="selected"<?php }?>>5</option>
					<option value="6" <?php if(get_option('cici_slide_num') == '6'){?>selected="selected"<?php }?>>6</option>
					<option value="7" <?php if(get_option('cici_slide_num') == '7'){?>selected="selected"<?php }?>>7</option>
					<option value="8" <?php if(get_option('cici_slide_num') == '8'){?>selected="selected"<?php }?>>8</option>
					<option value="9" <?php if(get_option('cici_slide_num') == '9'){?>selected="selected"<?php }?>>9</option>
					<option value="10" <?php if(get_option('cici_slide_num') == '10'){?>selected="selected"<?php }?>>10</option>
				</select>
			</td>
		</tr>
		
		
	</table>
	<p class="submit">
		<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
		<input type="hidden" name="cici_settings" value="save" style="display:none;" />
	</p>
</form>

</div>
<?php }
function get_first_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
$first_img = $matches [1] [0];
if(empty($first_img)){ //Defines a default image
$first_img = "/images/default.jpg";
}
return $first_img;
} ?>
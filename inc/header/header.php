<?php
/*
Header Style
*/
global $lottovibe_option;
$sticky             = !empty($lottovibe_option['off_sticky']) ? $lottovibe_option['off_sticky'] : ''; 
$sticky_menu        = ($sticky == 1) ? ' menu-sticky' : '';
$drob_aligns        = (!empty($lottovibe_option['drob_align_s'])) ? 'menu-drob-align' : '';
$mobile_hide_search = (!empty($lottovibe_option['mobile_off_search'])) ? 'mobile-hide-search' : '';
$mobile_hide_cart   = (!empty($lottovibe_option['mobile_off_cart'])) ? 'mobile-hide-cart-no' : 'mobile-hide-cart';
$mobile_hide_button = (!empty($lottovibe_option['mobile_off_button'])) ? 'mobile-hide-button' : '';
$mobile_logo_height =!empty($lottovibe_option['mobile_logo_height']) ? 'style = "max-height: '.$lottovibe_option['mobile_logo_height'].'"' : '';

// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');



$post_meta_header = '';
	 //check individual header 
if(is_page() || is_single()){
	$post_meta_header = get_post_meta(get_the_ID(), 'header_select', true);
	
}elseif(is_home() && !is_front_page() || is_home() && is_front_page()){
	$post_meta_header = get_post_meta(get_queried_object_id(), 'header_select', true);
}

$lottovibe_header_id = !empty($lottovibe_option['header_layout']) ? $lottovibe_option['header_layout'] : '';

$get_id = !empty($post_meta_header) ? $post_meta_header : $lottovibe_header_id;
$headser_postion = get_post_meta($get_id, 'header-position', true);
$get_header = ($headser_postion == 'on') ? 'fixed-header' : '';

?>

<?php 
  //include sticky search here
  get_template_part('inc/header/search');
?>

    <header id="svtheme-header" class="rts-default-header header-style-1 mainsmenu<?php echo esc_attr($main_menu_hides);?>">
     
    	<div class="header-inner<?php echo esc_attr($sticky_menu);?>">    
    		<div class="container">
    			<?php  get_template_part('inc/header/header-style1');  ?>
    		</div>
		</div>    
  
	</header>
<?php 
 get_template_part( 'inc/breadcrumbs' );  ?>
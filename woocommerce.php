<?php
get_header();
global $lottovibe_option;

if(isset($_GET['shop-layout'])){
	if( $_GET['shop-layout'] == 'full' ){
		$lottovibe_option['shop-layout'] = 'full';
	}elseif( $_GET['shop-layout'] == 'left' ){
		$lottovibe_option['shop-layout'] = 'left-col';
	}
}

// Layout class
$lottovibe_layout_class = 'col-sm-12 col-xs-12';

if(!empty($lottovibe_option['shop-layout']) ) {
	if (  $lottovibe_option['shop-layout'] == 'full' ) {
		$lottovibe_layout_class = 'col-sm-12 col-xs-12';
	}
	elseif( $lottovibe_option['shop-layout'] == 'left-col' || $lottovibe_option['shop-layout'] == 'right-col'){
		$lottovibe_layout_class = 'col-md-9 col-xs-12';
	}
	else{
		$lottovibe_layout_class = 'col-sm-12 col-xs-12';
	}
}
?>
<div class="container">
            <div id="content">
<div class="row">
	<?php
		if(!empty($lottovibe_option['disable-sidebar']) && is_product()){
			?>
			<div class="col-sm-12 col-xs-12">
			    <?php					
					woocommerce_content();
				?>
			</div>
			<?php
		}else{				
			if ( !empty($lottovibe_option['shop-layout']) && $lottovibe_option['shop-layout'] == 'left-col'  ) {
				get_sidebar('woocommerce');
			}
			?>    			
		    <div class="<?php echo esc_attr($lottovibe_layout_class);?>">
			    <?php					
					woocommerce_content();
   				 ?>
		    </div>
			<?php
			if (!empty($lottovibe_option['shop-layout']) &&  $lottovibe_option['shop-layout'] == 'right-col'  ) {
				get_sidebar('woocommerce');
			}	
		}
	?>
</div>
</div>
</div>

<?php
get_footer();
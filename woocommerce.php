<?php
get_header();
global $lottovite_option;

if(isset($_GET['shop-layout'])){
	if( $_GET['shop-layout'] == 'full' ){
		$lottovite_option['shop-layout'] = 'full';
	}elseif( $_GET['shop-layout'] == 'left' ){
		$lottovite_option['shop-layout'] = 'left-col';
	}
}

// Layout class
$lottovite_layout_class = 'col-sm-12 col-xs-12';

if(!empty($lottovite_option['shop-layout']) ) {
	if (  $lottovite_option['shop-layout'] == 'full' ) {
		$lottovite_layout_class = 'col-sm-12 col-xs-12';
	}
	elseif( $lottovite_option['shop-layout'] == 'left-col' || $lottovite_option['shop-layout'] == 'right-col'){
		$lottovite_layout_class = 'col-md-9 col-xs-12';
	}
	else{
		$lottovite_layout_class = 'col-sm-12 col-xs-12';
	}
}
?>
<div class="container">
            <div id="content">
<div class="row">
	<?php
		if(!empty($lottovite_option['disable-sidebar']) && is_product()){
			?>
			<div class="col-sm-12 col-xs-12">
			    <?php					
					woocommerce_content();
				?>
			</div>
			<?php
		}else{				
			if ( !empty($lottovite_option['shop-layout']) && $lottovite_option['shop-layout'] == 'left-col'  ) {
				get_sidebar('woocommerce');
			}
			?>    			
		    <div class="<?php echo esc_attr($lottovite_layout_class);?>">
			    <?php					
					woocommerce_content();
   				 ?>
		    </div>
			<?php
			if (!empty($lottovite_option['shop-layout']) &&  $lottovite_option['shop-layout'] == 'right-col'  ) {
				get_sidebar('woocommerce');
			}	
		}
	?>
</div>
</div>
</div>

<?php
get_footer();
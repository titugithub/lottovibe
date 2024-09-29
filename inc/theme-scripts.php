<?php
function lottovibe_scripts() {
	//register styles
	global $lottovibe_option;
	wp_enqueue_style( 'boostrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css' );	
	wp_enqueue_style( 'rt-icons', get_template_directory_uri() .'/assets/css/rt-icons.css');
	wp_enqueue_style( 'font-awesome-all', get_template_directory_uri() .'/assets/css/font-awesome.min.css');
	wp_enqueue_style( 'tabler-icons', get_template_directory_uri() .'/assets/css/tabler-icons.min.css');
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri() .'/assets/css/magnific-popup.css');
	wp_enqueue_style( 'swiperrrr', get_template_directory_uri().'/assets/css/plugins/swiper.min.css' );
	wp_enqueue_style( 'lottovibe-style-default', get_template_directory_uri() .'/assets/css/theme.css' );
	wp_enqueue_style( 'lottovibe-style-default-css', get_template_directory_uri() .'/assets/css/style.css' );
	
	wp_enqueue_style( 'lottovibe-style-responsive', get_template_directory_uri() .'/assets/css/responsive.css' );
	wp_enqueue_style( 'lottovibe-style', get_stylesheet_uri() );		


	// wp_enqueue_script( 'ggggg', get_template_directory_uri() . '/assets/js/plugins/jquery.js', array('jquery'), '', true );
	// wp_enqueue_script( 'matter', get_template_directory_uri() . '/assets/js/matter.js', array('jquery'), '2.8.3', true );
	wp_enqueue_script( 'matter-custom', get_template_directory_uri() . '/assets/js/plugins/matter-custom.js', array('jquery'), '2.8.3', true );
	wp_enqueue_script( 'swiperr', get_template_directory_uri() . '/assets/js/plugins/swiper.js', array('jquery'), '2.8.3', true );
	wp_enqueue_script( 'viewpot', get_template_directory_uri() . '/assets/js/plugins/viewpot.js', array('jquery'), '2.8.3', true );
	wp_enqueue_script( 'viewfpot', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '2.8.3', true );
	wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/js/plugins/aos.js', array('jquery'), '2.8.3', true );
	wp_enqueue_script( 'odometer', get_template_directory_uri() . '/assets/js/plugins/odometer.js', array('jquery'), '2.8.3', true );
	wp_enqueue_script( 'nice-select-js', get_template_directory_uri() . '/assets/js/plugins/jquery.nice-select.min.js', array('jquery'), '2.8.3', true );
	wp_enqueue_script('phosphor-icons', 'https://unpkg.com/@phosphor-icons/web', array(), null, true);
	






	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr-2.8.3.min.js', array('jquery'), '2.8.3', true );
	// wp_enqueue_script( 'swiper', get_template_directory_uri().'/assets/js/swiper-bundle.min.js', array('jquery'), '8.2.3');
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.min.js', array('jquery'), '1.1.2');
	
	wp_enqueue_script( 'jquery-counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'chart', get_template_directory_uri() . '/assets/js/chart.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true );	
	wp_enqueue_script( 'scrolltigger', get_template_directory_uri() . '/assets/js/scrolltigger.js', array('jquery'), '2.0.3', true );
	wp_enqueue_script( 'split-text', get_template_directory_uri() . '/assets/js/split-text.js', array('jquery'), '2.0.3', true );
	wp_enqueue_script( 'split-type', get_template_directory_uri() . '/assets/js/split-type.js', array('jquery'), '2.0.3', true );
	wp_enqueue_script('lottovibe-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lottovibe_scripts' );

add_action( 'wp_enqueue_scripts', 'lottovibe_rtl_scripts', 1500 );
if ( !function_exists( 'lottovibe_rtl_scripts' ) ) {
	function lottovibe_rtl_scripts() {	
		// RTL
		if ( is_rtl() ) {
			wp_enqueue_style( 'lottovibe-rtl', get_template_directory_uri() . '/assets/css/rtl.css', array(), 1.0 );
		}		
		
	}
}


add_action( 'admin_enqueue_scripts', 'lottovibe_load_admin_styles' );
function lottovibe_load_admin_styles($screen) {
	wp_enqueue_style( 'lottovibe-admin-style', get_template_directory_uri() . '/assets/css/admin-style.css', true, '1.0.0' );
	wp_enqueue_script( 'lottovibe-admin-script', get_template_directory_uri() . '/assets/js/admin-script.js', array('jquery'), '1.0.0', true );
} 
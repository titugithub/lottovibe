<?php
function lottovibe_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lottovibe' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'This is sidebar area for blog post and single post.', 'lottovibe' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'lottovibe' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'This is sidebar area for shop page.', 'lottovibe' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
			
}
add_action( 'widgets_init', 'lottovibe_widgets_init' );
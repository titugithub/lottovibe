<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function lottovibe_body_classes( $classes ) {
  // Adds a class of hfeed to non-singular pages.
  if ( ! is_singular() ) {
    $classes[] = 'hfeed';
  }

  return $classes;
}
add_filter( 'body_class', 'lottovibe_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function lottovibe_pingback_header() {
  if ( is_singular() && pings_open() ) {
    echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
  }
}

add_action( 'wp_head', 'lottovibe_pingback_header' );
/**  kses_allowed_html */
function lottovibe_prefix_kses_allowed_html($tags, $context) {
  switch($context) {
    case 'lottovibe': 
      $tags = array( 
        'a' => array('href' => array()),
        'b' => array()
      );
      return $tags;
    default: 
      return $tags;
  }
}
add_filter( 'wp_kses_allowed_html', 'lottovibe_prefix_kses_allowed_html', 10, 2);

/*
Register Fonts theme google font
*/
function lottovibe_studio_fonts_url() {
    $font_url = '';    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'lottovibe' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Albert Sans:300;400;500;600;700;|Exo:400;500;600;700;800' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}


function lottovibe_studio_scripts() {
    wp_enqueue_style( 'studio-fonts', lottovibe_studio_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'lottovibe_studio_scripts' );

//Favicon Icon
function lottovibe_site_icon() {
 if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {     
    global $lottovibe_option;
     
    if(!empty($lottovibe_option['rs_favicon']['url']))
    {?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url(($lottovibe_option['rs_favicon']['url'])); ?>"> 
  <?php 
    }
  }
}
add_filter('wp_head', 'lottovibe_site_icon');

//excerpt for specific section
function lottovibe_wpex_get_excerpt( $args = array() ) {
  // Defaults
  $defaults = array(
    'post'            => '',
    'length'          => 48,
    'readmore'        => false,
    'readmore_text'   => esc_html__( 'read more', 'lottovibe' ),
    'readmore_after'  => '',
    'custom_excerpts' => true,
    'disable_more'    => false,
  );
  // Apply filters
  $defaults = apply_filters( 'lottovibe_wpex_get_excerpt_defaults', $defaults );
  // Parse args
  $args = wp_parse_args( $args, $defaults );
  // Apply filters to args
  $args = apply_filters( 'lottovibe_wpex_get_excerpt_args', $defaults );
  // Extract
  extract( $args );
  // Get global post data
  if ( ! $post ) {
    global $post;
  }

  $post_id = $post->ID;
  if ( $custom_excerpts && has_excerpt( $post_id ) ) {
    $output = $post->post_excerpt;
  } 
  else { 
    $readmore_link = '<a href="' . get_permalink( $post_id ) . '" class="readmore">' . $readmore_text . $readmore_after . '</a>';    
    if ( ! $disable_more && strpos( $post->post_content, '<!--more-->' ) ) {
      $output = apply_filters( 'the_content', get_the_content( $readmore_text . $readmore_after ) );
    }    
    else {     
      $output = wp_trim_words( strip_shortcodes( $post->post_content ), $length );      
      if ( $readmore ) {
        $output .= apply_filters( 'lottovibe_wpex_readmore_link', $readmore_link );
      }
    }
  }
  // Apply filters and echo
  return apply_filters( 'lottovibe_wpex_get_excerpt', $output );
}

//Demo content file include here

function lottovibe_import_files() {
  return array(
    //default demo import
    array(
      'import_file_name'           => 'Wind Energy',
      'categories'                 => array( 'Wind Energy' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-content.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://html.themewant.com/lottovibe/landing/assets/images/demos/01.png',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/',     
      
    ),
    array(
      'import_file_name'           => 'Solar Energy',
      'categories'                 => array( 'Solar Energy' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-content-2.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://html.themewant.com/lottovibe/landing/assets/images/demos/02.png',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/solar-energy/',     
      
    ), 
    array(
      'import_file_name'           => 'Renewable Energy',
      'categories'                 => array( 'Renewable Energy' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-content-3.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://themewant.com/products/wordpress/landing/lottovibe/assets/images/demos/03.webp',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/renewable-energy/',     
      
    ), 

    array(
      'import_file_name'           => 'Hydro Power',
      'categories'                 => array( 'Hydro Power' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-content-4.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://themewant.com/products/wordpress/landing/lottovibe/assets/images/demos/04.webp',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/hydro-power/',     
      
    ), 

    array(
      'import_file_name'           => 'Wind Energy Banner',
      'categories'                 => array( 'Wind Energy' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/wind-video.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://html.themewant.com/lottovibe/landing/assets/images/demos/01.png',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/wind-energy-video/',     
      
    ),

    array(
      'import_file_name'           => 'Wind Energy Slider',
      'categories'                 => array( 'Wind Energy' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/wind-slider.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://html.themewant.com/lottovibe/landing/assets/images/demos/01.png',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/wind-energy-slider/',     
      
    ),

    array(
      'import_file_name'           => 'Solar Video Home',
      'categories'                 => array( 'Solar Video Home' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-content-5.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://html.themewant.com/lottovibe/landing/assets/images/demos/07.png',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/solar-solution/',     
      
    ), 


    array(
      'import_file_name'           => 'Solar Shop',
      'categories'                 => array( 'Solar Shop' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-content-6.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://themewant.com/products/wordpress/landing/lottovibe/assets/images/demos/05.webp',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/solar-shop/',     
      
    ),

    array(
      'import_file_name'           => 'Solar Storage',
      'categories'                 => array( 'Solar Storage' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-content-7.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://themewant.com/products/wordpress/landing/lottovibe/assets/images/demos/07.webp',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/energy-storage/',     
      
    ),

    array(
      'import_file_name'           => 'Solar Installation',
      'categories'                 => array( 'Solar Installation' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-content-8.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://themewant.com/products/wordpress/landing/lottovibe/assets/images/demos/08.webp',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/panel-installation/',     
      
    ),

     array(
      'import_file_name'           => 'Green Energy',
      'categories'                 => array( 'Green Energy' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/green-energy.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-green-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://themewant.com/products/wordpress/landing/lottovibe/assets/images/demos/09.webp',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/green-energy/',     
      
    ),

    array(
      'import_file_name'           => 'Green Energy Video',
      'categories'                 => array( 'Green Energy' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/green-energy-video.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-green-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://themewant.com/products/wordpress/landing/lottovibe/assets/images/demos/09.webp',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/home-video/',     
      
    ),

    array(
      'import_file_name'           => 'Green Energy Banner',
      'categories'                 => array( 'Green Energy' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/green-energy-banner.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-green-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://themewant.com/products/wordpress/landing/lottovibe/assets/images/demos/09.webp',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/home-banner/',     
      
    ),

    //default one page
    array(
      'import_file_name'           => 'One Page 1',
      'categories'                 => array( 'OnePage' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/onepage/content-1.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),
      'import_preview_image_url'   => 'https://html.themewant.com/lottovibe/landing/assets/images/demos/01.png',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/landing-one/',     
      
    ), 
    array(
      'import_file_name'           => 'One Page 2',
      'categories'                 => array( 'OnePage' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/onepage/content-2.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://html.themewant.com/lottovibe/landing/assets/images/demos/02.png',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/landing-two/',     
      
    ), 
    array(
      'import_file_name'           => 'One Page 3',
      'categories'                 => array( 'OnePage' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/onepage/content-3.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://themewant.com/products/wordpress/landing/lottovibe/assets/images/demos/03.webp',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/landing-three/',     
      
    ), 
    array(
      'import_file_name'           => 'One Page 4',
      'categories'                 => array( 'OnePage' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/onepage/content-4.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),
      'import_preview_image_url'   => 'https://themewant.com/products/wordpress/landing/lottovibe/assets/images/demos/04.webp',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/landing-four/',     
      
    ),  
    array(
      'import_file_name'           => 'One Page 5',
      'categories'                 => array( 'OnePage' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/onepage/content-5.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://html.themewant.com/lottovibe/landing/assets/images/demos/07.png',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/one-page-five',     
      
    ), 

    //default RTL demo data

    array(
      'import_file_name'           => 'Wind Energy RTL',
      'categories'                 => array( 'RTL' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/rtl/lottovibe-content.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://themewant.com/products/wordpress/landing/lottovibe/assets/images/demos/rtl-01.webp',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/rtl',     
      
    ),
    array(
      'import_file_name'           => 'Solar Energy RTL',
      'categories'                 => array( 'RTL' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/rtl/lottovibe-content-2.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://themewant.com/products/wordpress/landing/lottovibe/assets/images/demos/rtl-02.webp',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/rtl/solar-energy/',     
      
    ), 

    array(
      'import_file_name'           => 'Renewable Energy RTL',
      'categories'                 => array( 'RTL' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/rtl/lottovibe-content-3.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://themewant.com/products/wordpress/landing/lottovibe/assets/images/demos/rtl-03.webp',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/rtl/renewable-energy/',     
      
    ), 

    array(
      'import_file_name'           => 'Hydro Power RTL',
      'categories'                 => array( 'RTL' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/rtl/lottovibe-content-4.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

     'import_preview_image_url'   => 'https://themewant.com/products/wordpress/landing/lottovibe/assets/images/demos/rtl-04.webp',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/rtl/hydro-power/',     
      
    ), 

    array(
      'import_file_name'           => 'Solar Video RTL',
      'categories'                 => array( 'RTL' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/rtl/lottovibe-content-5.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://themewant.com/products/wordpress/landing/lottovibe/assets/images/demos/rtl-06.webp',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/rtl/solar-solution/',     
      
    ), 


    array(
      'import_file_name'           => 'Solar Shop',
      'categories'                 => array( 'Solar Shop' ),
      'import_file_url'            => 'https://svtheme.com/products/demo-data/lottovibe/default/rtl/lottovibe-content-6.xml',
             
      'import_redux'               => array(
        array(
          'file_url'    => 'https://svtheme.com/products/demo-data/lottovibe/default/lottovibe-options.json',
          'option_name' => 'lottovibe_option',
        ),
      ),

      'import_preview_image_url'   => 'https://themewant.com/products/wordpress/landing/lottovibe/assets/images/demos/rtl-05.webp',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://lottovibe.themewant.com/rtl/solar-shop/',     
      
    ),    
    
  );
}

add_filter( 'pt-ocdi/import_files', 'lottovibe_import_files' );

function lottovibe_after_import_setup($selected_import) {
  // Assign menus to their locations.
	$main_menu     = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
  $menu_single     = get_term_by( 'name', 'Onepage Menu', 'nav_menu' );
	set_theme_mod( 'nav_menu_locations', array(
      'menu-1' => $main_menu->term_id, 
      'menu-2' => $menu_single->term_id,      
    )
  );

  if ( 'Wind Energy' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Wind Energy');
  }
  if ( 'Wind Energy Video' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Wind Energy Video');
  }
  if ( 'Wind Energy Banner' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Wind Energy Banner');
  }
  if ( 'Solar Energy' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Solar Energy');
  }
  if ( 'Renewable Energy' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Renewable Energy');
  }
  if ( 'Hydro Power' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Hydro Power');
  }
  if ( 'Solar Video Home' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Solar Video Home');
  }

  if ( 'Solar Storage' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Energy Storage');
  }
  if ( 'Solar Installation' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Panel Installation');
  }

  if ( 'Green Energy' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Home');
  }
  if ( 'Green Energy Banner' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Home Banner');
  }
  if ( 'Green Energy Video' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Home Video');
  }

  //rtl

  if ( 'Wind Energy RTL' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Wind Energy');
  }
  if ( 'Solar Energy RTL' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Solar Energy');
  }
  if ( 'Renewable Energy RTL' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Renewable Energy');
  }
  if ( 'Hydro Power RTL' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Hydro Power');
  }
  if ( 'Solar Video Home RTL' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Solar Video Home');
  }
  if ( 'Solar Shop RTL' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Solar Shop');
  }

  //onepage
  if ( 'One Page 1' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('One Page One');
  }
  if ( 'One Page 2' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('One Page Two');
  }
  if ( 'One Page 3' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('One Page Three');
  }
  if ( 'One Page 4' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('One Page Four');
  }
    
  $blog_page_id  = get_page_by_title( 'News & Media' );
  update_option( 'show_on_front', 'page' );
  update_option( 'page_on_front', $front_page_id->ID );
  update_option( 'page_for_posts', $blog_page_id->ID ); 
  
   /**
     * Import The Sliders
     */
    if ( class_exists('RevSlider') ) {
        $slider = new RevSlider();
        if ( 'Default Demo' == $selected_import['import_file_name'] || 'Onepage 1'  == $selected_import['import_file_name']) {
            $first_slider = trailingslashit(get_template_directory()) . '/inc/demo-data/sliders/slider-1.zip';
            $slider->importSliderFromPost(true, true, $first_slider);
        }
        if ( 'Hydro Power' == $selected_import['import_file_name'] || 'Onepage 3'  == $selected_import['import_file_name'] ) {
            $second_slider = trailingslashit(get_template_directory()) . '/inc/demo-data/sliders/slider-1-1.zip';
            $slider->importSliderFromPost(true, true, $second_slider);
        }

         if ( 'Solar Video Home' == $selected_import['import_file_name'] ) {
            $solar_slider = trailingslashit(get_template_directory()) . '/inc/demo-data/sliders/solar-solution-slider-1.zip';
            $slider->importSliderFromPost(true, true, $solar_slider);
        }

          if ( 'Solar Installation' == $selected_import['import_file_name'] ) {
            $solar_slider = trailingslashit(get_template_directory()) . '/inc/demo-data/sliders/panel-installation.zip';
            $slider->importSliderFromPost(true, true, $solar_slider);
        }

        if ( 'Green Energy' == $selected_import['import_file_name'] ) {
            $solar_slider = trailingslashit(get_template_directory()) . '/inc/demo-data/sliders/green-energy.zip';
            $slider->importSliderFromPost(true, true, $solar_slider);
        }

        if ( 'Green Energy Video' == $selected_import['import_file_name'] ) {
          $solar_slider = trailingslashit(get_template_directory()) . '/inc/demo-data/sliders/home-video.zip';
          $slider->importSliderFromPost(true, true, $solar_slider);
      }

        //rtl

        if ( 'Wind Energy RTL' == $selected_import['import_file_name']) {
            $first_slider = trailingslashit(get_template_directory()) . '/inc/demo-data/sliders/rtl/slider-1.zip';
            $slider->importSliderFromPost(true, true, $first_slider);
        }
        if ( 'Hydro Power RTL' == $selected_import['import_file_name'] ) {
            $second_slider = trailingslashit(get_template_directory()) . '/inc/demo-data/sliders/rtl/slider-1-1.zip';
            $slider->importSliderFromPost(true, true, $second_slider);
        }

         if ( 'Solar Video Home RTL' == $selected_import['import_file_name'] ) {
            $solar_slider = trailingslashit(get_template_directory()) . '/inc/demo-data/sliders/rtl/solar-solution-slider-1.zip';
            $slider->importSliderFromPost(true, true, $solar_slider);
        }       
    }  
}
add_action( 'pt-ocdi/after_import', 'lottovibe_after_import_setup' );
//support svg image funciton
add_filter( 'use_widgets_block_editor', '__return_false' );


//disable elementor default style 
update_option('elementor_disable_color_schemes', 'yes');
update_option('elementor_disable_typography_schemes', 'yes');

//added elementor support for custom post type
function lottovibe_enable_elementor_for_custom_post_type() {
  add_post_type_support( 'rt-portfolios', 'elementor' );
  add_post_type_support( 'teams', 'elementor' );
  add_post_type_support( 'rts-canvans', 'elementor' );
  add_post_type_support( 'rtelements_pro', 'elementor' );
}
add_action( 'init', 'lottovibe_enable_elementor_for_custom_post_type' );
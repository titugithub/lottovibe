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

add_filter( 'use_widgets_block_editor', '__return_false' );


update_option('elementor_disable_color_schemes', 'yes');
update_option('elementor_disable_typography_schemes', 'yes');


//Demo content file include here
function lottovibe_import_files() {
  return array(
    array(
      'import_file_name'           => 'lottovibe Default Demo',
      'categories'                 => array( 'Main Demo' ),
      'import_file_url'            => 'https://softivuslab.com/wp/lottovibe/source/lottovibe-content.xml', 
             
      'import_redux'               => array(
        array(
          'file_url'               => 'https://softivuslab.com/wp/lottovibe/source/lottovibe-redux.json',
          'option_name'            => 'lottovibe_option',
        ),
      ),
      'import_preview_image_url'   => 'https://softivuslab.com/wp/lottovibe/source/screenshot.png',
     'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'lottovibe' ),
      'preview_url'                => 'https://softivuslab.com/wp/lottovibe/',     
      
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'lottovibe_import_files' );



function lottovibe_after_import_setup($selected_import) {
  // Assign menus to their locations.
  $main_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
  $menu_single = get_term_by('name', 'Onepage Menu', 'nav_menu');
  set_theme_mod('nav_menu_locations', array(
      'menu-1' => $main_menu->term_id,
      'menu-2' => $menu_single->term_id,
  ));

  // Set front page
  $front_page = get_page_by_title('Main Home');
  if ($front_page) {
      update_option('page_on_front', $front_page->ID);
      update_option('show_on_front', 'page');
  } else {
      // If 'Main Home' page doesn't exist, let's try to find another suitable page
      $possible_homes = ['Home', 'Homepage', 'Front Page'];
      foreach ($possible_homes as $home_title) {
          $alt_home = get_page_by_title($home_title);
          if ($alt_home) {
              update_option('page_on_front', $alt_home->ID);
              update_option('show_on_front', 'page');
              break;
          }
      }
  }

  // Set blog page
  $blog_page = get_page_by_title('News & Media');
  if ($blog_page) {
      update_option('page_for_posts', $blog_page->ID);
  }

  // Import Revolution Slider
  if (class_exists('RevSlider')) {
      $slider_array = array(
          get_template_directory() . "/inc/demo-data/sliders/slider-2.zip",
      );
      $slider = new RevSlider();
      foreach ($slider_array as $filepath) {
          $slider->importSliderFromPost(true, true, $filepath);
      }
  }

  // Flush rewrite rules
  flush_rewrite_rules();
}
add_action('pt-ocdi/after_import', 'lottovibe_after_import_setup');

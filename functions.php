<?php

if ( ! function_exists( 'lottovibe_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */ 

function lottovibe_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on lottovibe, use a find and replace
	 * to change 'lottovibe' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lottovibe', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );	
	add_theme_support( 'woocommerce' );	
	
	function lottovibe_change_excerpt( $text )
	{
		$pos = strrpos( $text, '[');
		if ($pos === false)
		{
			return $text;
		}
		
		return rtrim (substr($text, 0, $pos) ) . '...';
	}
	add_filter('get_the_excerpt', 'lottovibe_change_excerpt');


	// Limit Excerpt Length by number of Words
	function lottovibe_custom_excerpt( $limit ) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
		} else {
		$excerpt = implode(" ",$excerpt);
		}
		$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
		return $excerpt;
		}
		function content($limit) {
		$content = explode(' ', get_the_content(), $limit);
		if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
		} else {
		$content = implode(" ",$content);
		}
		$content = preg_replace('/[.+]/','', $content);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		return $content;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary Menu', 'lottovibe' ),		
		'menu-2' => esc_html__( 'Single Menu', 'lottovibe' ),
		
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );



	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lottovibe_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	//add support posts format
	add_theme_support( 'post-formats', array( 
		'aside', 
		'gallery',
		'audio',
		'video',
		'image',
		'quote',
		'link',
	) );

add_theme_support( 'align-wide' );	
}
endif;
add_action( 'after_setup_theme', 'lottovibe_setup' );

/**
*Custom Image Size
*/
add_image_size( 'lottovibe-blog-sideabr', 87, 87, true );
add_image_size( 'lottovibe-blog-grid',550, 350, true );
add_image_size( 'lottovibe-blog-grid-large',608, 282, true );
add_image_size( 'lottovibe-blog-grid-medium',420, 378, true );
add_image_size( 'project-home-one',483, 501, true );
add_image_size( 'project-home-three',312, 360, true );
add_image_size( 'team-home-three',312, 220, true );
add_image_size( 'project-details-one',424, 580, true );
add_image_size( 'project-details-two',648, 886, true );
add_image_size( 'project-details-three',540, 620, true );
add_image_size( 'project-details-four',312, 360, true );
add_image_size( 'team-home-three',312, 220, true );
add_image_size( 'poject-four',948, 700, true );
add_image_size( 'lottovibe-blog-grid-small',232, 232, true );
add_image_size( 'lottovibe-blog-gridtwo',416, 500, true );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lottovibe_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lottovibe_content_width', 640 );
}
add_action( 'after_setup_theme', 'lottovibe_content_width', 0 );


/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 *  Enqueue scripts and styles.
 */
require_once get_template_directory() . '/inc/theme-scripts.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/theme-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/theme-sidebar.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';



/**
 * Custom Style
 */
require_once get_template_directory() . '/inc/dyanamic-css.php';
require_once get_template_directory() . '/libs/theme-option/config.php';

//woocommerce function
require_once get_template_directory() . '/inc/woocommerce-functions.php';

if(is_admin()){
	require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';
	require_once get_template_directory() . '/inc/tgm/tgm-config.php';
	//require_once get_template_directory() . '/inc/license.php';
}



//----------------------------------------------------------------------
// Remove Redux Framework NewsFlash
//----------------------------------------------------------------------
if ( ! class_exists( 'reduxNewsflash' ) ):
    class reduxNewsflash {
        public function __construct( $parent, $params ) {}
    }
endif;

function lottovibe_remove_demo_mode_link() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'lottovibe_remove_demo_mode_link');

/**
 * Registers an editor stylesheet for the theme.
 */
function lottovibe_theme_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'lottovibe_theme_add_editor_styles' );


//------------------------------------------------------------------------
//Organize Comments form field
//-----------------------------------------------------------------------
function lottovibe_wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'lottovibe_wpb_move_comment_field_to_bottom' );	


//adding placeholder text for comment form

function lottovibe_comment_textarea_placeholder( $args ) {
	$args['comment_field']        = str_replace( '<textarea', '<textarea placeholder="Comment"', $args['comment_field'] );
	return $args;
}
add_filter( 'comment_form_defaults', 'lottovibe_comment_textarea_placeholder' );

/**
 * Comment Form Fields Placeholder
 *
 */
function lottovibe_comment_form_fields( $fields ) {
	foreach( $fields as &$field ) {
		$field = str_replace( 'id="author"', 'id="author" placeholder="Name*"', $field );
		$field = str_replace( 'id="email"', 'id="email" placeholder="Email*"', $field );
		$field = str_replace( 'id="url"', 'id="url" placeholder="Website"', $field );
	}
	return $fields;
}
add_filter( 'comment_form_default_fields', 'lottovibe_comment_form_fields' );


//customize archive tilte
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }
    return $title;
});

add_filter( 'get_the_archive_title', 'lottovibe_archive_title_remove_prefix' );
function lottovibe_archive_title_remove_prefix( $title ) {
	if ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	}
	return $title;
}

function lottovibe_menu_add_description_to_menu($item_output, $item, $depth, $args) {

   if (strlen($item->description) > 0 ) {
      // append description after link
      $item_output .= sprintf('<span class="description">%s</span>', esc_html($item->description));   
     
   }   
   return $item_output;
}
add_filter('walker_nav_menu_start_el', 'lottovibe_menu_add_description_to_menu', 10, 4);

add_filter('wp_list_categories', 'lottovibe_cat_count_span');
function lottovibe_cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span>(', $links);
  $links = str_replace(')', ')</span>', $links);
  return $links;
}

function lottovibe_style_the_archive_count($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="archiveCount">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}

add_filter('get_archives_link', 'lottovibe_style_the_archive_count');

/**
 * Post title array
 */
function lottovibe_get_postTitleArray($postType = 'post' ){
    $post_type_query  = new WP_Query(
        array (
            'post_type'      => $postType,
            'posts_per_page' => -1,
            'orderby' => 'title',
    		'order'   => 'ASC',
        )
    );
    // we need the array of posts
    $posts_array      = $post_type_query->posts;
    // the key equals the ID, the value is the post_title
    if ( is_array($posts_array) ) {
        $post_title_array = wp_list_pluck($posts_array, 'post_title', 'ID' );
    } else {
        $post_title_array['default'] = esc_html__( 'Default', 'lottovibe' );
    }
    return $post_title_array;
}

// Search Form

function custom_search_form($form) {
    ob_start();
    get_template_part('searchform');
    $form = ob_get_clean();
    return $form;
}
add_filter('get_search_form', 'custom_search_form');

// Remove p tag from contact form 7

add_filter('wpcf7_autop_or_not', '__return_false');

function add_custom_cursor_code() {
    if ( ! is_user_logged_in() ) { // Only add the cursor for non-logged-in users
        ?>
        <!-- ==== Custom Cursor Pointer ==== -->
        <div class="mouse-follower">
            <span class="cursor-outline"></span>
            <span class="cursor-dot"></span>
        </div>
        <!-- ==== Custom Cursor Pointer ==== -->
        <?php
    }
}
add_action('wp_footer', 'add_custom_cursor_code');



























































<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if (!class_exists('Redux')) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "lottovite_option";

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters('lottovite/opt_name', $opt_name);

/*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    'page_priority'        => 8,
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('lottovite Options', 'lottovite'),
    'page_title'           => esc_html__('lottovite Options', 'lottovite'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 20,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    'forced_dev_mode_off' => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    'compiler' => true,

    // OPTIONAL -> Give you extra features
    'page_priority'        => 20,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    'force_output' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    )
);

// Panel Intro text -> before the form
if (!isset($args['global_variable']) || $args['global_variable'] !== false) {
    if (!empty($args['global_variable'])) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace('-', '_', $args['opt_name']);
    }
    $args['intro_text'] = sprintf(esc_html__('lottovite Theme', 'lottovite'), $v);
} else {
    $args['intro_text'] = esc_html__('lottovite Theme', 'lottovite');
}

Redux::setArgs($opt_name, $args);

/*
     * ---> END ARGUMENTSlottovite
      
     */
// -> START General Settings
Redux::setSection(
    $opt_name,
    array(
        'title'            => esc_html__('General Settings', 'lottovite'),
        'id'               => 'basic-checkbox',
        'customizer_width' => '450px',
        'fields'           => array(

            array(
                'id'       => 'enable_global',
                'type'     => 'switch',
                'title'    => esc_html__('Enable Global Settings', 'lottovite'),
                'subtitle' => esc_html__('If you enable global settings all option will be work only theme option', 'lottovite'),
                'default'  => false,
            ),

            array(
                'id'       => 'container_size',
                'title'    => esc_html__('Container Size', 'lottovite'),
                'subtitle' => esc_html__('Container Size example(1200px)', 'lottovite'),
                'type'     => 'text',
                'default'  => '1320px'
            ),

            array(
                'id'       => 'rs_favicon',
                'type'     => 'media',
                'title'    => esc_html__('Upload Favicon', 'lottovite'),
                'subtitle' => esc_html__('Upload your faviocn here', 'lottovite'),
                'url' => true
            ),

            array(
                'id'       => 'off_sticky',
                'type'     => 'switch',
                'title'    => esc_html__('Enable Sticky Menu', 'lottovite'),
                'subtitle' => esc_html__('You can show or hide sticky menu here', 'lottovite'),
                'default'  => false,
            ),  
            array(
                'id'       => 'show_top_bottom',
                'type'     => 'switch', 
                'title'    => esc_html__('Scroll to Top', 'lottovite'),
                'subtitle' => esc_html__('You can show or hide here', 'lottovite'),
                'default'  => false,
            ),         
        )
    )
);


//Preloader settings
Redux::setSection(
    $opt_name,
    array(
        'title'  => esc_html__('Preloader Style', 'lottovite'),
        'desc'   => esc_html__('Preloader Style Here', 'lottovite'),
        'fields' => array(
            array(
                'id'       => 'show_preloader',
                'type'     => 'switch',
                'title'    => esc_html__('Show Preloader', 'lottovite'),
                'subtitle' => esc_html__('You can show or hide preloader', 'lottovite'),
                'default'  => false,
            ),

            array(
                'id'        => 'preloader_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Preloader Background Color', 'lottovite'),
                'subtitle'  => esc_html__('Pick color', 'lottovite'),
                'default'   => '#083D59',
                'validate'  => 'color',
            ),
           

            array(
                'id'        => 'preloader_animate_color2',
                'type'      => 'color',
                'title'     => esc_html__('Preloader Animate Middle Circle Color', 'lottovite'),
                'subtitle'  => esc_html__('Pick color', 'lottovite'),
               
                'validate'  => 'color',
                'output'    => array('background' => '.lds-ellipsis div')
            ),

          
            array(
                'id'    => 'preloader_img',
                'url'   => true,
                'title' => esc_html__('Preloader Image', 'lottovite'),
                'type'  => 'media',
            ),
        )
    )
);



//End Preloader settings  
// -> START Style Section
Redux::setSection($opt_name, array(
    'title'            => esc_html__('Style', 'lottovite'),
    'id'               => 'stle',
    'customizer_width' => '450px',
    'icon' => 'el el-brush',
));

Redux::setSection(
    $opt_name,
    array(
        'title'  => esc_html__('Global Style', 'lottovite'),
        'desc'   => esc_html__('Style your theme', 'lottovite'),
        'subsection' => true,
        'fields' => array(

            array(
                'id'        => 'body_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Body Backgroud Color', 'lottovite'),
                'subtitle'  => esc_html__('Pick body background color', 'lottovite'),
              
                'validate'  => 'color',
            ),

            array(
                'id'        => 'body_text_color',
                'type'      => 'color',
                'title'     => esc_html__('Text Color', 'lottovite'),
                'subtitle'  => esc_html__('Pick text color', 'lottovite'),
              
                'validate'  => 'color',
            ),

            array(
                'id'        => 'primary_color',
                'type'      => 'color',
                'title'     => esc_html__('Primary Color', 'lottovite'),
                'subtitle'  => esc_html__('Select Primary Color.', 'lottovite'),
              
                'validate'  => 'color',
                'output'      => array('.react-heading .title-inner .sub-text,  .menu-area .navbar ul li:hover a'),
            ),


            array(
                'id'        => 'link_text_color',
                'type'      => 'color',
                'title'     => esc_html__('Link Color', 'lottovite'),
                'subtitle'  => esc_html__('Pick Link color', 'lottovite'),
               
                'validate'  => 'color',
            ),

            array(
                'id'        => 'link_hover_text_color',
                'type'      => 'color',
                'title'     => esc_html__('Link Hover Color', 'lottovite'),
                'subtitle'  => esc_html__('Pick link hover color', 'lottovite'),
              
                'validate'  => 'color',
            ),

        )
    )
);


//Button settings
Redux::setSection(
    $opt_name,
    array(
        'title'      => esc_html__('Button Style', 'lottovite'),
        'desc'       => esc_html__('Button Style Here', 'lottovite'),
        'subsection' => true,
        'fields' => array(

            array(
                'id'        => 'btn_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Background Color', 'lottovite'),
                'subtitle'  => esc_html__('Pick color', 'lottovite'),
               
                'validate'  => 'color',
                'output'    => array('background-color' => '.react-button a')
            ),

            array(
                'id'        => 'btn_bg_hover',
                'type'      => 'color',
                'title'     => esc_html__('Hover Background', 'lottovite'),
                'subtitle'  => esc_html__('Pick color', 'lottovite'),
              
                'validate'  => 'color',
                'output'    => array('background' => '.react-button a:hover')

            ),          

            array(
                'id'        => 'btn_text_color',
                'type'      => 'color',
                'title'     => esc_html__('Text Color', 'lottovite'),
                'subtitle'  => esc_html__('Pick color', 'lottovite'),
            
                'validate'  => 'color',
                'output'    => array('.react-button a')
            ),

            array(
                'id'        => 'btn_txt_hover_color',
                'type'      => 'color',
                'title'     => esc_html__('Hover Text Color', 'lottovite'),
                'subtitle'  => esc_html__('Pick color', 'lottovite'),
             
                'validate'  => 'color',
                'output'    => array('.react-button a:hover')
            ),

            array(
                'id'     => 'notice_critical',
                'type'   => 'info',
                'notice' => true,
                'style'  => 'success',
                'title'  => esc_html__('Seconday Button Style', 'lottovite')            
            ),
            array(
                'id'        => 'btn2_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Background Color', 'lottovite'),
                'subtitle'  => esc_html__('Pick color', 'lottovite'),
                
                'validate'  => 'color',
                'output'    => array('background-color' => '.react-button.secondary_btn a')
            ),

            array(
                'id'        => 'btn2_bg_hover',
                'type'      => 'color',
                'title'     => esc_html__('Hover Background', 'lottovite'),
                'subtitle'  => esc_html__('Pick color', 'lottovite'),
              
                'validate'  => 'color',
                'output'    => array('background' => '.react-button.secondary_btn a:after')

            ),
            
            array(
                'id'        => 'btn2_text_color',
                'type'      => 'color',
                'title'     => esc_html__('Text Color', 'lottovite'),
                'subtitle'  => esc_html__('Pick color', 'lottovite'),
              
                'validate'  => 'color',
                'output'    => array('.react-button.secondary_btn a')
            ),

            array(
                'id'        => 'btn2_txt_hover_color',
                'type'      => 'color',
                'title'     => esc_html__('Hover Text Color', 'lottovite'),
                'subtitle'  => esc_html__('Pick color', 'lottovite'),
              
                'validate'  => 'color',
                'output'    => array('.react-button.secondary_btn a:after')
            ),
        )
    )
);


//Breadcrumb settings
Redux::setSection(
    $opt_name,
    array(
        'title'  => esc_html__('Breadcrumb Style', 'lottovite'),
        'subsection' => true,
        'fields' => array(

            array(
                'id'       => 'off_breadcrumb',
                'type'     => 'switch',
                'title'    => esc_html__('Show off Breadcrumb', 'lottovite'),
                'subtitle' => esc_html__('You can show or hide off breadcrumb here', 'lottovite'),
                'default'  => true,
            ),

            array(
                'id'       => 'align_breadcrumb',
                'type'     => 'switch',
                'title'    => esc_html__('Breadcrumb Align Left', 'lottovite'),
                'subtitle' => esc_html__('You can breadcrumb align left', 'lottovite'),
                'default'  => false,
            ),

            array(
                'id'        => 'breadcrumb_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Background Bg Color', 'lottovite'),
                'subtitle'  => esc_html__('Pick color', 'lottovite'),
               
                'validate'  => 'color',
            ),

            array(
                'id'        => 'page_title_color',
                'type'      => 'color',
                'title'     => esc_html__('Banner Title Color', 'lottovite'),
                'subtitle'  => esc_html__('Pick color', 'lottovite'),
              
                'validate'  => 'color',               
            ),

            array(
                'id'          => 'opt-typography',
                'type'        => 'typography', 
                'title'       => __('Banner Title Typography', 'lottovite'),    
                'output'      => array('.reactheme-breadcrumbs .page-title'),
                'units'       =>'px',
                'subtitle'    => __('Typography option with each property can be called individually.', 'lottovite'),                
            ),

            array(
                'id'        => 'breadcrumb_top_gap',
                'type'      => 'text',
                'title'     => esc_html__('Top Gap', 'lottovite'),
                'default'   => '30px',
            ),

          
            array(
                'id'       => 'page_banner_main',
                'type'     => 'media',
                'title'    => esc_html__('Background Banner', 'lottovite'),
                'subtitle' => esc_html__('Upload your banner', 'lottovite'),
            ),


            array(
                'id'        => 'breadcrumb_top_gap',
                'type'      => 'text',
                'title'     => esc_html__('Top Gap', 'lottovite'),
                'default'   => '30px',

            ),
            array(
                'id'        => 'breadcrumb_bottom_gap',
                'type'      => 'text',
                'title'     => esc_html__('Bottom Gap', 'lottovite'),
                'default'   => '30px',
            ),

            array(
                'id'        => 'mobile_breadcrumb_top_gap',
                'type'      => 'text',
                'title'     => esc_html__('Mobile Top Gap', 'lottovite'),
                'default'   => '30px',

            ),
            array(
                'id'        => 'mobile_breadcrumb_bottom_gap',
                'type'      => 'text',
                'title'     => esc_html__('Mobile Bottom Gap', 'lottovite'),
                'default'   => '30px',
            ),

        )
    )
);
//-> START Typography
Redux::setSection(
    $opt_name,
    array(
        'title'  => esc_html__('Typography', 'lottovite'),
        'id'     => 'typography',
        'desc'   => esc_html__('You can specify your body and heading font here', 'lottovite'),
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'opt-typography-body',
                'type'     => 'typography',
                'title'    => esc_html__('Body Font', 'lottovite'),
                'subtitle' => esc_html__('Specify the body font properties.', 'lottovite'),
                'google'   => true,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '16px',
                    'font-family' => 'Jost',
                    'font-weight' => '400',
                ),
            ),
            array(
                'id'       => 'opt-typography-menu',
                'type'     => 'typography',
                'title'    => esc_html__('Navigation Font', 'lottovite'),
                'subtitle' => esc_html__('Specify the menu font properties.', 'lottovite'),
                'google'   => true,
                'font-backup' => true,
                'all_styles'  => true,
                'default'  => array(
                    'color'       => '',
                    'font-family' => '',
                    'google'      => true,
                    'font-size'   => '15px',
                    'font-weight' => '500',
                ),
            ),
            array(
                'id'          => 'opt-typography-h1',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H1', 'lottovite'),
                'font-backup' => true,
                'all_styles'  => true,
                'units'       => 'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'lottovite'),
                'default'     => array(
                
                    'font-style'  => '700',
                    'font-family' => '',
                    'google'      => true,
                    'font-size'   => '46px',
                    'line-height' => '56px'

                ),
            ),
            array(
                'id'          => 'opt-typography-h2',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H2', 'lottovite'),
                'font-backup' => true,
                'all_styles'  => true,
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'lottovite'),
                'default'     => array(
                 
                    'font-style'  => '700',
                    'font-family' => '',
                    'google'      => true,
                    'font-size'   => '36px',
                    'line-height' => '46px'

                ),
            ),
            array(
                'id'          => 'opt-typography-h3',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H3', 'lottovite'),
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'lottovite'),
                'default'     => array(
                   
                    'font-style'  => '700',
                    'font-family' => '',
                    'google'      => true,
                    'font-size'   => '28px',
                    'line-height' => '32px'

                ),
            ),
            array(
                'id'          => 'opt-typography-h4',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H4', 'lottovite'),
                'font-backup' => false,
                'all_styles'  => true,
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'lottovite'),
                'default'     => array(
                  
                    'font-style'  => '700',
                    'font-family' => '',
                    'google'      => true,
                    'font-size'   => '20px',
                    'line-height' => '28px'
                ),
            ),
            array(
                'id'          => 'opt-typography-h5',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H5', 'lottovite'),
                'font-backup' => false,
                'all_styles'  => true,
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'lottovite'),
                'default'     => array(
                  
                    'font-style'  => '700',
                    'font-family' => '',
                    'google'      => true,
                    'font-size'   => '18px',
                    'line-height' => '26px'
                ),
            ),
            array(
                'id'          => 'opt-typography-6',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H6', 'lottovite'),

                'font-backup' => false,
                'all_styles'  => true,
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'lottovite'),
                'default'     => array(
                
                    'font-style'  => '700',
                    'font-family' => '',
                    'google'      => true,
                    'font-size'   => '16px',
                    'line-height' => '20px'
                ),
            ),

        )
    )

);

/*Team Sections*/
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Team Section', 'lottovite' ),
    'id'               => 'team',
    'customizer_width' => '450px',
    'icon' => 'el el-user',
    'fields'           => array(        
    
        array(
            'id'       => 'team_single_image', 
            'url'      => true,     
            'title'    => esc_html__( 'Team Single page banner image', 'lottovite' ),                    
            'type'     => 'media',
                
        ), 

        array(
            'id'       => 'team_details_text',                               
            'title'    => esc_html__( 'Team Details Title', 'lottovite' ),
            'subtitle' => esc_html__( 'Enter Title Here', 'lottovite' ),
            'type'     => 'text',
            'default'  => esc_html__('Team Details', 'lottovite'),
            
        ),

        array(
            'id'        => 'team_single_bg_color',
            'type'      => 'color',                           
            'title'     => esc_html__('Sinlge Team Body Backgroud Color','lottovite'),
            'subtitle'  => esc_html__('Pick body background color', 'lottovite'),
          
            'validate'  => 'color',                        
        ),
        
        array(
                'id'       => 'team_slug',                               
                'title'    => esc_html__( 'Team Slug', 'lottovite' ),
                'subtitle' => esc_html__( 'Enter Team Slug Here', 'lottovite' ),
                'type'     => 'text',
                'default'  => esc_html__('teams', 'lottovite'),
                
            ),                 
                      
        )
    ) 
);

if (class_exists('WooCommerce')) {
    Redux::setSection(
        $opt_name,
        array(
            'title'  => esc_html__('Woocommerce', 'lottovite'),
            'icon'   => 'el el-shopping-cart',
        )
    );

    Redux::setSection(
        $opt_name,
        array(
            'title'            => esc_html__('Shop', 'lottovite'),
            'id'               => 'shop_layout',
            'customizer_width' => '450px',
            'subsection' => true,
            'fields'           => array(
                array(
                    'id'       => 'shop_banner',
                    'url'      => true,
                    'title'    => esc_html__('Shop page banner', 'lottovite'),
                    'type'     => 'media',
                ),
                array(
                    'id'       => 'shop-long-title',
                    'url'      => true,
                    'title'    => esc_html__('Shop Long Title', 'lottovite'),
                    'type'     => 'text',
                ),
                array(
                    'id'       => 'shop-layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Select Shop Layout', 'lottovite'),
                    'subtitle' => esc_html__('Select your shop layout', 'lottovite'),
                    'options'  => array(
                        'full'      => array(
                            'alt'   => esc_html__('Shop Style 1', 'lottovite'),
                            'img'   => get_template_directory_uri() . '/libs/img/1c.png'
                        ),
                        'right-col' => array(
                            'alt'   => esc_html__('Shop Style 2', 'lottovite'),
                            'img'   => get_template_directory_uri() . '/libs/img/2cr.png'
                        ),
                        'left-col'  => array(
                            'alt'   => esc_html__('Shop Style 3', 'lottovite'),
                            'img'   => get_template_directory_uri() . '/libs/img/2cl.png'
                        ),
                    ),
                    'default' => 'full'
                ),

                array(
                    'id'       => 'wc_num_product',
                    'type'     => 'text',
                    'title'    => esc_html__('Number of Products Per Page', 'lottovite'),
                    'default'  => '9',
                ),

                array(
                    'id'       => 'wc_num_product_per_row',
                    'type'     => 'text',
                    'title'    => esc_html__('Number of Products Per Row', 'lottovite'),
                    'default'  => '3',
                ),

                array(
                    'id'       => 'wc_cart_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__('Cart Icon Show At Menu Area', 'lottovite'),
                    'on'       => esc_html__('Enabled', 'lottovite'),
                    'off'      => esc_html__('Disabled', 'lottovite'),
                    'default'  => false,
                ),

                array(
                    'id'       => 'disable-sidebar',
                    'type'     => 'switch',
                    'title'    => esc_html__('Sidebar Disable For Single Product Page', 'lottovite'),
                    'default'  => true,
                ),

                array(
                    'id'       => 'wc_wishlist_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__('Show Wishlist Icon', 'lottovite'),
                    'on'       => esc_html__('Enabled', 'lottovite'),
                    'off'      => esc_html__('Disabled', 'lottovite'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'wc_quickview_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__('Product Quickview Icon', 'lottovite'),
                    'on'       => esc_html__('Enabled', 'lottovite'),
                    'off'      => esc_html__('Disabled', 'lottovite'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'wc_show_new',
                    'type'     => 'switch',
                    'title'    => esc_html__('Show Product New Badge', 'lottovite'),
                    'on'       => esc_html__('Enabled', 'lottovite'),
                    'off'      => esc_html__('Disabled', 'lottovite'),
                    'default'  => true,
                ),

                array(
                    'id'       => 'wc_new_product_days',
                    'type'     => 'select',
                    'title'    => esc_html__('New Days', 'lottovite'),
                    'desc'     => esc_html__('Select last day, when uploaded products will show a new badge.', 'lottovite'),
                    //Must provide key => value pairs for select options
                    'options'  => array(
                        '7'     => esc_html__('7 Days', 'lottovite'),
                        '10' => esc_html__('10 Days', 'lottovite'),
                        '15' => esc_html__('15 Days', 'lottovite'),
                        '30' => esc_html__('30 Days', 'lottovite'),
                    ),
                    'default'  => '15',

                ),



            )
        )
    );
    Redux::setSection(
        $opt_name,
        array(
            'title'            => esc_html__('Shop Single', 'lottovite'),
            'id'               => 'shop_single',
            'customizer_width' => '450px',
            'subsection' => true,
            'fields'           => array(

                array(
                    'id'       => 'single-gallery-layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Single Product Gallery Layout', 'lottovite'),
                    'subtitle' => esc_html__('Select single page gallery layout', 'lottovite'),
                    'options'  => array(
                        'default-thumb'      => array(
                            'alt'   => esc_html__('Style 1', 'lottovite'),
                            'img'   => get_template_directory_uri() . '/libs/img/1c.png'
                        ),
                        'right-thumb' => array(
                            'alt'   => esc_html__('Style 2', 'lottovite'),
                            'img'   => get_template_directory_uri() . '/libs/img/2cr.png'
                        ),
                        'left-thumb'  => array(
                            'alt'   => esc_html__('Style 3', 'lottovite'),
                            'img'   => get_template_directory_uri() . '/libs/img/2cl.png'
                        ),
                    ),
                    'default' => 'default-thumb'
                ),

                array(
                    'id'       => 'single_releted_products',
                    'type'     => 'text',
                    'title'    => esc_html__('Number of Releted Products in Product detail Page', 'lottovite'),
                    'default'  => '4',
                ),
                array(
                    'id'       => 'single_releted_products_col',
                    'type'     => 'text',
                    'title'    => esc_html__('Coloumn Number of Releted Products in Product detail Page', 'lottovite'),
                    'default'  => '4',
                ),

            )
        )
    );
}
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Portfolio Section', 'lottovite' ),
    'id'               => 'Portfolio',
    'customizer_width' => '450px',
    'icon' => 'el el-align-right',
    'fields'           => array(
    
        array(
                'id'       => 'department_single_image', 
                'url'      => true,     
                'title'    => esc_html__( 'Portfolio Single page banner image', 'lottovite' ),                    
                'type'     => 'media',
                
        ),  

         array(
                'id'       => 'portfolio_slug',                               
                'title'    => esc_html__( 'Portfolio Slug', 'lottovite' ),
                'subtitle' => esc_html__( 'Enter Portfolio Slug Here', 'lottovite' ),
                'type'     => 'text',
                'default'  => 'rt-portfolios',                
            ), 
            array(
                'id'       => 'portfolio_cat_slug',                               
                'title'    => esc_html__( 'Portfolio Category Slug', 'lottovite' ),
                'subtitle' => esc_html__( 'Enter Portfolio Cat Slug Here', 'lottovite' ),
                'type'     => 'text',
                'default'  => '',                    
            ), 

            array(
                'id'       => 'portfolio_details',                               
                'title'    => esc_html__( 'Portfolio Details Stroke Text', 'lottovite' ),
                'subtitle' => esc_html__( 'Enter Text Here', 'lottovite' ),
                'type'     => 'text',
                'default'  => 'Portfolio Details',                    
            ), 

            array(
                'id'        => 'portfolio_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Project Information Area Background', 'lottovite'),
                'subtitle'  => esc_html__('Pick color', 'lottovite'),
                'default'   => '',
                'validate'  => 'color',
                'output'    => array('background' => '.big-bg-porduct-details .project-info')
            ),
            array(
                'id'        => 'portfolio_bg_border_color',
                'type'      => 'color_rgba',
                'title'     => esc_html__('Project Information Border Color', 'lottovite'),
                'subtitle'  => esc_html__('Pick color', 'lottovite'),
              
                'output'    => array('border-color' => '.big-bg-porduct-details .project-info .info-body .single-info')
            ),
        )
     ) 
);
/*Blog Sections*/
Redux::setSection(
    $opt_name,
    array(
        'title'            => esc_html__('Blog', 'lottovite'),
        'id'               => 'blog',
        'customizer_width' => '450px',
        'icon' => 'el el-comment',
    )
);

Redux::setSection(
    $opt_name,
    array(
        'title'            => esc_html__('Blog Settings', 'lottovite'),
        'id'               => 'blog-settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'blog_banner_main',
                'url'   => true,
                'title' => esc_html__('Blog Page Banner', 'lottovite'),
                'type'  => 'media',
            ),

            array(
                'id'        => 'blog_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Body Backgroud Color', 'lottovite'),
                'subtitle'  => esc_html__('Pick body background color', 'lottovite'),
            
                'validate'  => 'color',
            ),

            array(
                'id'       => 'blog_title',
                'title'    => esc_html__('Blog  Title', 'lottovite'),
                'subtitle' => esc_html__('Enter Blog  Title Here', 'lottovite'),
                'type'     => 'text',
            ),          

            array(
                'id'               => 'blog-layout',
                'type'             => 'image_select',
                'title'            => esc_html__('Select Blog Layout', 'lottovite'),
                'subtitle'         => esc_html__('Select your blog layout', 'lottovite'),
                'options'          => array(
                    'full'             => array(
                        'alt'              => esc_html__('Blog Style 1', 'lottovite'),
                        'img'              => get_template_directory_uri() . '/libs/img/1c.png'
                    ),
                    '2right'           => array(
                        'alt'              => esc_html__('Blog Style 2', 'lottovite'),
                        'img'              => get_template_directory_uri() . '/libs/img/2cr.png'
                    ),
                    '2left'            => array(
                        'alt'              => esc_html__('Blog Style 3', 'lottovite'),
                        'img'              => get_template_directory_uri() . '/libs/img/2cl.png'
                    ),
                ),
                'default'          => '2right'
            ),

            array(
                'id'               => 'blog-grid',
                'type'             => 'select',
                'title'            => esc_html__('Select Blog Gird', 'lottovite'),
                'desc'             => esc_html__('Select your blog gird layout', 'lottovite'),
                //Must provide key => value pairs for select options
                'options'          => array(
                    '12'               => esc_html__('1 Column', 'lottovite'),
                    '6'                => esc_html__('2 Column', 'lottovite'),
                    '4'                => esc_html__('3 Column', 'lottovite'),
                    '3'                => esc_html__('4 Column', 'lottovite'),
                ),
                'default'          => '12',
            ),

            array(
                'id'               => 'blog-author-post',
                'type'             => 'select',
                'title'            => esc_html__('Show Author Info ', 'lottovite'),
                'desc'             => esc_html__('Select author info show or hide', 'lottovite'),
                //Must provide key => value pairs for select options
                'options'          => array(
                    'show'             => esc_html__('Show', 'lottovite'),
                    'hide'             => esc_html__('Hide', 'lottovite'),
                ),
                'default'          => 'show',

            ),



            array(
                'id'               => 'blog-category',
                'type'             => 'select',
                'title'            => esc_html__('Show Category', 'lottovite'),

                //Must provide key => value pairs for select options
                'options'          => array(
                    'show'             => esc_html__('Show', 'lottovite'),
                    'hide'             => esc_html__('Hide', 'lottovite'),
                ),
                'default'          => 'show',

            ),

            array(
                'id'               => 'blog-date',
                'type'             => 'switch',
                'title'            => esc_html__('Show Date', 'lottovite'),
                'desc'             => esc_html__('You can show/hide date at blog page', 'lottovite'),

                'default'          => true,
            ),
            array(
                'id'               => 'blog_readmore',
                'title'            => esc_html__('Blog  ReadMore Text', 'lottovite'),
                'subtitle'         => esc_html__('Enter Blog  ReadMore Here', 'lottovite'),
                'type'             => 'text',
            ),

        )
    )

);


/*Single Post Sections*/
Redux::setSection(
    $opt_name,
    array(
        'title'            => esc_html__('Single Post', 'lottovite'),
        'id'               => 'spost',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(

            array(
                'id'       => 'single_blog_title',
                'title'    => esc_html__('Single Blog  Title', 'lottovite'),
                'subtitle' => esc_html__('Enter Title Here', 'lottovite'),
                'type'     => 'text',
            ),
            array(
                'id'       => 'blog_banner',
                'url'      => true,
                'title'    => esc_html__('Blog Single page banner', 'lottovite'),
                'type'     => 'media',

            ),

           

            array(
                'id'       => 'blog-comments',
                'type'     => 'select',
                'title'    => esc_html__('Show Comment', 'lottovite'),
                'desc'     => esc_html__('Select comments show or hide', 'lottovite'),
                //Must provide key => value pairs for select options
                'options'  => array(
                    'show' => esc_html__('Show', 'lottovite'),
                    'hide' => esc_html__('Hide', 'lottovite'),
                ),
                'default'  => 'show',

            ),

            array(
                'id'       => 'blog-author',
                'type'     => 'select',
                'title'    => esc_html__('Show Ahthor Info', 'lottovite'),
                'desc'     => esc_html__('Select author info show or hide', 'lottovite'),
                //Must provide key => value pairs for select options
                'options'  => array(
                    'show' => esc_html__('Show', 'lottovite'),
                    'hide' => esc_html__('Hide', 'lottovite'),
                ),
                'default'  => 'show',

            ),

        )
    )


);


Redux::setSection(
    $opt_name,
    array(
        'title'  => esc_html__('404 Error Page', 'lottovite'),
        'desc'   => esc_html__('404 details  here', 'lottovite'),
        'icon'   => 'el el-error-alt',
        'fields' => array(

            array(
                'id'       => 'title_404',
                'type'     => 'text',
                'title'    => esc_html__('Title', 'lottovite'),
                'subtitle' => esc_html__('Enter title for 404 page', 'lottovite'),
                'default'  => esc_html__('404', 'lottovite')
            ),

            array(
                'id'       => 'text_404',
                'type'     => 'text',
                'title'    => esc_html__('Text', 'lottovite'),
                'subtitle' => esc_html__('Enter text for 404 page', 'lottovite'),
                'default'  => esc_html__('Page Not Found', 'lottovite')
            ),


            array(
                'id'       => 'back_home',
                'type'     => 'text',
                'title'    => esc_html__('Back to Home Button Label', 'lottovite'),
                'subtitle' => esc_html__('Enter label for "Back to Home" button', 'lottovite'),
                'default'  => esc_html__('Back to Homepage', 'lottovite')

            ),
            array(
                'id'       => '404_bg',
                'type'     => 'media',
                'title'    => esc_html__('404 page Image', 'lottovite'),
                'subtitle' => esc_html__('Upload your image', 'lottovite'),
                'url' => true
            ),


        )
    )
);

if (!function_exists('compiler_action')) {
    function compiler_action($options, $css, $changed_values)
    {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r($changed_values); // Values that have changed since the last save
        echo "</pre>";
    }
}

/**
 * Custom function for the callback validation referenced above
 * */
if (!function_exists('redux_validate_callback_function')) {
    function redux_validate_callback_function($field, $value, $existing_value)
    {
        $error   = false;
        $warning = false;

        //do your validation
        if ($value == 1) {
            $error = true;
            $value = $existing_value;
        } elseif ($value == 2) {
            $warning = true;
            $value   = $existing_value;
        }

        $return['value'] = $value;

        if ($error == true) {
            $field['msg']    = 'your custom error message';
            $return['error'] = $field;
        }

        if ($warning == true) {
            $field['msg']      = 'your custom warning message';
            $return['warning'] = $field;
        }

        return $return;
    }
}

/**
 * Custom function for the callback referenced above
 */
if (!function_exists('redux_my_custom_field')) {
    function redux_my_custom_field($field, $value)
    {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
}

/**
 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.     
 * */
if (!function_exists('dynamic_section')) {
    function dynamic_section($sections)
    {
        //$sections = array();
        $sections[] = array(
            'title'  => esc_html__('Section via hook', 'lottovite'),
            'desc'   => esc_html__('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'lottovite'),
            'icon'   => 'el el-paper-clip',
            'fields' => array()
        );
        return $sections;
    }
}

/**
 * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
 * */
if (!function_exists('change_arguments')) {
    function change_arguments($args)
    {
        return $args;
    }
}

/**
 * Filter hook for filtering the default value of any given field. Very useful in development mode.
 * */
if (!function_exists('change_defaults')) {
    function change_defaults($defaults)
    {
        $defaults['str_replace'] = 'Testing filter hook!';
        return $defaults;
    }
}

/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */
if (!function_exists('remove_demo')) {
    function remove_demo()
    {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if (class_exists('ReduxFrameworkPlugin')) {
            remove_action('plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2);
            remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
        }
    }
}

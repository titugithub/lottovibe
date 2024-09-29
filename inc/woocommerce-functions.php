<?php
    /* All Functions for woocommerce
    -----------------------------------------*/
    /*-------------------------------------
    #. Theme supports for WooCommerce
    ---------------------------------------*/

    function lottovibe_add_woocommerce_support() {
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-slider');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
    }
    add_action('after_setup_theme', 'lottovibe_add_woocommerce_support');

    add_filter('get_the_archive_title_prefix', '__return_empty_string');

    function lottovibe_wc_shop_thumb_area() {
        get_template_part('template-parts/wo-templates/content', 'shop-thumb');
    }

    /* Shop hide default page title */
    function lottovibe_wc_hide_page_title() {
        return false;
    }

    function lottovibe_wc_loop_product_title() {
        echo '<h2 class="woocommerce-loop-product__title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
    }

    function lottovibe_wc_loop_shop_per_page() {
        global $lottovibe_option;
        $layout = !empty($lottovibe_option['wc_num_product']) ? $lottovibe_option['wc_num_product'] : 9;
        return $layout;
    }
    add_action('loop_shop_per_page', 'lottovibe_wc_loop_shop_per_page');

    // Change number or products per row
    if (!function_exists('lottovibe_loop_columns')) {
        function lottovibe_loop_columns() {
            global $lottovibe_option;
            $layout_col = !empty($lottovibe_option['wc_num_product_per_row']) ? $lottovibe_option['wc_num_product_per_row'] : 3;

            if (isset($_GET['shop-layout'])) {
                if ($_GET['shop-layout'] == 'full') {
                    $lottovibe_option['shop-layout'] = 'full';
                    $layout_col                   = 4;
                }
            }
            return $layout_col;
        }
    }
    add_filter('loop_shop_columns', 'lottovibe_loop_columns');

    //Count number work with ajax
    function lottovibe_header_cart_count($fragments) {
        global $woocommerce;
    ob_start();?>
	<span class="icon-num"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	<?php
        $fragments['span.icon-num'] = ob_get_clean();
            return $fragments;
    }

        /**
     * Change number of related products output
     */ 
 
    add_filter( 'woocommerce_output_related_products_args', 'lottovibe_related_products_args', 20 );
        function lottovibe_related_products_args( $args ) {
        $args['posts_per_page'] = 3; // 4 related products
        $args['columns'] = 3; // arranged in 2 columns
        return $args;
    }
    function after_shop_loop_item_title() {
        return false;
    }

        /*All hoocks for woocommerce*
        -------------------------------------------*/

        /* Header cart count number */
        add_filter('woocommerce_add_to_cart_fragments', 'lottovibe_header_cart_count');

        /* Breadcrumb */
        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

        /* Shop loop */
        remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
        remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
        remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
        add_filter('woocommerce_show_page_title', 'lottovibe_wc_hide_page_title');
        add_action('woocommerce_before_shop_loop_item_title', 'lottovibe_wc_shop_thumb_area', 11);
        
        /**
         * Remove "Description" Heading Title @ WooCommerce Single Product Tabs
         */
        add_filter( 'woocommerce_product_description_heading', '__return_null' );

        function lottovibe_get_all_products_id_name() {
            $args = array(
                'posts_per_page' => -1,
                'post_type'      => array('product', 'product_variation'),
            );
            $products   = [];
            $Q_products = new WP_Query($args);
            $QP_product = $Q_products->posts;
            if (is_array($QP_product)) {
                foreach ($QP_product as $prod) {
                    $products[$prod->ID] = get_the_title($prod->ID);
                }
            }
            return $products;
        }

        // Woocommerce single page

        // Right column
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
        add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 4);
        add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 10);

        // To change add to cart text on single product page
        function woocommerce_custom_single_add_to_cart_text() {
            return __('<i class="rt-basket-shopping"></i> Add to Cart', 'lottovibe');
        }

        // To change add to cart text on product archives(Collection) page
        function woocommerce_custom_product_add_to_cart_text() {
            return __('Buy Now', 'lottovibe');
        }

        add_filter('woocommerce_checkout_fields', 'lottovibe_override_checkout_fields');
        function lottovibe_override_checkout_fields($fields) {
            $fields['shipping']['shipping_first_name']['placeholder'] = esc_html__('First Name', 'lottovibe');
            $fields['shipping']['shipping_last_name']['placeholder']  = esc_html__('Last Name', 'lottovibe');
            $fields['billing']['billing_first_name']['placeholder']   = esc_html__('First Name', 'lottovibe');
            $fields['billing']['billing_last_name']['placeholder']    = esc_html__('Last Name', 'lottovibe');
            $fields['billing']['billing_company']['placeholder']      = esc_html__('Business Name', 'lottovibe');
            $fields['billing']['billing_company']['label']            = esc_html__('Business Name', 'lottovibe');
            $fields['shipping']['shipping_company']['placeholder']    = esc_html__('Company Name', 'lottovibe');
            $fields['billing']['billing_email']['placeholder']        = esc_html__('Email Address', 'lottovibe');
            $fields['billing']['billing_phone']['placeholder']        = esc_html__('Phone', 'lottovibe');
            $fields['billing']['billing_state']['placeholder']        = esc_html__('State', 'lottovibe');
            $fields['billing']['billing_city']['placeholder']         = esc_html__('City', 'lottovibe');
            $fields['billing']['billing_postcode']['placeholder']     = esc_html__('Post Code', 'lottovibe');
            return $fields;
        }
        if (!function_exists('woocommerce_template_single_rating')) {
            /**
             * Output the product rating.
             */
            function woocommerce_template_single_rating() {
                if (post_type_supports('product', 'comments')) {
                    wc_get_template('single-product/rating.php');
                }
            }
        }
        add_filter('woocommerce_sale_flash', 'lottovibe_add_percentage_to_sale_badge', 20, 3);
        function lottovibe_add_percentage_to_sale_badge($html, $post, $product) {
            if ($product->is_type('variable')) {
                $percentages = array();
                // Get all variation prices
                $prices = $product->get_variation_prices();
                // Loop through variation prices
                foreach ($prices['price'] as $key => $price) {
                    // Only on sale variations
                    if ($prices['regular_price'][$key] !== $price) {
                        // Calculate and set in the array the percentage for each variation on sale
                        $percentages[] = round(100 - (floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100));
                    }
                }
                // We keep the highest value
                $percentage = max($percentages) . '%';
            } elseif ($product->is_type('grouped')) {
                $percentages = array();
                // Get all variation prices
                $children_ids = $product->get_children();
                // Loop through variation prices
                foreach ($children_ids as $child_id) {
                    $child_product = wc_get_product($child_id);
                    $regular_price = (float) $child_product->get_regular_price();
                    $sale_price    = (float) $child_product->get_sale_price();
                    if ($sale_price != 0 || !empty($sale_price)) {
                        // Calculate and set in the array the percentage for each child on sale
                        $percentages[] = round(100 - ($sale_price / $regular_price * 100));
                    }
                }
                // We keep the highest value
                $percentage = max($percentages) . '%';
            } else {
                $regular_price = (float) $product->get_regular_price();
                $sale_price    = (float) $product->get_sale_price();
                if ($sale_price != 0 || !empty($sale_price)) {
                    $percentage = round(100 - ($sale_price / $regular_price * 100)) . '%';
                } else {
                    return $html;
                }
            }
            global $lottovibe_option;
            $gallery_option = ' sale-';
            if (isset($_GET['product-layout'])) {
                if ($_GET['product-layout'] == 'two') {
                    $gallery_option .= 'left-thumb';
                } elseif ($_GET['product-layout'] == 'three') {
                    $gallery_option .= 'right-thumb';
                }
            } else {
                $gallery_option .= (!empty($lottovibe_option['single-gallery-layout'])) ? $lottovibe_option['single-gallery-layout'] : 'default-thumb';
            }

            return '<span class="onsale sale-rs' . $gallery_option . '">' . esc_html__('-', 'lottovibe') . $percentage . '</span>';
        }

        function lottovibe_star_rating($args = array()) {
            $defaults = array(
                'rating' => 0,
                'type'   => 'rating',
                'number' => 0,
                'echo'   => true,
            );
            $parsed_args = wp_parse_args($args, $defaults);

            // Non-English decimal places when the $rating is coming from a string.
            $rating = (float) str_replace(',', '.', $parsed_args['rating']);

            // Convert percentage to star rating, 0..5 in .5 increments.
            if ('percent' === $parsed_args['type']) {
                $rating = round($rating / 10, 0) / 2;
            }

            // Calculate the number of each type of star needed.
            $full_stars  = floor($rating);
            $half_stars  = ceil($rating - $full_stars);
            $empty_stars = 5 - $full_stars - $half_stars;

            if ($parsed_args['number']) {
                /* translators: 1: The rating, 2: The number of ratings. */
                $format = _n('%1$s rating based on %2$s rating', '%1$s rating based on %2$s ratings', 'lottovibe');
                $title  = sprintf($format, number_format_i18n($rating, 1), number_format_i18n($parsed_args['number']));
            } else {
                /* translators: %s: The rating. */
                $title = sprintf(__('%s rating', 'lottovibe'), number_format_i18n($rating, 1));
            }

            $output = '<div class="star-rating">';
            $output .= str_repeat('<i class="star star-full rt-star" aria-hidden="true"></i>', $full_stars);
            $output .= str_repeat('<i class="star star-half rt-star-half-stroke-solid" aria-hidden="true"></i>', $half_stars);
            $output .= str_repeat('<i class="star star-empty rt-star-regular" aria-hidden="true"></i>', $empty_stars);
            $output .= '</div>';
            if ($parsed_args['echo']) {
                echo wp_kses_post($output);
            }
            return $output;
        }
       
        // Invert Sale and Original Price
        add_filter('woocommerce_format_sale_price', 'lottovibe_invert_formatted_sale_price', 10, 3);
        function lottovibe_invert_formatted_sale_price($price, $regular_price, $sale_price) {
        return '<ins>' . (is_numeric($sale_price) ? wc_price($sale_price) : $sale_price) . '</ins> <del>' . (is_numeric($regular_price) ? wc_price($regular_price) : $regular_price) . '</del>';
    }

    add_action('woocommerce_product_meta_end', 'lottovibe_single_menu_ingredient',  10);
    function lottovibe_single_menu_ingredient(){
        global $product; 
        $id = $product->get_id(); 
        $ing_label = get_post_meta( get_the_ID(), 'product_ingredient_label', true ); 
    ?>

        <div class="product_ingredient_area">
            <?php if( $ing_label ) : ?>
                <div class="pro_ingre_title">
                    <h4>                    
                        <?php echo esc_html($ing_label); ?>
                    </h4>
                </div>
            <?php endif;  ?>            
           <div class="pro_ingre_features">
                <ul>
                    <?php 
                        $ingreadient_fea = get_post_meta( get_the_ID(), "product-ingredient", true );
                        if(!empty($ingreadient_fea)) : 
                        foreach( $ingreadient_fea as $ing_sing_feature ) { ?>
                            <li><span><?php echo esc_html($ing_sing_feature["ingredient_feature"]); ?></span></li>
                        <?php 
                        } 
                    endif;
                    ?>                   
                </ul>
            </div>
        </div>

    <?php }

   

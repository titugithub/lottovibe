<?php
/*
Dynamic CSS file. Please don't edit it. It updates automatically when settings change.
*/

// Hook the function to wp_head to output dynamic CSS
add_action('wp_head', 'lottovibe_dynamic_colors', 160);

function lottovibe_dynamic_colors()
{
    global $lottovibe_option;

    // Helper function to retrieve and sanitize typography properties
    function get_typography($option, $defaults = [])
    {
        return [
            'color' => !empty($option['color']) ? esc_attr($option['color']) : $defaults['color'] ?? '',
            'font-family' => !empty($option['font-family']) ? esc_attr($option['font-family']) : $defaults['font-family'] ?? '',
            'font-weight' => !empty($option['font-weight']) ? esc_attr($option['font-weight']) : $defaults['font-weight'] ?? '',
            'font-size' => !empty($option['font-size']) ? esc_attr($option['font-size']) : $defaults['font-size'] ?? '',
            'line-height' => !empty($option['line-height']) ? esc_attr($option['line-height']) : $defaults['line-height'] ?? '',
        ];
    }

    // Retrieve color values from Redux options with default fallbacks
    $body_bg_color   = !empty($lottovibe_option['body_bg_color']) ? esc_attr($lottovibe_option['body_bg_color']) : '#ffffff'; // White as fallback
    $body_text_color = !empty($lottovibe_option['body_text_color']) ? esc_attr($lottovibe_option['body_text_color']) : '#000000'; // Black as fallback
    $primary_color   = !empty($lottovibe_option['primary_color']) ? esc_attr($lottovibe_option['primary_color']) : 'rgba(174, 254, 58, 1)'; // Default primary color in rgba
    $secondary_color = !empty($lottovibe_option['secondary_color']) ? esc_attr($lottovibe_option['secondary_color']) : 'rgba(85, 74, 255, 1)'; // Default secondary color in rgba

    // Typography settings for each heading (H1 to H6)
    $headings = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
    $typography_settings = [];

    foreach ($headings as $heading) {
        $typography_settings[$heading] = get_typography(
            $lottovibe_option["opt-typography-{$heading}"] ?? [],
            ['color' => '', 'font-family' => '', 'font-weight' => '', 'font-size' => '', 'line-height' => '']
        );
    }

    // Output the dynamic CSS using a buffer
    ?>
    <style>
        :root {
            --body-bg-color: <?php echo esc_attr($body_bg_color); ?>;
            --body-text-color: <?php echo esc_attr($body_text_color); ?>;
            --primary-color: <?php echo esc_attr($primary_color); ?>;
            --secondary-color: <?php echo esc_attr($secondary_color); ?>;
        }

        body {
            background-color: var(--body-bg-color);
            color: var(--body-text-color);
        }

        <?php foreach ($typography_settings as $heading => $props) : ?>
            <?php echo esc_attr($heading); ?> {
                <?php if ($props['color']) { ?>color: <?php echo sanitize_hex_color($props['color']); ?>;<?php } ?>
                <?php if ($props['font-family']) { ?>font-family: <?php echo esc_attr($props['font-family']); ?>;<?php } ?>
                <?php if ($props['font-size']) { ?>font-size: <?php echo esc_attr($props['font-size']); ?>;<?php } ?>
                <?php if ($props['font-weight']) { ?>font-weight: <?php echo esc_attr($props['font-weight']); ?>;<?php } ?>
                <?php if ($props['line-height']) { ?>line-height: <?php echo esc_attr($props['line-height']); ?>;<?php } ?>
            }
        <?php endforeach; ?>
    </style>
    <?php
}
?>

















<?php



add_action('wp_head', 'lottovibe_custom_colors', 160);
function lottovibe_custom_colors()
{
	global $lottovibe_option;
	/***styling options
------------------*/




	if (!empty($lottovibe_option['body_bg_color'])) {
		$body_bg          = $lottovibe_option['body_bg_color'];
	}

	$site_color       = !empty($lottovibe_option['primary_color']) ? $lottovibe_option['primary_color'] : '';
	$secondary_color  = !empty($lottovibe_option['secondary_color']) ? $lottovibe_option['secondary_color'] : '';


	$link_color       = !empty($lottovibe_option['link_text_color']) ? $lottovibe_option['link_text_color'] : '';
	$link_hover_color = !empty($lottovibe_option['link_hover_text_color']) ? $lottovibe_option['link_hover_text_color'] : '';

	//typography extract for body

	$body_typography_font      = !empty($lottovibe_option['opt-typography-body']['font-family']) ? $lottovibe_option['opt-typography-body']['font-family'] : '';
	$body_typography_font_size = !empty($lottovibe_option['opt-typography-body']['font-size']) ? $lottovibe_option['opt-typography-body']['font-size'] : '';

	//typography extract for menu
	$menu_typography_color       = !empty($lottovibe_option['opt-typography-menu']['color']) ? $lottovibe_option['opt-typography-menu']['color'] : '';
	$menu_typography_weight      = !empty($lottovibe_option['opt-typography-menu']['font-weight']) ? $lottovibe_option['opt-typography-menu']['font-weight'] : '';
	$menu_typography_font_family = !empty($lottovibe_option['opt-typography-menu']['font-family']) ? $lottovibe_option['opt-typography-menu']['font-family'] : '';
	$menu_typography_font_fsize  = !empty($lottovibe_option['opt-typography-menu']['font-size']) ? $lottovibe_option['opt-typography-menu']['font-size'] : '';

	//typography extract for heading

	$h1_typography_color = !empty($lottovibe_option['opt-typography-h1']['color']) ? $lottovibe_option['opt-typography-h1']['color'] : '';
	if (!empty($lottovibe_option['opt-typography-h1']['font-weight'])) {
		$h1_typography_weight = $lottovibe_option['opt-typography-h1']['font-weight'];
	}

	$h1_typography_font_family = !empty($lottovibe_option['opt-typography-h1']['font-family']) ? $lottovibe_option['opt-typography-h1']['font-family'] : '';
	$h1_typography_font_fsize = !empty($lottovibe_option['opt-typography-h1']['font-size']) ? $lottovibe_option['opt-typography-h1']['font-size'] : '';

	if (!empty($lottovibe_option['opt-typography-h1']['line-height'])) {
		$h1_typography_line_height = $lottovibe_option['opt-typography-h1']['line-height'];
	}

	$h2_typography_color = !empty($lottovibe_option['opt-typography-h2']['color']) ? $lottovibe_option['opt-typography-h2']['color'] : '';

	$h2_typography_font_fsize = !empty($lottovibe_option['opt-typography-h2']['font-size']) ? $lottovibe_option['opt-typography-h2']['font-size'] : '';
	if (!empty($lottovibe_option['opt-typography-h2']['font-weight'])) {
		$h2_typography_font_weight = $lottovibe_option['opt-typography-h2']['font-weight'];
	}

	$h2_typography_font_family = !empty($lottovibe_option['opt-typography-h2']['font-family']) ? $lottovibe_option['opt-typography-h2']['font-family'] : '';

	$h2_typography_font_fsize = !empty($lottovibe_option['opt-typography-h2']['font-size']) ? $lottovibe_option['opt-typography-h2']['font-size'] : '';

	if (!empty($lottovibe_option['opt-typography-h2']['line-height'])) {
		$h2_typography_line_height = $lottovibe_option['opt-typography-h2']['line-height'];
	}

	$h3_typography_color = !empty($lottovibe_option['opt-typography-h3']['color']) ? $lottovibe_option['opt-typography-h3']['color'] : '';

	if (!empty($lottovibe_option['opt-typography-h3']['font-weight'])) {
		$h3_typography_font_weightt = $lottovibe_option['opt-typography-h3']['font-weight'];
	}

	$h3_typography_font_family = !empty($lottovibe_option['opt-typography-h3']['font-family']) ? $lottovibe_option['opt-typography-h3']['font-family'] : '';

	$h3_typography_font_fsize  = !empty($lottovibe_option['opt-typography-h3']['font-size']) ? $lottovibe_option['opt-typography-h3']['font-size'] : '';

	if (!empty($lottovibe_option['opt-typography-h3']['line-height'])) {
		$h3_typography_line_height = $lottovibe_option['opt-typography-h3']['line-height'];
	}

	$h4_typography_color = !empty($lottovibe_option['opt-typography-h4']['color']) ? $lottovibe_option['opt-typography-h4']['color'] : '';

	if (!empty($lottovibe_option['opt-typography-h4']['font-weight'])) {
		$h4_typography_font_weight = $lottovibe_option['opt-typography-h4']['font-weight'];
	}

	$h4_typography_font_family = !empty($lottovibe_option['opt-typography-h4']['font-family']) ? $lottovibe_option['opt-typography-h4']['font-family'] : '';

	$h4_typography_font_fsize  = !empty($lottovibe_option['opt-typography-h4']['font-size']) ? $lottovibe_option['opt-typography-h4']['font-size'] : '';

	if (!empty($lottovibe_option['opt-typography-h4']['line-height'])) {
		$h4_typography_line_height = $lottovibe_option['opt-typography-h4']['line-height'];
	}

	$h5_typography_color = !empty($lottovibe_option['opt-typography-h5']['color']) ? $lottovibe_option['opt-typography-h5']['color'] : '';

	if (!empty($lottovibe_option['opt-typography-h5']['font-weight'])) {
		$h5_typography_font_weight = $lottovibe_option['opt-typography-h5']['font-weight'];
	}

	$h5_typography_font_family = !empty($lottovibe_option['opt-typography-h5']['font-family']) ? $lottovibe_option['opt-typography-h5']['font-family'] : '';

	$h5_typography_font_fsize  = !empty($lottovibe_option['opt-typography-h5']['font-size']) ? $lottovibe_option['opt-typography-h5']['font-size'] : '';

	if (!empty($lottovibe_option['opt-typography-h5']['line-height'])) {
		$h5_typography_line_height = $lottovibe_option['opt-typography-h5']['line-height'];
	}

	$h6_typography_color = !empty($lottovibe_option['opt-typography-6']['color']) ? $lottovibe_option['opt-typography-6']['color'] : '';

	if (!empty($lottovibe_option['opt-typography-6']['font-weight'])) {
		$h6_typography_font_weight = $lottovibe_option['opt-typography-6']['font-weight'];
	}

	$h6_typography_font_family = !empty($lottovibe_option['opt-typography-6']['font-family']) ? $lottovibe_option['opt-typography-6']['font-family'] : '';

	$h6_typography_font_fsize  = !empty($lottovibe_option['opt-typography-6']['font-size']) ? $lottovibe_option['opt-typography-6']['font-size'] : '';

	if (!empty($lottovibe_option['opt-typography-6']['line-height'])) {
		$h6_typography_line_height = $lottovibe_option['opt-typography-6']['line-height'];
	}


	$body_color  = !empty($lottovibe_option['body_text_color']) ? $lottovibe_option['body_text_color'] : '';	?>

	<!-- Typography -->
	<?php if (!empty($body_color)) {

			global $lottovibe_option;
			?>
		<style>
			body {
				background: <?php echo sanitize_hex_color($body_bg); ?>;
				color: <?php echo sanitize_hex_color($body_color); ?> !important;
				<?php if (!empty($body_typography_font)) { ?>font-family: <?php echo esc_attr($body_typography_font); ?> !important;
				<?php } ?>font-size: <?php echo esc_attr($body_typography_font_size); ?> !important;
			}


			h1 {
				<?php if (!empty($h1_typography_color)) { ?>color: <?php echo sanitize_hex_color($h1_typography_color); ?>;
				<?php
						} ?><?php if (!empty($h1_typography_font_family)) { ?>font-family: <?php echo esc_attr($h1_typography_font_family); ?>;
				<?php } ?>font-size: <?php echo esc_attr($h1_typography_font_fsize); ?>;
				<?php if (!empty($h1_typography_weight)) {
							?>font-weight: <?php echo esc_attr($h1_typography_weight); ?>;
				<?php } ?><?php if (!empty($h1_typography_line_height)) {
										?>line-height: <?php echo esc_attr($h1_typography_line_height); ?>;
				<?php } ?>
			}

			h2 {
				color: <?php echo sanitize_hex_color($h2_typography_color); ?>;
				<?php if (!empty($h2_typography_font_family)) { ?>font-family: <?php echo esc_attr($h2_typography_font_family); ?> !important;
				<?php } ?>font-size: <?php echo esc_attr($h2_typography_font_fsize); ?>;
				<?php if (!empty($h2_typography_font_weight)) {
							?>font-weight: <?php echo esc_attr($h2_typography_font_weight); ?>;
				<?php } ?><?php if (!empty($h2_typography_line_height)) {
										?>line-height: <?php echo esc_attr($h2_typography_line_height); ?> <?php } ?>
			}

			h3 {
				color: <?php echo sanitize_hex_color($h3_typography_color); ?>;
				<?php if (!empty($h3_typography_font_family)) { ?>font-family: <?php echo esc_attr($h3_typography_font_family); ?> !important;
				<?php } ?>font-size: <?php echo esc_attr($h3_typography_font_fsize); ?>;
				<?php if (!empty($h3_typography_font_weight)) {
							?>font-weight: <?php echo esc_attr($h3_typography_font_weight); ?>;
				<?php } ?><?php if (!empty($h3_typography_line_height)) {
										?>line-height: <?php echo esc_attr($h3_typography_line_height); ?>;
				<?php } ?>
			}

			h4 {
				color: <?php echo sanitize_hex_color($h4_typography_color); ?>;
				<?php if (!empty($h4_typography_font_family)) { ?>font-family: <?php echo esc_attr($h4_typography_font_family); ?> !important;
				<?php } ?>font-size: <?php echo esc_attr($h4_typography_font_fsize); ?>;
				<?php if (!empty($h4_typography_font_weight)) {
							?>font-weight: <?php echo esc_attr($h4_typography_font_weight); ?>;
				<?php } ?><?php if (!empty($h4_typography_line_height)) {
										?>line-height: <?php echo esc_attr($h4_typography_line_height); ?>;
				<?php } ?>
			}

			h5 {
				color: <?php echo sanitize_hex_color($h5_typography_color); ?>;
				<?php if (!empty($h5_typography_font_family)) { ?>font-family: <?php echo esc_attr($h5_typography_font_family); ?> !important;
				<?php } ?>font-size: <?php echo esc_attr($h5_typography_font_fsize); ?>;
				<?php if (!empty($h5_typography_font_weight)) {
							?>font-weight: <?php echo esc_attr($h5_typography_font_weight); ?>;
				<?php } ?><?php if (!empty($h5_typography_line_height)) {
										?>line-height: <?php echo esc_attr($h5_typography_line_height); ?>;
				<?php } ?>
			}

			h6 {
				color: <?php echo sanitize_hex_color($h6_typography_color); ?>;
				<?php if (!empty($h6_typography_font_family)) { ?>font-family: <?php echo esc_attr($h6_typography_font_family); ?> !important;
				<?php } ?>font-size: <?php echo esc_attr($h6_typography_font_fsize); ?>;
				<?php if (!empty($h6_typography_font_weight)) {
							?>font-weight: <?php echo esc_attr($h6_typography_font_weight); ?>;
				<?php } ?><?php if (!empty($h6_typography_line_height)) {
										?>line-height: <?php echo esc_attr($h6_typography_line_height); ?>;
				<?php } ?>
			}

			.menu-area .navbar ul li>a,
			.sidenav .widget_nav_menu ul li a {
				<?php if (!empty($menu_typography_weight)) { ?>font-weight: <?php echo esc_attr($menu_typography_weight); ?>;
				<?php } ?><?php if (!empty($menu_typography_font_family)) { ?>font-family: <?php echo esc_attr($menu_typography_font_family); ?>;
				<?php } ?>font-size: <?php echo esc_attr($menu_typography_font_fsize); ?>;
			}


			:root {
				--p1: <?php echo sanitize_hex_color($site_color); ?> !important;
				--s1: <?php echo sanitize_hex_color($secondary_color); ?> !important;
				--color-body: <?php echo sanitize_hex_color($body_color); ?> !important;
				;
			}




			<?php if (!empty($lottovibe_option['breadcrumb_top_gap']) && !empty($lottovibe_option['breadcrumb_bottom_gap'])) : ?>.svtheme-breadcrumbs .breadcrumbs-inner,
			#svtheme-header.header-style-3 .svtheme-breadcrumbs .breadcrumbs-inner {
				padding-top: <?php echo esc_attr($lottovibe_option['breadcrumb_top_gap']); ?>;
				padding-bottom: <?php echo esc_attr($lottovibe_option['breadcrumb_bottom_gap']); ?>;
			}

			<?php endif; ?><?php if (!empty($lottovibe_option['mobile_breadcrumb_top_gap']) && !empty($lottovibe_option['mobile_breadcrumb_bottom_gap'])) : ?>@media only screen and (max-width: 767px) {

				.svtheme-breadcrumbs .breadcrumbs-inner,
				#svtheme-header.header-style-3 .svtheme-breadcrumbs .breadcrumbs-inner {
					padding-top: <?php echo esc_attr($lottovibe_option['mobile_breadcrumb_top_gap']); ?>;
					padding-bottom: <?php echo esc_attr($lottovibe_option['mobile_breadcrumb_bottom_gap']); ?>;
				}
			}

			<?php endif; ?>.rt-primary-colors .elementor-widget-container .elementor-social-icon:hover,
			.rt-primary-colors .elementor-widget-container .elementor-social-icon:hover,
			.elementor-10584 .elementor-element.elementor-element-e1de190 .abouttabarea ul li button:hover,
			.elementor-10584 .elementor-element.elementor-element-e1de190 .about__button__wrap li button.active,
			.menu-cart-area span.icon-num,
			.rt-primary-color,
			.portfolio-filter button:hover,
			.portfolio-filter button.active {
				background: <?php echo sanitize_hex_color($site_color); ?>;
			}

			.rt-primary-colors .service-single-s-main {
				background: <?php echo sanitize_hex_color($site_color); ?>;
			}

			.rt-primary-colors .elementor-widget-container .menu-area .navbar ul li:hover>a,
			.single-teams .adress-box i,
			.rt-primary-colors .elementor-icon-list-icon i,
			.single-teams .designation-info {
				color: <?php echo sanitize_hex_color($site_color); ?>;
			}

			.blog .svtheme-blog .blog-item .full-blog-content .user-info .single-info.cat a:hover,
			.archive .svtheme-blog .blog-item .full-blog-content .user-info .single-info.cat a:hover,
			.svtheme-blog .blog-meta .blog-title a:hover,
			a:hover,
			a:focus,
			a:active,
			.svtheme-blog .blog-meta .blog-title a:hover,
			.svtheme-blog .blog-item .blog-meta .categories a:hover,
			.sv-sideabr ul a:hover,
			.sv-sideabr .widget_categories ul li a:hover,
			.sv-sideabr .widget_archive ul li a:hover,
			.sv-sideabr .widget_pages ul li a:hover,
			.sv-sideabr .widget_meta ul li a:hover,
			.sv-sideabr .widget_recent_entries ul li a:hover,
			.sv-sideabr .widget_nav_menu ul li a:hover,
			.sv-sideabr .widget_block ul li a:hover,
			.blog .svtheme-blog .blog-item .full-blog-content .title-wrap .blog-title:hover a,
			.archive .svtheme-blog .blog-item .full-blog-content .title-wrap .blog-title:hover a {
				color: <?php echo sanitize_hex_color($link_hover_color); ?>;
			}


			<?php if (!empty($lottovibe_option['container_size'])) : ?>@media only screen and (min-width: 1300px) {
				.container {
					max-width: <?php echo esc_attr($lottovibe_option['container_size']); ?>;
				}
			}

			<?php endif; ?><?php if (!empty($lottovibe_option['preloader_bg_color'])) : ?>#lottovibe-load {
				background: <?php echo sanitize_hex_color($lottovibe_option['preloader_bg_color']); ?>;
			}

			<?php endif; ?><?php if (!empty($lottovibe_option['page_title_color'])) : ?>.svtheme-breadcrumbs .page-title {
				color: <?php echo sanitize_hex_color($lottovibe_option['page_title_color']); ?> !important;
			}

			<?php endif; ?><?php if (!empty($lottovibe_option['body_bg_color'])) : ?>body.archive.tax-product_cat {
				background: <?php echo sanitize_hex_color($lottovibe_option['body_bg_color']); ?> !important;
			}

			<?php endif; ?>
		</style>

		<?php
			}

			if (is_home() && !is_front_page() || is_home() && is_front_page()) {
				$padding_top        = get_post_meta(get_queried_object_id(), 'content_top', true);
				$padding_bottom     = get_post_meta(get_queried_object_id(), 'content_bottom', true);
				$footer_padd_top    = get_post_meta(get_queried_object_id(), 'footer_padd_top', true);
				$footer_padd_bottom = get_post_meta(get_queried_object_id(), 'footer_padd_bottom', true);
				if ($padding_top != '' || $padding_bottom != '') {
					?>
			<style>
				.main-contain #content,
				body.svtheme-pages-btm-gap .main-contain #content {
					<?php if (!empty($padding_top)) : ?>padding-top: <?php echo esc_attr($padding_top);
																				endif; ?>;
					<?php if (!empty($padding_bottom)) : ?>padding-bottom: <?php echo esc_attr($padding_bottom);
																						endif; ?>;
				}
			</style>
		<?php
				}
				if ($footer_padd_top != '' || $footer_padd_bottom != '') {
					?>
			<style>
				.svtheme-footer .footer-top {
					<?php if (!empty($footer_padd_top)) : ?>padding-top: <?php echo esc_attr($footer_padd_top);
																					endif; ?>;
					<?php if (!empty($footer_padd_bottom)) : ?>padding-bottom: <?php echo esc_attr($footer_padd_bottom);
																							endif; ?>;
				}
			</style>
		<?php
				}
			} else {
				$padding_top        = get_post_meta(get_the_ID(), 'content_top', true);
				$padding_bottom     = get_post_meta(get_the_ID(), 'content_bottom', true);
				$footer_padd_top    = get_post_meta(get_the_ID(), 'footer_padd_top', true);
				$footer_padd_bottom = get_post_meta(get_the_ID(), 'footer_padd_bottom', true);
				if ($padding_top != '' || $padding_bottom != '') {
					?>
			<style>
				.main-contain #content,
				body.svtheme-pages-btm-gap .main-contain #content {
					<?php if (!empty($padding_top)) : ?>padding-top: <?php echo esc_attr($padding_top);
																				endif; ?>;
					<?php if (!empty($padding_bottom)) : ?>padding-bottom: <?php echo esc_attr($padding_bottom);
																						endif; ?>;
				}
			</style>
		<?php
				}

				if ($footer_padd_top != '' || $footer_padd_bottom != '') {
					?>
			<style>
				.svtheme-footer .footer-top {
					<?php if (!empty($footer_padd_top)) : ?>padding-top: <?php echo esc_attr($footer_padd_top);
																					endif; ?> !important;
					<?php if (!empty($footer_padd_bottom)) : ?>padding-bottom: <?php echo esc_attr($footer_padd_bottom);
																							endif; ?> !important;
				}
			</style>
		<?php
				}
			}

			if (!class_exists('ReduxFrameworkPlugin')) {  ?>

		<style>
			@media only screen and (max-width: 1024px) {
				.sidebarmenu-area.primary-menu.mobilehum {
					display: block !important;
				}
			}
		</style>
<?php }
}

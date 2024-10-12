<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
?>
<li <?php wc_product_class('', $product); ?>>

	<section class="current-lottery current-lotteryv9 lottery-product">
		<div class="current-lottery-itemv9 cmn-cartborder position-relative radius24 n0-bg ttt">
			<div class="thumb cus-z1 position-relative">
				<div class="current-l-badge cus-z1 d-flex align-items-center justify-content-between pt-xxl-5 pt-4 pe-xxl-5 pe-4">
					<a href="<?php echo site_url(); ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo get_the_ID(); ?>">
						<span class="cmn-40 n0-bg radius-circle n0-hover">
							<i class="ph ph-bold ph-shopping-cart n4-clr fs-six"></i>
						</span>
					</a>
				</div>
				<div class="thumb-in">
					<img src="<?php the_post_thumbnail_url(); ?>" alt="img">
				</div>
				<div class="current-hoberv9 d-center">
					<a href="<?php the_permalink(); ?>" class="kewta-btn kewta-alt d-inline-flex align-items-center">
						<span class="kew-text w-100 text-capitalize fs-seven fw_500 n4-bg n0-clr">
							<?php echo esc_html__('Enter Competition', 'lottovibe'); ?>
						</span>
						<div class="kew-arrow n4-bg">
							<div class="kt-one">
								<i class="ti ti-arrow-right n0-clr"></i>
							</div>
							<div class="kt-two">
								<i class="ti ti-arrow-right n0-clr"></i>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="content-middle">
				<ul class="list-unstyled remaining-info px-xxl-6 px-xl-5 px-lg-4 px-3 pt-xxl-6 pt-4 d-flex align-items-center  gap-2 m-0 p-0">
					<li class="d-flex align-items-center gap-2">
						<i class="ph ph-clock fs-five n3-clr"></i>
						<?php
						// Get the current product ID
						$product_id = get_the_ID();

						// Get the start and end dates from meta
						$lty_start_date = get_post_meta($product_id, '_ltystart_date', true);
						$lty_end_date = get_post_meta($product_id, '_lty_end_date', true);

						// If the end date exists
						if ($lty_end_date) {
							// Get current date in the same format as the meta data
							$current_date = date('Y-m-d');  // Get the current date in Y-m-d format

							// Calculate the difference in seconds
							$date_diff = strtotime($lty_end_date) - strtotime($current_date);

							// Convert difference into days
							$remaining_days = round($date_diff / (60 * 60 * 24));

							// Ensure the number of days has two digits (e.g., 03 Days)
							if ($remaining_days > 0) {
								echo sprintf('%02d Days', $remaining_days);  // Add leading zero if necessary
							} else {
								echo "The lottery has ended.";
							}
						} else {
							echo "Lottery dates not set.";
						}
						?>


					</li>
					<li class="vline-remaing">

					</li>
					<li class="d-flex align-items-center gap-2">
						<i class="ph ph-barbell fs-five n3-clr"></i>
						<span class="n3-clr fw_600">
							<?php $lottery_remain = get_post_meta($product->get_id(), '_stock', true); ?>
							<?php echo wc_price($lottery_remain) . ' ' . esc_html__('Remaining', 'lottovibe'); ?>
						</span>
					</li>
				</ul>
				<div class="d-flex px-xxl-6 px-xl-5 px-lg-4 px-3 pt-xxl-5 pt-sm-4 pt-4 pb-xxl-3 pb-sm-3 pb-2 flex-wrap gap-3 align-items-center justify-content-between">
					<h4>
						<a href="<?php the_permalink(); ?>" class="n4-clr fw_700">
							<?php the_title(); ?>
						</a>
					</h4>
				</div>
				<div class="d-flex px-xxl-6 px-xl-5 px-lg-4 px-3 align-items-center justify-content-between pb-xxl-6 pb-4">
					<h3 class="d-flex align-items-center gap-3 n4-clr">
						<?php $lottery_price = get_post_meta($product->get_id(), '_price', true); ?>
						<span class="pr fw_700"><?php echo wc_price($lottery_price); ?></span> <span class="fs-six text-uppercase"><?php echo esc_html__('PER ENTRY', 'lottovibe'); ?></span>
					</h3>

				</div>
				<div class="border-top"></div>
				<div class="cmn-prrice-range px-xxl-6 px-xl-5 px-lg-4 px-3 d-grid align-items-center gap-2 py-xxl-6 py-4">
					<?php
					$total_tickets = get_post_meta($product->get_id(), '_lty_maximum_tickets', true);
					$sold_tickets = get_post_meta($product->get_id(), 'total_sales', true);

					if ($total_tickets > 0) {
						$percentage_sold = round(($sold_tickets / $total_tickets) * 100);
					} else {
						$percentage_sold = 0;
					}
					?>
					<span class="n4-clr soldout fw_700 fs-eight">
						<?php echo esc_html($percentage_sold); ?>% Sold
					</span>
					<div class="range-custom position-relative">
						<span class="curs-range"></span>
					</div>
					<div class="d-flex align-items-center gap-xl-1 gap-1 mt-3">
						<?php
						$average_rating = $product->get_average_rating();
						$review_count = $product->get_review_count();
						if ($review_count > 0) : ?>
							<ul class="ratting d-flex align-items-center gap-1 list-unstyled m-0">
								<?php
								$full_stars = floor($average_rating);
								$half_star = ($average_rating - $full_stars) >= 0.5;
								for ($i = 1; $i <= 5; $i++) :
									if ($i <= $full_stars) : ?>
										<li><i class="ph-fill ph-star fs-five act4-clr"></i></li>
									<?php elseif ($i == $full_stars + 1 && $half_star) : ?>
										<li><i class="ph-fill ph-star-half fs-five act4-clr"></i></li>
									<?php else : ?>
										<li><i class="ph ph-star fs-five act4-clr"></i></li>
									<?php endif;
								endfor; ?>
							</ul>
							<span class="n3-clr fw_600 d-flex align-items-center gap-1">
								<span class="n4-clr fw_600 fs20">
									<?php echo number_format($average_rating, 1); ?>
								</span>
								(<?php echo esc_html($review_count); ?> <?php echo _n('review', 'reviews', $review_count, 'lottovibe'); ?>)
							</span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>


</li>
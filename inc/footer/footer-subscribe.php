<?php 
global $lottovite_option; 
require get_parent_theme_file_path('inc/footer/footer-options.php');
if($hide_footer_subscribe != 'yes'){
if(!empty($lottovite_option['call_tilte']) || !empty($lottovite_option['call_des'])){?>


<?php 
    $call_to_bg_show = !empty( $lottovite_option['call_to_bg']['url']) ? 'style="background:url('.$lottovite_option['call_to_bg']['url'].')"' : '';
    $icon_width        = !empty($lottovite_option['icons_to_d_size']) ? 'style = "max-width: '.$lottovite_option['icons_to_d_size'].'"' : '';

    $news_title_icon   =  get_post_meta(get_queried_object_id(), 'newsletter_title_icon_img', true);
?>


<?php if(is_active_sidebar('footer_top')) { ?>
    <div class="reactheme-newsletter reactheme-newsletters">
        <div class="container">
                <?php if(!empty( $newsletter_bg_img)): ?>
                <div class="newsletter-wrap" style="background-image: url('<?php echo esc_url($newsletter_bg_img); ?>');">
                <?php else:?> 
                <div class="newsletter-wrap" <?php echo wp_kses( $call_to_bg_show, 'lottovite');?>> 
                <?php endif; ?>
                <div class="row y-middle">
                    <div class="col-lg-6">
                        <div class="sec-title">                           

                            <?php if(!empty($lottovite_option['call_tilte'])){?>
                            <div class="title-icon">  
                                <?php if($news_title_icon !=''){ ?>                              
                                
                                <img <?php echo wp_kses($icon_width, 'lottovite');?> src="<?php echo esc_url($news_title_icon); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                
                                <?php } else { 
                                    if (!empty( $lottovite_option['icons_to_d']['url'] ) ) { ?>
                                    <img <?php echo wp_kses($icon_width, 'lottovite');?> src="<?php echo esc_url( $lottovite_option['icons_to_d']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                <?php } } ?>

                                <h2 class="title" style="color:<?php echo wp_kses($lottovite_option['call_tilte_color'], 'lottovite'); ?>"><?php echo wp_kses($lottovite_option['call_tilte'], 'lottovite'); ?></h2>
                            </div>
                            <?php } ?>

                            <?php if(!empty($lottovite_option['call_des'])){?>
                            <div class="sub-title" style="color:<?php echo wp_kses($lottovite_option['call_des_color'], 'lottovite'); ?>"><?php echo wp_kses($lottovite_option['call_des'],'lottovite'); ?></div>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <?php if ( is_active_sidebar( 'footer_top' )):
                            dynamic_sidebar( 'footer_top' );
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }}} ?>
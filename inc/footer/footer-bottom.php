<?php
    global $lottovibe_option;    


?>
<div class="footer-bottom" <?php if(!empty( $copyright_bg)): ?> style="background: <?php echo esc_attr($copyright_bg); ?> !important;" <?php elseif(!empty( $copy_trans)): ?> style="background: <?php echo esc_attr($copy_trans); ?> !important;" <?php endif; ?>>
    <div class="<?php echo esc_attr($header_width);?>">
        <div class="copyright_border">
            
            <div class="copyright text-center" <?php if(!empty( $copy_space)): ?> style="padding: <?php echo esc_attr($copy_space); ?>" <?php endif; ?> >
                <?php if(!empty($lottovibe_option['copyright'])){?>
                <p><?php echo wp_kses($lottovibe_option['copyright'], 'lottovibe'); ?></p>
                <?php }
                 else{
                    ?>
                <p class="footer-bottom-text"><?php echo esc_html('Copyright &copy;')?> <?php echo date("Y");?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>. <?php echo esc_html('Designed By Pixelaxis')?>
                </p>
                <?php
                 }   
                ?>
            </div>
              
        </div>
    </div>
</div>



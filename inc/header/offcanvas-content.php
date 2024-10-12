<?php 

global $lottovibe_option;
if(!empty($lottovibe_option['facebook']) || !empty($lottovibe_option['twitter']) || !empty($lottovibe_option['rss']) || !empty($lottovibe_option['pinterest']) || !empty($lottovibe_option['google']) || !empty($lottovibe_option['instagram']) || !empty($lottovibe_option['vimeo']) || !empty($lottovibe_option['tumblr']) ||  !empty($lottovibe_option['youtube'])){
?>

    <ul class="offcanvas_social">  
        <?php
        if(!empty($lottovibe_option['facebook'])) { ?>
        <li> 
        <a href="<?php echo esc_url($lottovibe_option['facebook'])?>" target="_blank"><span><i class="fa fa-facebook"></i></span></a> 
        </li>
        <?php } ?>
        <?php if(!empty($lottovibe_option['twitter'])) { ?>
        <li> 
        <a href="<?php echo esc_url($lottovibe_option['twitter']);?> " target="_blank"><span><i class="fa fa-twitter"></i></span></a> 
        </li>
        <?php } ?>
        <?php if(!empty($lottovibe_option['rss'])) { ?>
        <li> 
        <a href="<?php  echo esc_url($lottovibe_option['rss']);?> " target="_blank"><span><i class="fa fa-rss"></i></span></a> 
        </li>
        <?php } ?>
        <?php if (!empty($lottovibe_option['pinterest'])) { ?>
        <li> 
        <a href="<?php  echo esc_url($lottovibe_option['pinterest']);?> " target="_blank"><span><i class="fa fa-pinterest-p"></i></span></a> 
        </li>
        <?php } ?>
        <?php if (!empty($lottovibe_option['linkedin'])) { ?>
        <li> 
        <a href="<?php  echo esc_url($lottovibe_option['linkedin']);?> " target="_blank"><span><i class="fa fa-linkedin"></i></span></a> 
        </li>
        <?php } ?>
        <?php if (!empty($lottovibe_option['google'])) { ?>
        <li> 
        <a href="<?php  echo esc_url($lottovibe_option['google']);?> " target="_blank"><span><i class="fa fa-google-plus-square"></i></span></a> 
        </li>
        <?php } ?>
        <?php if (!empty($lottovibe_option['instagram'])) { ?>
        <li> 
        <a href="<?php  echo esc_url($lottovibe_option['instagram']);?> " target="_blank"><span><i class="fa fa-instagram"></i></span></a> 
        </li>
        <?php } ?>
        <?php if(!empty($lottovibe_option['vimeo'])) { ?>
        <li> 
        <a href="<?php  echo esc_url($lottovibe_option['vimeo'])?> " target="_blank"><span><i class="fa fa-vimeo"></i></span></a> 
        </li>
        <?php } ?>
        <?php if (!empty($lottovibe_option['tumblr'])) { ?>
        <li> 
        <a href="<?php  echo esc_url($lottovibe_option['tumblr'])?> " target="_blank"><span><i class="fa fa-tumblr"></i></span></a> 
        </li>
        <?php } ?>
        <?php if (!empty($lottovibe_option['youtube'])) { ?>
        <li> 
        <a href="<?php  echo esc_url($lottovibe_option['youtube'])?> " target="_blank"><span><i class="fa fa-youtube"></i></span></a> 
        </li>
        <?php } ?>     
    </ul>
<?php }


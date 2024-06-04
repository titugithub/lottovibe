<?php
    global $lottovite_option;    
    $header_width_meta = get_post_meta(get_queried_object_id(), 'header_width_custom', true);
    if ($header_width_meta != ''){
        $header_width = ( $header_width_meta == 'full' ) ? 'container-fluid': 'container';
    }else{
        $header_width = !empty($lottovite_option['header-grid']) ? $lottovite_option['header-grid'] : '';
        $header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';
    }
?>

<?php 
    $post_menu_type = get_post_meta(get_queried_object_id(), 'menu-type', true); 
    $post_meta_data = get_post_meta(get_queried_object_id(), 'banner_image', true);
    $content_banner = get_post_meta(get_queried_object_id(), 'content_banner', true); 
    $intro_content_banner = get_post_meta(get_queried_object_id(), 'intro_content_banner', true); 
?>

<div class="reactheme-breadcrumbs  porfolio-details is-shop-hide rts-bread-crumb-area">
<?php if($post_meta_data !='') { ?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $post_meta_data );?>')">
        <div class="<?php echo esc_attr($header_width);?>">
            <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>"> 
                <div class="row">
            
                <div class="col-lg-8 col-md-7">              
                    <?php                       
                        
                        $post_meta_title = get_post_meta(get_queried_object_id(), 'select-title', true);?>
                        <?php if( $post_meta_title != 'hide' ){             
                        if( !empty( $intro_content_banner )): ?>
                            <span class="sub-title"><?php echo esc_html($intro_content_banner);?></span>
                        <?php endif; ?>
                        <h1 class="page-title">
                            <?php if($content_banner !=''){
                               echo esc_html($content_banner);
                                } else {                              
                                    
                                    if(!empty($lottovite_option['blog_title'])) { ?>
                                        <?php echo esc_html($lottovite_option['blog_title']);?>
                                        <?php }
                                        else{
                                         esc_html_e('Blog','lottovite');
                                    } 
                                }
                            ?>
                        </h1>
                        <?php } 
                    ?>    
                  </div>

                  <div class="col-lg-4 col-md-5 text-md-right">
                    <?php if(!empty($lottovite_option['off_breadcrumb'])){
                            $rs_breadcrumbs = get_post_meta(get_queried_object_id(), 'select-bread', true);
                            if( $rs_breadcrumbs != 'hide' ):        
                            if(function_exists('bcn_display')){?>
                                <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                            <?php } 
                            endif;
                        } ?>
                </div>
            </div>
          </div>
        </div>
    </div>
<?php }
    elseif(!empty($lottovite_option['blog_banner_main']['url'])) { ?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url($lottovite_option['blog_banner_main']['url']);?>')">
        <div class="<?php echo esc_attr($header_width);?>">
            <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>"> 
            <div class="row">                
                <div class="col-lg-12 col-md-12">  <?php                      
                        
                    $post_meta_title = get_post_meta(get_queried_object_id(), 'select-title', true);?>
                    <?php if( $post_meta_title != 'hide' ){    ?>            
                        <div class="wrapper">
                            <?php if(!empty($lottovite_option['blog_title'])) : ?>
                                <span class="bg-text-stok"><?php echo esc_html($lottovite_option['blog_title']);?></span>
                            <?php endif; ?>
                            <h1 class="page-title">               
                                <?php if(!empty($lottovite_option['blog_title'])) { ?>
                                    <?php echo esc_html($lottovite_option['blog_title']);?>
                                    <?php }
                                    else{
                                    esc_html_e('Blog','lottovite');
                                } ?>
                            </h1>
                        </div>
                    <?php } ?>    
                </div>  
                <div class="col-lg-12">
                    <?php if(!empty($lottovite_option['off_breadcrumb'])){
                        $rs_breadcrumbs = get_post_meta(get_queried_object_id(), 'select-bread', true);
                        if( $rs_breadcrumbs != 'hide' ):        
                        if(function_exists('bcn_display')){?>
                            <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                        <?php } 
                        endif;
                    } ?>
                </div>              
            </div>
        </div>
      </div>
    </div>
  <?php }
  
  elseif(!empty($lottovite_option['breadcrumb_bg_color'])) { ?>
    <div class="breadcrumbs-single" style="background:<?php echo esc_attr($lottovite_option['breadcrumb_bg_color']);?>">
      <div class="<?php echo esc_attr($header_width);?>">
        <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>"> 
        <div class="row">
          
            <div class="col-lg-12 col-md-12">            
                <?php                      
                      
                  $post_meta_title = get_post_meta(get_queried_object_id(), 'select-title', true);?>
                  <?php if( $post_meta_title != 'hide' ){             
               
                    if( !empty( $intro_content_banner )): ?>
                        <span class="sub-title"><?php echo esc_html($intro_content_banner);?></span>
                    <?php endif; ?>
                        <h1 class="page-title">
                            <?php if($content_banner !=''){
                             echo esc_html($content_banner);
                              } else {                              
                                  
                                  if(!empty($lottovite_option['blog_title'])) { ?>
                                      <?php echo esc_html($lottovite_option['blog_title']);?>
                                      <?php }
                                      else{
                                       esc_html_e('Blog','lottovite');
                                  } 
                              }
                            ?>
                        </h1>
                  <?php } 
                    ?>    
                </div>

                <div class="col-lg-12 col-md-12">
                  <?php if(!empty($lottovite_option['off_breadcrumb'])){
                          $rs_breadcrumbs = get_post_meta(get_queried_object_id(), 'select-bread', true);
                          if( $rs_breadcrumbs != 'hide' ):        
                          if(function_exists('bcn_display')){?>
                              <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                          <?php } 
                          endif;
                      } ?>
              </div>
          </div>
        </div>
      </div>
    </div>
  <?php }else {   
  ?>
  <div class="reactheme-breadcrumbs-inner">  
    <div class="<?php echo esc_attr($header_width);?>">
      <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
                <?php     
                    if(!empty($lottovite_option['off_breadcrumb'])){
                        $rs_breadcrumbs = get_post_meta(get_queried_object_id(), 'select-bread', true);
                        if( $rs_breadcrumbs != 'hide' ):        
                            if(function_exists('bcn_display')){?>
                                <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                            <?php } 
                        endif;
                    }
                    $post_meta_title = get_post_meta(get_queried_object_id(), 'select-title', true);?>
                        <?php if( $post_meta_title != 'hide' ){             
                    ?>
                    <h1 class="page-title">
                        <?php if($content_banner !=''){
                                echo esc_html($content_banner);
                            } else {                                
                                 
                            if(!empty($lottovite_option['blog_title'])) { ?>
                                <?php echo esc_html($lottovite_option['blog_title']);?>
                                <?php }
                                else{
                                 esc_html_e('Blog','lottovite');
                                } 
                            }
                        ?>
                    </h1>
                    <?php }
                ?>            
            </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
?>  
</div>
<?php
    global $lottovibe_option;    
    $header_width_meta = get_post_meta(get_queried_object_id(), 'header_width_custom', true);
    if ($header_width_meta != ''){
        $header_width = ( $header_width_meta == 'full' ) ? 'container-fluid': 'container';
    }else{
        $header_width = !empty($lottovibe_option['header-grid']) ? $lottovibe_option['header-grid'] : '';
        $header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';
    }
?>

<?php 
    $post_menu_type = get_post_meta(get_queried_object_id(), 'menu-type', true); 
    $post_meta_data = get_post_meta(get_queried_object_id(), 'banner_image', true);
    $content_banner = get_post_meta(get_queried_object_id(), 'content_banner', true); 
    $intro_content_banner = get_post_meta(get_queried_object_id(), 'intro_content_banner', true); 
?>

<div class="svtheme-breadcrumbs  porfolio-details is-shop-hide rts-bread-crumb-area">
<?php if($post_meta_data !='') { ?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $post_meta_data );?>')">
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
                                    
                                    if(!empty($lottovibe_option['blog_title'])) { ?>
                                        <?php echo esc_html($lottovibe_option['blog_title']);?>
                                        <?php }
                                        else{
                                         esc_html_e('Blog','lottovibe');
                                    } 
                                }
                            ?>
                        </h1>
                        <?php } 
                    ?>    
                  </div>

                  <div class="col-lg-12 col-md-12 text-md-right">
                    <?php if(!empty($lottovibe_option['off_breadcrumb'])){
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
    elseif(!empty($lottovibe_option['blog_banner_main']['url'])) { ?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url($lottovibe_option['blog_banner_main']['url']);?>')">
        <div class="<?php echo esc_attr($header_width);?>">
            <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>"> 
            <div class="row">                
                <div class="col-lg-12 col-md-12">  <?php                      
                        
                    $post_meta_title = get_post_meta(get_queried_object_id(), 'select-title', true);?>
                    <?php if( $post_meta_title != 'hide' ){    ?>            
                        <div class="wrapper">
                            <?php if(!empty($lottovibe_option['blog_title'])) : ?>
                                <span class="bg-text-stok"><?php echo esc_html($lottovibe_option['blog_title']);?></span>
                            <?php endif; ?>
                            <h1 class="page-title">               
                                <?php if(!empty($lottovibe_option['blog_title'])) { ?>
                                    <?php echo esc_html($lottovibe_option['blog_title']);?>
                                    <?php }
                                    else{
                                    esc_html_e('Blog','lottovibe');
                                } ?>
                            </h1>
                        </div>
                    <?php } ?>    
                </div>  
                <div class="col-lg-12">
                    <?php if(!empty($lottovibe_option['off_breadcrumb'])){
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
  
  elseif(!empty($lottovibe_option['breadcrumb_bg_color'])) { ?>
    <div class="breadcrumbs-single" style="background:<?php echo esc_attr($lottovibe_option['breadcrumb_bg_color']);?>">
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
                                  
                                  if(!empty($lottovibe_option['blog_title'])) { ?>
                                      <?php echo esc_html($lottovibe_option['blog_title']);?>
                                      <?php }
                                      else{
                                       esc_html_e('Blog','lottovibe');
                                  } 
                              }
                            ?>
                        </h1>
                  <?php } 
                    ?>    
                </div>

                <div class="col-lg-12 col-md-12">
                  <?php if(!empty($lottovibe_option['off_breadcrumb'])){
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
  <div class="svtheme-breadcrumbs-inner">  
    <div class="<?php echo esc_attr($header_width);?>">
      <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
                <?php     
                    if(!empty($lottovibe_option['off_breadcrumb'])){
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
                                 
                            if(!empty($lottovibe_option['blog_title'])) { ?>
                                <?php echo esc_html($lottovibe_option['blog_title']);?>
                                <?php }
                                else{
                                 esc_html_e('Blog','lottovibe');
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
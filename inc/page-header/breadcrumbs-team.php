<?php
    global $lottovibe_option;       
?>
<?php 
    $post_meta_data = get_post_meta(get_the_ID(), 'banner_image', true);
    $post_menu_type = get_post_meta(get_the_ID(), 'menu-type', true);    
?>
<div class="svtheme-breadcrumbs  porfolio-details rts-bread-crumb-area">
<?php if($post_meta_data !='') { ?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $post_meta_data );?>')">
        <div class="container">
          <div class="row">
            
              <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>"> 
                <div class="col-lg-12">
                
                <?php 
                    $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
                    <?php if( $post_meta_title != 'hide' ){             
                    ?>
                    <?php if(!empty($lottovibe_option['team_page_subtitle'])) : ?>
                        <span class="sub-title"><?php echo esc_html($lottovibe_option['team_page_subtitle']);?></span>
                    <?php endif; ?>
                    <h1 class="page-title">
                        <?php if(!empty($lottovibe_option['team_page_title'])){
                            echo esc_html($lottovibe_option['team_page_title']);
                            }else{
                               echo esc_html('Team Details', 'lottovibe');
                            }
                        ?>
                    </h1>
                    <?php } 
                   
                ?>    
              </div>
              <div class="col-lg-12">
                <?php if(!empty($lottovibe_option['off_breadcrumb'])){
                    $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
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

elseif (!empty($lottovibe_option['team_single_image']['url'])) {?>
<div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $lottovibe_option['team_single_image']['url'] );?>')">
    <div class="container">
         <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>"> 
            <div class="row">  
                <div class="col-lg-12">             
                    <div class="wrapper">
                        <?php if(!empty($lottovibe_option['team_details_text'])) : ?>
                            <span class="bg-text-stok"><?php echo esc_html($lottovibe_option['team_details_text']);?></span>
                        
                        <?php $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
                        <?php if( $post_meta_title != 'hide' ){ ?>
                            <h1 class="page-title">
                            <?php echo esc_html($lottovibe_option['team_details_text']);?>
                            </h1> 
                        <?php } ?>
                        <?php endif; ?>
                    
                    </div>
                </div>       
                <div class="col-lg-12">
                    <?php if(!empty($lottovibe_option['off_breadcrumb'])){
                        $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
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
    
<?php }else{?>
    <div class="svtheme-breadcrumbs-inner">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
                
                <?php 
                    $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
                    <?php if( $post_meta_title != 'hide' ){             
                    ?>
                        <h1 class="page-title">
                            <?php if($content_banner !=''){
                               echo esc_html($content_banner);
                            } else {
                               echo esc_html('Team Details', 'lottovibe');
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
<?php } ?>
</div>
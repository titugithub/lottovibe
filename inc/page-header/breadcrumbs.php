<?php
global $lottovite_option;  
$header_width_meta = get_post_meta(get_the_ID(), 'header_width_custom', true);
if ($header_width_meta != '') {
  $header_width = ($header_width_meta == 'full') ? 'container-fluid' : 'container';
} else {
  $header_width = !empty($lottovite_option['header-grid']) ? $lottovite_option['header-grid'] : '';
  $header_width = ($header_width == 'full') ? 'container-fluid' : 'container';
}
?>

<?php
$post_meta_data = get_post_meta(get_the_ID(), 'banner_image', true);
$post_meta_data2 = '';
//theme option chekcing
if ($post_meta_data == '') {
  if (!empty($lottovite_option['page_banner_main']['url'])) :
    $post_meta_data = $lottovite_option['page_banner_main']['url'];

  else : {
      $post_meta_data2 = !empty($lottovite_option['breadcrumb_bg_color']) ? $lottovite_option['breadcrumb_bg_color'] : '';
    }
  endif;
}

$banner_hide = get_post_meta(get_the_ID(), 'banner_hide', true);
if ('show' == $banner_hide ||  $banner_hide == '') {
  $post_meta_data = $post_meta_data;
  $post_meta_data2 = $post_meta_data2;
} else {
  $post_meta_data = '';
  $post_meta_data2 = '';
}
$post_menu_type = get_post_meta(get_the_ID(), 'menu-type', true);
$content_banner = get_post_meta(get_the_ID(), 'content_banner', true);
$intro_content_banner = get_post_meta(get_the_ID(), 'intro_content_banner', true);
?>
<?php if ($post_meta_data != '') {
  ?>
  <div class="svtheme-breadcrumbs porfolio-details rts-bread-crumb-area">
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url($post_meta_data); ?>')">
      <div class="<?php echo esc_attr($header_width); ?>">
        <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
          <div class="row">
            <div class="col-lg-12 col-md-12 ">
              <?php $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true); ?>
              <?php if ($post_meta_title != 'hide') {
                  if (!empty($intro_content_banner)) : ?>
                  <span class="sub-title"><?php echo esc_html($intro_content_banner); ?></span>
                <?php endif; ?>
                <div class="wrapper">


                  <div class="title">
                    <h1 class="page-title word-line">
                      <?php if ($content_banner != '') {
                            echo esc_html($content_banner);
                           
                          } else {
                            the_title();
                           
                          }
                          ?>
                    </h1>
                  </div>
                </div>
              <?php }
                ?>
            </div>
            <div class="col-lg-12 col-md-12 ffdd">
              <?php if (!empty($lottovite_option['off_breadcrumb'])) {
                  $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                  if ($rs_breadcrumbs != 'hide') :
                    if (function_exists('bcn_display')) { ?>
                    <div class="breadcrumbs-title "> <?php bcn_display(); ?></div>
              <?php }
                  endif;
                } ?>

            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
<?php } elseif ($post_meta_data2 != '') { ?>
  <div class="svtheme-breadcrumbs porfolio-details tttt">
    <div class="breadcrumbs-single" style="background:<?php echo esc_attr($post_meta_data2); ?>">
      <div class="<?php echo esc_attr($header_width); ?>">
        <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
          <div class="row">


            <div class="col-lg-12 text-lg-center">
              <?php if (!empty($lottovite_option['off_breadcrumb'])) {
                  $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                  if ($rs_breadcrumbs != 'hide') :
                    if (function_exists('bcn_display')) { ?>
                    <div class="breadcrumbs-title 3"> <?php bcn_display(); ?></div>
                   
              <?php }
                  endif;
                } ?>
            </div>
            <div class="col-lg-12 col-md-12 ">
              <?php $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true); ?>
              <?php if ($post_meta_title != 'hide') {
                  if (!empty($intro_content_banner)) : ?>
                  <span class="sub-title"><?php echo esc_html($intro_content_banner); ?></span>
                <?php endif; ?>

                <h1 class="page-title">
                  <?php if ($content_banner != '') {
                        echo esc_html($content_banner);
                      } else {
                        the_title();
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
  </div>
<?php

} else {
  $post_meta_bread = get_post_meta(get_the_ID(), 'select-bread', true); ?>
  <?php if ($post_meta_bread == 'show' || $post_meta_bread == '') { ?>
    <div class="svtheme-breadcrumbs  porfolio-details tttt">
      <div class="svtheme-breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
        <div class="<?php echo esc_attr($header_width); ?>">
          <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
            <div class="row">

              <div class="col-lg-12 col-md-12 3">
                <?php

                    $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true); ?>
                <?php if ($post_meta_title != 'hide') {
                      if (!empty($intro_content_banner)) : ?>
                    <span class="sub-title"><?php echo esc_html($intro_content_banner); ?></span>
                  <?php endif; ?>
                  <h1 class="page-title">
                    <?php if ($content_banner != '') {
                            echo esc_html($content_banner);
                          } else {
                            the_title();
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
    </div>
<?php
  }
}
?>
<?php

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
  return;}
?>
<div class="col-md-3 sidebar-gap">
  <aside id="secondary" class="widget-area">
    <div class="react-sideabr dynamic-sidebar">
      <?php
        dynamic_sidebar( 'sidebar-2' );
      ?>
    </div>
  </aside>
</div>


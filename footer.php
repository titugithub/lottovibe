</div><!-- .main-container -->

<?php
global $lottovibe_option;
?>
<footer>
    <?php
 get_template_part( 'inc/footer/footer','top' ); 
?>
</footer>
</div><!-- #page -->
<?php 
if(!empty($lottovibe_option['show_top_bottom'])){
?>
 <!-- start top-to-bottom  -->
<div id="top-to-bottom">
    <i class="rt-angles-up"></i>
</div>   
<?php } ?>
 <?php wp_footer(); ?>
  </body>
</html>

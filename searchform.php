<?php
$unique_id = wp_unique_id( 'search-form-' );
$aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>
<form role="search" <?php echo wp_kses_post( $aria_label ); ?> method="get" class="bs-search search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-wrap">
        <label class="screen-reader-text" for="<?php echo esc_attr( $unique_id ); ?>"><?php echo esc_html__( 'Search for:', 'lottovibe' ); ?></label>
        <input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-input" placeholder="<?php echo esc_attr__( 'Searching...', 'lottovibe' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
        <button type="submit" value="<?php echo esc_attr__( 'Search', 'lottovibe' ); ?>"><i class="rt-search"></i></button>
    </div>
</form>
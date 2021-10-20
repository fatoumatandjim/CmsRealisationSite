<?php
/**
 * The template for search form.
 *
 * @package AccessPress Mag
 */
?>
<?php 
    $search_button = of_get_option( 'trans_search_button', 'Search' );
    $search_placeholder = of_get_option( 'trans_search_placeholder', 'Search Content...' );
?>

<div class="ak-search">
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get">
        <label>
            <span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'accesspress-mag' ) ?></span>
            <input type="search" title="<?php esc_attr_e( 'Search for:', 'accesspress-mag' ); ?>" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr( $search_placeholder ); ?>" class="search-field" />
        </label>
        <div class="icon-holder">
        
        <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
    </form>
</div>   


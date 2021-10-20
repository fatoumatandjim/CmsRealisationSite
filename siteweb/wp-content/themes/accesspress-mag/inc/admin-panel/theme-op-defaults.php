<?php
/**
 * Default theme options.
 *
 * @package accesspress-mag
 */

if (!function_exists('accesspress_mag_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function accesspress_mag_get_default_theme_options() {
    $defaults = array();
    
    $defaults['featured_block_1']                 = of_get_option( 'featured_block_1' );
    $defaults['featured_block_2']                 = of_get_option( 'featured_block_2' );
    $defaults['featured_block_3']                 = of_get_option( 'featured_block_3' );
    $defaults['featured_block_4']                 = of_get_option( 'featured_block_4' );
   

    // Pass through filter.
    $defaults = apply_filters('accesspress_mag_get_default_theme_options', $defaults);

	return $defaults;

}

endif;

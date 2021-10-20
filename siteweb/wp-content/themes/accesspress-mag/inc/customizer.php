<?php
/**
 * Accesspress Mag Theme Customizer
 *
 * @package AccessPress Mag
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function accesspress_mag_customize_register( $wp_customize ) {

    /** Default Settings */        
    $wp_customize->add_panel( 
        'accesspress_mag_default_panel',
         array(
            'priority' => 5,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__( 'Default Settings', 'accesspress-mag' ),
            'description' => esc_html__( 'Setup default WordPress Customizer options.', 'accesspress-mag' ),
        ) 
    );
    $wp_customize->get_section( 'title_tagline' )->panel     = 'accesspress_mag_default_panel';
    $wp_customize->get_section( 'colors' )->panel            = 'accesspress_mag_default_panel';
    $wp_customize->get_section( 'header_image' )->panel      = 'accesspress_mag_default_panel';
    $wp_customize->get_section( 'background_image' )->panel  = 'accesspress_mag_default_panel';    
    $wp_customize->get_section( 'static_front_page' )->panel = 'accesspress_mag_default_panel';
    $wp_customize->get_section( 'custom_css' )->panel = 'accesspress_mag_default_panel';
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';


    require trailingslashit( get_template_directory() ) . '/inc/admin-panel/accesspress-mag-sanitize.php';
}
add_action( 'customize_register', 'accesspress_mag_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function accesspress_mag_customize_preview_js() {
	wp_enqueue_script( 'accesspress_mag_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'accesspress_mag_customize_preview_js' );

    if( !function_exists('accesspress_mag_category_lists')){
        function accesspress_mag_category_lists(){
            $accesspress_mag_category   =   get_categories();
            $accesspress_mag_cat_list   =   array();
            $accesspress_mag_cat_list[0]=   esc_html__('Select Category','accesspress-mag');
            foreach ($accesspress_mag_category as $accesspress_mag_cat) {
                $accesspress_mag_cat_list[$accesspress_mag_cat->term_id]    =   $accesspress_mag_cat->name;
            }
            return $accesspress_mag_cat_list;
        }
    }
    if( !function_exists('accesspress_mag_post_list')){
        function accesspress_mag_post_list(){
            $allposts  =   new WP_Query( array( 'post_type' => 'post','posts_per_page' => -1 ));
            $post_list   =   array();
            $post_list[0]=   esc_html__('Select Post','accesspress-mag');
            while($allposts->have_posts()) {
                $allposts->the_post();
                $post_list[get_the_ID()]    =   get_the_title();
            }
            return $post_list;
        }
    }
    if( !class_exists('Kirki')){
        return;
    }
    /**
     * If you need to include Kirki in your theme,
     * then you may want to consider adding the translations here
     * using your textdomain.
     * 
     * If you're using Kirki as a plugin this is not needed.
     */
    if(!function_exists('accesspress_mag_kirki_i18n')){
        function accesspress_mag_kirki_i18n( $accesspress_mag_config ) {
            $accesspress_mag_config['i18n'] = array(
                'background-color'      => esc_html__( 'Background Color', 'accesspress-mag' ),
                'background-image'      => esc_html__( 'Background Image', 'accesspress-mag' ),
                'no-repeat'             => esc_html__( 'No Repeat', 'accesspress-mag' ),
                'repeat-all'            => esc_html__( 'Repeat All', 'accesspress-mag' ),
                'repeat-x'              => esc_html__( 'Repeat Horizontally', 'accesspress-mag' ),
                'repeat-y'              => esc_html__( 'Repeat Vertically', 'accesspress-mag' ),
                'inherit'               => esc_html__( 'Inherit', 'accesspress-mag' ),
                'background-repeat'     => esc_html__( 'Background Repeat', 'accesspress-mag' ),
                'cover'                 => esc_html__( 'Cover', 'accesspress-mag' ),
                'contain'               => esc_html__( 'Contain', 'accesspress-mag' ),
                'background-size'       => esc_html__( 'Background Size', 'accesspress-mag' ),
                'fixed'                 => esc_html__( 'Fixed', 'accesspress-mag' ),
                'scroll'                => esc_html__( 'Scroll', 'accesspress-mag' ),
                'background-attachment' => esc_html__( 'Background Attachment', 'accesspress-mag' ),
                'left-top'              => esc_html__( 'Left Top', 'accesspress-mag' ),
                'left-center'           => esc_html__( 'Left Center', 'accesspress-mag' ),
                'left-bottom'           => esc_html__( 'Left Bottom', 'accesspress-mag' ),
                'right-top'             => esc_html__( 'Right Top', 'accesspress-mag' ),
                'right-center'          => esc_html__( 'Right Center', 'accesspress-mag' ),
                'right-bottom'          => esc_html__( 'Right Bottom', 'accesspress-mag' ),
                'center-top'            => esc_html__( 'Center Top', 'accesspress-mag' ),
                'center-center'         => esc_html__( 'Center Center', 'accesspress-mag' ),
                'center-bottom'         => esc_html__( 'Center Bottom', 'accesspress-mag' ),
                'background-position'   => esc_html__( 'Background Position', 'accesspress-mag' ),
                'background-opacity'    => esc_html__( 'Background Opacity', 'accesspress-mag' ),
                'ON'                    => esc_html__( 'ON', 'accesspress-mag' ),
                'OFF'                   => esc_html__( 'OFF', 'accesspress-mag' ),
                'all'                   => esc_html__( 'All', 'accesspress-mag' ),
                'cyrillic'              => esc_html__( 'Cyrillic', 'accesspress-mag' ),
                'cyrillic-ext'          => esc_html__( 'Cyrillic Extended', 'accesspress-mag' ),
                'devanagari'            => esc_html__( 'Devanagari', 'accesspress-mag' ),
                'greek'                 => esc_html__( 'Greek', 'accesspress-mag' ),
                'greek-ext'             => esc_html__( 'Greek Extended', 'accesspress-mag' ),
                'khmer'                 => esc_html__( 'Khmer', 'accesspress-mag' ),
                'latin'                 => esc_html__( 'Latin', 'accesspress-mag' ),
                'latin-ext'             => esc_html__( 'Latin Extended', 'accesspress-mag' ),
                'vietnamese'            => esc_html__( 'Vietnamese', 'accesspress-mag' ),
                'serif'                 => esc_html_x( 'Serif', 'font style', 'accesspress-mag' ),
                'sans-serif'            => esc_html_x( 'Sans Serif', 'font style', 'accesspress-mag' ),
                'monospace'             => esc_html_x( 'Monospace', 'font style', 'accesspress-mag' ),
            );
            return $accesspress_mag_config;
        }
    }
    add_filter( 'kirki/config', 'accesspress_mag_kirki_i18n' );

    if(!function_exists('accesspress_mag_kirki_fields')) {
        function accesspress_mag_kirki_fields( $wp_customize ) {    
            /** added customizer panels*/
            load_template( dirname( __FILE__ ) . '/admin-panel/accesspress-mag-customizer.php', false);        
        }
    }
    add_filter( 'kirki/fields', 'accesspress_mag_kirki_fields' );
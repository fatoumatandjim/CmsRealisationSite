<?php
/**
 * SANITIZATION
 * @since 2.0.0
 */       

    /* Sanitization for iframe */     
       
    function accesspress_mag_sanitize_iframe($accesspress_mag_input){
        $allowed_output_html = array(
            'iframe' => array(
                    'src' => array(),
                    'width' => array(),
                    'height' => array(),
                    'style' => array(),
                    'frameborder' => array(),
                    'allowfullscreen' => array(),
            ),
        );
        $allowed_output_protocol = array(
                'https',
                'javascript',
                'http',
        );
        return wp_kses( $accesspress_mag_input, $allowed_output_html, $allowed_output_protocol);
    }
    /* Sanitization for Textarea */     
       
    function accesspress_mag_sanitize_textarea($accesspress_mag_input){
        return wp_kses_post( force_balance_tags( $accesspress_mag_input ) );
    }
    /* Sanitization for Check Box */
    function accesspress_mag_sanitize_checkbox($accesspress_mag_input){
        if($accesspress_mag_input){
            return 1;
        }else{
            return 0;
        }
    }
    
    /* Sanitization for 2 Layout radio */
    function accesspress_mag_sanitize_logo($accesspress_mag_input){
        $accesspress_mag_output = array(
                    'Left'   => esc_html__( 'Left', 'accesspress-mag' ),
                    'Center' => esc_html__( 'Center', 'accesspress-mag' ),
                );  
        if(array_key_exists($accesspress_mag_input,$accesspress_mag_output)){
            return $accesspress_mag_input;
        }else{
            return '';
        }
    }

    function accesspress_mag_sanitize_footer($accesspress_mag_input){
        $imagepath =  get_template_directory_uri() . '/inc/admin-panel/images/';
        $accesspress_mag_output = array(
                'column4' => $imagepath . 'footers/footer-4.png',
                'column3' => $imagepath . 'footers/footer-3.png',
                'column2' => $imagepath . 'footers/footer-2.png', 
                'column1' => $imagepath . 'footers/footer-1.png',
            );  
        if(array_key_exists($accesspress_mag_input,$accesspress_mag_output)){
            return $accesspress_mag_input;
        }else{
            return '';
        }
    }
    /* Sanitization for slider type */
    function accesspress_mag_sanitize_yes_no($accesspress_mag_input){
        $accesspress_mag_output = array(
                'yes'  => esc_html__( 'Yes', 'accesspress-mag' ),
                'no' => esc_html__( 'No', 'accesspress-mag' ),
            );  
        if(array_key_exists($accesspress_mag_input,$accesspress_mag_output)){
            return $accesspress_mag_input;
        }else{
            return '';
        }
    }

    /* Sanitization for slider type */
    function accesspress_mag_sanitize_slider($accesspress_mag_input){
        $imagepath =  get_template_directory_uri() . '/inc/admin-panel/images/';
        $accesspress_mag_output = array(
                'slider_default' => $imagepath.'slider-default.jpg',
                'slider_highlight' => $imagepath.'slider-highlight.jpg'
            );  
        if(array_key_exists($accesspress_mag_input,$accesspress_mag_output)){
            return $accesspress_mag_input;
        }else{
            return '';
        }
    }

    /* Sanitization for slider type */
    function accesspress_mag_sanitize_slides($accesspress_mag_input){

        $accesspress_mag_output = array(
                0   => esc_html__( 'Default', 'accesspress-mag' ),
                1   => esc_html__( '1', 'accesspress-mag' ),
                2   => esc_html__( '2', 'accesspress-mag' ),
                3   => esc_html__( '3', 'accesspress-mag' ),
                4   => esc_html__( '4', 'accesspress-mag' ),
                5   => esc_html__( '5', 'accesspress-mag' ),
                6   => esc_html__( '6', 'accesspress-mag' ),
            );  
        if(array_key_exists($accesspress_mag_input,$accesspress_mag_output)){
            return $accesspress_mag_input;
        }else{
            return '';
        }
    }

    /* Sanitization for slider type */
    function accesspress_mag_sanitize_post_num($accesspress_mag_input){

        $accesspress_mag_output = array(
                -1   => esc_html__( 'All Post', 'accesspress-mag' ),
                4 => esc_html__( '4', 'accesspress-mag' ),
                5 => esc_html__( '5', 'accesspress-mag' ),
                6 => esc_html__( '6', 'accesspress-mag' ),
                7 => esc_html__( '7', 'accesspress-mag' ),
                8 => esc_html__( '8', 'accesspress-mag' ),
                9 => esc_html__( '9', 'accesspress-mag' ),
                10 => esc_html__( '10', 'accesspress-mag' ),
                11 => esc_html__( '11', 'accesspress-mag' ),
                12 => esc_html__( '12', 'accesspress-mag' ),
                13 => esc_html__( '13', 'accesspress-mag' ),
                14 => esc_html__( '14', 'accesspress-mag' ),
                15 => esc_html__( '15', 'accesspress-mag' ),
            );  
        if(array_key_exists($accesspress_mag_input,$accesspress_mag_output)){
            return $accesspress_mag_input;
        }else{
            return '';
        }
    }


    /* Sanitization for Blog layout */
    function accesspress_mag_sanitize_slider_transition($accesspress_mag_input){
        $accesspress_mag_output = array(
                'fade'   => esc_html__( 'Fade', 'accesspress-mag' ),
                'slide' => esc_html__( 'Slide', 'accesspress-mag' ),
                );  
        if(array_key_exists($accesspress_mag_input,$accesspress_mag_output)){
            return $accesspress_mag_input;
        }else{
            return '';
        }
    }
    
    /* Sanitization for Header Type radio option */
    function accesspress_mag_sanitize_template($accesspress_mag_input){
        $accesspress_mag_output = array(
                    'default_template'   => esc_html__( 'Default', 'accesspress-mag' ),
                    'style1_template' => esc_html__( 'Style 1', 'accesspress-mag' ),
                );  
        if(array_key_exists($accesspress_mag_input,$accesspress_mag_output)){
            return $accesspress_mag_input;
        }else{
            return '';
        }
    }

    
    /* Sanitization for Image Type */
    function accesspress_mag_sanitize_weblayout($accesspress_mag_input){
        $accesspress_mag_output = array(
                    'full-width'   => esc_html__( 'Full Width', 'accesspress-mag' ),
                    'boxed' => esc_html__( 'Boxed', 'accesspress-mag' )
                    );
        if(array_key_exists($accesspress_mag_input,$accesspress_mag_output)){
            return $accesspress_mag_input;
        }else{
            return '';
        }
    }
    function accesspress_mag_sanitize_integer($accesspress_mag_input) {
        return intval($accesspress_mag_input);
    }

    function accesspress_mag_sanitize_category_lists($accesspress_mag_input) {
        $accesspress_mag_output = array();
        $options_categories_obj = get_categories();
        $accesspress_mag_output[]= __( 'Select category', 'accesspress-mag' );

        foreach ($options_categories_obj as $category) {
            $accesspress_mag_output[$category->slug] = $category->cat_name;
        }
        if(array_key_exists($accesspress_mag_input,$accesspress_mag_output)){
            return $accesspress_mag_input;
        }else{
            return '';
        }
    }
    function accesspress_mag_sanitize_post_lists($accesspress_mag_input) {
        $accesspress_mag_output = accesspress_mag_post_list();
        if(array_key_exists($accesspress_mag_input,$accesspress_mag_output)){
            return $accesspress_mag_input;
        }else{
            return '';
        }
    }

    function accesspress_mag_sanitize_post_template($accesspress_mag_input){
        $imagepath =  get_template_directory_uri() . '/images/';
        $accesspress_mag_output = array(
                'single' => $imagepath.'post-templates-icons-0.png',
                'single-style1' => $imagepath.'post-templates-icons-1.png'
            );  
        if(array_key_exists($accesspress_mag_input,$accesspress_mag_output)){
            return $accesspress_mag_input;
        }else{
            return '';
        }
    }

    function accesspress_mag_sanitize_post_sidebar($accesspress_mag_input){
        $imagepath =  get_template_directory_uri() . '/images/';
        $accesspress_mag_output = array(
                'right-sidebar' => $imagepath.'right-sidebar.png',
                'left-sidebar' => $imagepath.'left-sidebar.png',
                'no-sidebar' => $imagepath.'no-sidebar.png'
            );  
        if(array_key_exists($accesspress_mag_input,$accesspress_mag_output)){
            return $accesspress_mag_input;
        }else{
            return '';
        }
    }

    function accesspress_mag_sanitize_ar_template($accesspress_mag_input){
        $imagepath =  get_template_directory_uri() . '/images/';
        $accesspress_mag_output = array(
                'archive-default' => $imagepath.'post-templates-icons-0.png',
                'archive-style1' => $imagepath.'post-templates-icons-1.png'
            );  
        if(array_key_exists($accesspress_mag_input,$accesspress_mag_output)){
            return $accesspress_mag_input;
        }else{
            return '';
        }
    }


    function accesspress_mag_sanitize_ext_type($accesspress_mag_input){
        $imagepath =  get_template_directory_uri() . '/images/';
        $accesspress_mag_output = array(
            ''   => esc_html__( 'On Words', 'accesspress-mag' ),
            'letters' => esc_html__( 'On Letters', 'accesspress-mag' ),
            );  
        if(array_key_exists($accesspress_mag_input,$accesspress_mag_output)){
            return $accesspress_mag_input;
        }else{
            return '';
        }
    }

    function accesspress_mag_sanitize_post_slider($accesspress_mag_input){
        $accesspress_mag_output = array(
            '' => esc_html__('Latest Posts','accesspress-mag'),
            'cat' => esc_html__('Category Posts','accesspress-mag'),
        );  
        if(array_key_exists($accesspress_mag_input,$accesspress_mag_output)){
            return $accesspress_mag_input;
        }else{
            return '';
        }
    }
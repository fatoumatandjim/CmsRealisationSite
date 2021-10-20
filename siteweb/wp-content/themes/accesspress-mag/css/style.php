<?php
	function accesspress_mag_dynamic_color() {
		$custom_css = '';

		$tpl_color = of_get_option( 'template_color', '#dc3522' );

          $tpl_color_dark = accesspress_mag_colour_brightness( $tpl_color, -0.6 );

		if( $tpl_color ) {

			/** Background Color **/
			$custom_css .= "
                    .ticker-title,
                    .big-image-overlay i,
                    #back-top:hover,
                    .bread-you,
                    .entry-meta .post-categories li a,
                    .error404 .error-num .num,
                    .bttn:hover,
                    button,
                    input[type=\"button\"]:hover,
                    input[type=\"reset\"]:hover,
                    input[type=\"submit\"]:hover,
                    .ak-search .search-form,
                    .nav-toggle{
					   background: {$tpl_color};
					}";

               /** Background Color (Darker) **/
               $custom_css .= "
                    .ak-search .search-form .search-submit,
                    .ak-search .search-form .search-submit:hover{
                         background: {$tpl_color_dark};
                    }";

			/** Color **/
                $custom_css .= "
                    #site-navigation ul li:hover > a,
                    #site-navigation ul li.current-menu-item > a,
                    #site-navigation ul li.current-menu-ancestor > a,
                    .search-icon > i:hover,
                    .block-poston a:hover,
                    .block-post-wrapper .post-title a:hover,
                    .random-posts-wrapper .post-title a:hover,
                    .sidebar-posts-wrapper .post-title a:hover,
                    .review-posts-wrapper .single-review .post-title a:hover,
                    .latest-single-post a:hover,
                    #top-navigation .menu li a:hover,
                    #top-navigation .menu li.current-menu-item > a,
                    #top-navigation .menu li.current-menu-ancestor > a,
                    #footer-navigation ul li a:hover,
                    #footer-navigation ul li.current-menu-item > a,
                    #footer-navigation ul li.current-menu-ancestor > a,
                    #top-right-navigation .menu li a:hover,
                    #top-right-navigation .menu li.current-menu-item > a,
                    #top-right-navigation .menu li.current-menu-ancestor > a,
                    #accesspres-mag-breadcrumbs .ak-container > .current,
                    .entry-footer a:hover,
                    .oops,
                    .error404 .not_found,
                    #cancel-comment-reply-link:before,
                    #cancel-comment-reply-link,
                    .random-post a:hover,
                    .byline a, .byline a:hover, .byline a:focus, .byline a:active,
                    .widget ul li:hover a, .widget ul li:hover:before,
                    .site-info a, .site-info a:hover, .site-info a:focus, .site-info a:active{
                        color: {$tpl_color};
                    }";
                    
            /** Border Color **/
                $custom_css .= "
                    #site-navigation ul.menu > li:hover > a:after,
                    #site-navigation ul.menu > li.current-menu-item > a:after,
                    #site-navigation ul.menu > li.current-menu-ancestor > a:after,
                    #site-navigation ul.sub-menu li:hover,
                    #site-navigation ul.sub-menu li.current-menu-item,
                    #site-navigation ul.sub-menu li.current-menu-ancestor,
                    .navigation .nav-links a,
                    .bttn,
                    button, input[type=\"button\"],
                    input[type=\"reset\"],
                    input[type=\"submit\"]{
                        border-color: {$tpl_color};
                    }";

			/** Border Left Color **/
				$custom_css .= "
                    .ticker-title:before,
                    .bread-you:after{
					   border-left-color: {$tpl_color};
					}";

            /** Media Queries **/
                $custom_css .= "
                    @media (max-width: 767px){
                        .sub-toggle{
                            background: {$tpl_color} !important;
                        }

                        #site-navigation ul li:hover, #site-navigation ul.menu > li.current-menu-item, #site-navigation ul.menu > li.current-menu-ancestor{
                            border-color: {$tpl_color} !important;
                        }
                    }";
		}

		wp_add_inline_style( 'accesspress-mag-style', $custom_css );
	}

	add_action( 'wp_enqueue_scripts', 'accesspress_mag_dynamic_color' );

     if( !function_exists( 'accesspress_mag_colour_brightness' ) ) {
          function accesspress_mag_colour_brightness($hex, $percent) {
                 // Work out if hash given
                 $hash = '';
                 if (stristr($hex, '#')) {
                     $hex = str_replace('#', '', $hex);
                     $hash = '#';
                 }
                 /// HEX TO RGB
                 $rgb = array(hexdec(substr($hex, 0, 2)), hexdec(substr($hex, 2, 2)), hexdec(substr($hex, 4, 2)));
                 //// CALCULATE 
                 for ($i = 0; $i < 3; $i++) {
                     // See if brighter or darker
                     if ($percent > 0) {
                         // Lighter
                         $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1 - $percent));
                     } else {
                         // Darker
                         $positivePercent = $percent - ($percent * 2);
                         $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1 - $positivePercent));
                     }
                     // In case rounding up causes us to go to 256
                     if ($rgb[$i] > 255) {
                         $rgb[$i] = 255;
                     }
                 }
                 //// RBG to Hex
                 $hex = '';
                 for ($i = 0; $i < 3; $i++) {
                     // Convert the decimal digit to hex
                     $hexDigit = dechex($rgb[$i]);
                     // Add a leading zero if necessary
                     if (strlen($hexDigit) == 1) {
                         $hexDigit = "0" . $hexDigit;
                     }
                     // Append to the hex string
                     $hex .= $hexDigit;
                 }
                 return $hash . $hex;
             }
     }
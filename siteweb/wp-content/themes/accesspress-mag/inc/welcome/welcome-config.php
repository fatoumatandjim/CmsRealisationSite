<?php
	/**
	 * Welcome Page Initiation
	*/

	get_template_part('/inc/welcome/welcome');

	/** Plugins **/
	$th_plugins = array(
		// *** Companion Plugins
		'companion_plugins' => array(

		),

		//Displays on Required Plugins tab
		'req_plugins' => array(

			// Free Plugins
			'free_plug' => array(

				'kirki' => array(
					'slug' => 'kirki',
					'filename' => 'kirki.php',
					'class' => 'Kirki'
				),
				'accesspress-twitter-feed' => array(
					'slug' => 'accesspress-twitter-feed',
					'filename' => 'accesspress-twitter-feed.php',
					'class' => 'APSS_Class'
				),
				'accesspress-social-share' => array(
					'slug' => 'accesspress-social-share',
					'filename' => 'accesspress-social-share.php',
					'class' => 'APSS_Class'
				),
				'accesspress-social-icons' => array(
					'slug' => 'accesspress-social-icons',
					'filename' => 'accesspress-social-icons.php',
					'class' => 'APS_Class'
				),
				'siteorigin-panels' => array(
					'slug' => 'siteorigin-panels',
					'filename' => 'siteorigin-panels.php',
					'class' => 'SiteOrigin_Panels'
				),
				'contact-form-7' => array(
					'slug' => 'contact-form-7',
					'filename' => 'wp-contact-form-7.php',
					'class' => 'WPCF7'
				),
				'scroll-triggered-boxes' => array(
					'slug' => 'scroll-triggered-boxes',
					'filename' => 'index.php',
					'class' => 'ScrollTriggeredBoxes\\Plugin'
				),
			),
			'pro_plug' => array(

			),
		),

		// *** Displays on Import Demo section
		'required_plugins' => array(
			'access-demo-importer' => array(
					'slug' 		=> 'access-demo-importer',
					'name' 		=> esc_html__('Access Demo Importer', 'accesspress-mag'),
					'filename' 	=>'access-demo-importer.php',
					'host_type' => 'wordpress', // Use either bundled, remote, wordpress
					'class' 	=> 'Access_Demo_Importer',
					'info' 		=> esc_html__('Access Demo Importer adds the feature to Import the Demo Conent with a single click.', 'accesspress-mag'),
			),
		

		),

		// *** Recommended Plugins
		'recommended_plugins' => array(
			// Free Plugins
			'free_plugins' => array(
			),

			// Pro Plugins
			'pro_plugins' => array(

			)
		),
	);

	$strings = array(
		// Welcome Page General Texts
		'welcome_menu_text' => esc_html__( 'Accesspress Mag', 'accesspress-mag' ),
		'theme_short_description' => esc_html__( 'AccessPress Mag - is clean & modern WordPress magazine theme. It is ideal for newspaper, editorial, online magazine, blog or personal website. It is a cutting-edge, feature-rich FREE WordPress theme and is fully-responsive. Its feature includes: 2 post layout, news ticker, sticky menu, author block, large featured images for page/post, social media integration for wider social reach. Demo: http://demo.accesspressthemes.com/accesspress-mag/ Support forum: https://accesspressthemes.com/support/', 'accesspress-mag' ),

		// Plugin Action Texts
		'install_n_activate' 	=> esc_html__('Install and Activate', 'accesspress-mag'),
		'deactivate' 			=> esc_html__('Deactivate', 'accesspress-mag'),
		'activate' 				=> esc_html__('Activate', 'accesspress-mag'),

		// Getting Started Section
		'doc_heading' 		=> esc_html__('Step 1 - Documentation', 'accesspress-mag'),
		'doc_description' 	=> esc_html__('Read the Documentation and follow the instructions to manage the site , it helps you to set up the theme more easily and quickly. The Documentation is very easy with its pictorial  and well managed listed instructions. ', 'accesspress-mag'),
		'doc_link'			=> 'https://doc.accesspressthemes.com/accesspress-mag-documentation/',
		'doc_read_now' 		=> esc_html__( 'Read Now', 'accesspress-mag' ),
		'cus_heading' 		=> esc_html__('Step 2 - Customizer Panel', 'accesspress-mag'),
		'cus_read_now' 		=> esc_html__( 'Go to Customizer Panels', 'accesspress-mag' ),

		// Recommended Plugins Section
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'accesspress-mag' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'accesspress-mag' ),

		

		// Demo Actions
		'activate_btn' 		=> esc_html__('Activate', 'accesspress-mag'),
		'installed_btn' 	=> esc_html__('Activated', 'accesspress-mag'),
		'demo_installing' 	=> esc_html__('Installing Demo', 'accesspress-mag'),
		'demo_installed' 	=> esc_html__('Demo Installed', 'accesspress-mag'),
		'demo_confirm' 		=> esc_html__('Are you sure to import demo content ?', 'accesspress-mag'),

		// Actions Required
		'req_plugin_info' => esc_html__('All these required plugins will be installed and activated while importing demo. Or you can choose to install and activate them manually. If you\'re not importing any of the demos, you must install and activate these plugins manually.', 'accesspress-mag' ),
		'req_plugins_installed' => esc_html__( 'All Recommended action has been successfully completed.', 'accesspress-mag' ),
		'customize_theme_btn' 	=> esc_html__( 'Customize Theme', 'accesspress-mag' ),
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'accesspress-mag' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'accesspress-mag' ),
	);

	/**
	 * Initiating Welcome Page
	*/
	$my_theme_wc_page = new Accesspress_Mag_Welcome( $th_plugins, $strings );
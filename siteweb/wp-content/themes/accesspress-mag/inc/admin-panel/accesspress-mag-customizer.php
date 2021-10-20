<?php 
//$defaults = accesspress_mag_get_default_theme_options();

// Pull all the categories into an array
$options_categories = array();
$options_categories_obj = get_categories();
$options_categories[]= __( 'Select category', 'accesspress-mag' );
foreach ($options_categories_obj as $category) {
	$options_categories[$category->slug] = $category->cat_name;
}

Kirki::add_config( 'accesspress_mag_config', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'option',
	'option_name'	=> 'accesspress-mag-theme'
) );
Kirki::add_section( 'accesspress_mag_basic', array(
	'priority'    => 20,
	'title'       => esc_html__( 'Basic Settings', 'accesspress-mag' ),
	'description' => esc_html__( 'Setup Basic Settings.', 'accesspress-mag' ),
) );

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'color',
		'settings'    => 'template_color',
		'label'       => esc_html__( 'Template Color', 'accesspress-mag' ),
		'description' => esc_html__( 'Choose template color of the theme.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_basic',
		'default'     => '#1eb0bc',
		'priority'    => 30,
		'sanitize_callback'	=> 'sanitize_hex_color',
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'radio_buttonset',
		'settings'    => 'website_layout_option',
		'label'       => esc_html__( 'Web Layout', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_basic',
		'default'     => 'full-width',
		'priority'    => 20,
		'choices'     => 
		array(
			'full-width'   => esc_html__( 'Full Width', 'accesspress-mag' ),
			'boxed' => esc_html__( 'Boxed', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_weblayout'
	)
);

Kirki::add_section( 'accesspress_mag_header_options', array(
	'title'          => esc_html__( 'Header Options', 'accesspress-mag' ),
	'description'    => esc_html__( 'Setup header options.', 'accesspress-mag' ),
	'priority'       => 10,
) );
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'news_ticker_option',
		'label'       => esc_html__( 'News Ticker', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_header_options',
		'description' => esc_html__( 'Show or hide the news ticker section, which display latest 5 posts.', 'accesspress-mag' ),
		'default'     => true,
		'priority'    => 20,
		'choices'     => array(
			true   => esc_html__( 'Yes', 'accesspress-mag' ),
			false => esc_html__( 'No', 'accesspress-mag' ),
		),
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'ticker_caption',
		'label'       => esc_html__( 'News Ticker Caption', 'accesspress-mag' ),
		'description' => esc_html__( 'Enter text to change text of New Ticker Caption.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_header_options',
		'default'     => esc_html('Latest'),
		'priority'    => 20,			
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'menu_sticky',
		'label'       => esc_html__( 'Sticky Menu', 'accesspress-mag' ),
		'description' => esc_html__( 'Enable or Disable sticky menu behaviour.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_header_options',
		'default'     => true,
		'priority'    => 20,
		'choices'     => array(
			true   => esc_html__( 'Enable', 'accesspress-mag' ),
			false => esc_html__( 'Disable', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'random_icon_option',
		'label'       => esc_html__( 'Random Post in Menu', 'accesspress-mag' ),
		'description' => esc_html__( 'Enable or Disable Random Post icon in menu section.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_header_options',
		'default'     => false,
		'priority'    => 20,
		'choices'     => array(
			true   => esc_html__( 'Enable', 'accesspress-mag' ),
			false => esc_html__( 'Disable', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'header_current_date_option',
		'label'       => esc_html__( 'Disable Current Date', 'accesspress-mag' ),
		'description' => esc_html__( 'Select Yes to disable current date at top menu.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_header_options',
		'default'     => true,
		'priority'    => 20,
		'choices'     => array(
			true   => esc_html__( 'Enable', 'accesspress-mag' ),
			false => esc_html__( 'Disable', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);

Kirki::add_field( 'accesspress_mag_config', [
	'type'        => 'custom',
	'settings'    => 'logo_info_settings',
	'section'     => 'accesspress_mag_header_options',
	'default'     => '<div style="padding: 10px;background-color: #ddd; color: #000; border-radius: 5px;">' . esc_html__( 'Logo Settings Options.', 'accesspress-mag' ) . '</div>',
	'priority'    => 20,
] );

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'logo_alt',
		'label'       => esc_html__( 'Logo Alt Attribute', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_header_options',
		'default'     => '',
		'priority'    => 20,			
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'logo_title',
		'label'       => esc_html__( 'Logo Title Attribute', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_header_options',
		'default'     => '',
		'priority'    => 20,			
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

Kirki::add_panel( 'accesspress_mag_footer', array(
	'title'          => esc_html__( 'Footer Settings', 'accesspress-mag' ),
	'description'    => esc_html__( 'Setup footer Settings.', 'accesspress-mag' ),
	'priority'       => 80,
) );
Kirki::add_section( 'accesspress_mag_footer_widget', array(
	'title'          => esc_html__( 'Footer Setting', 'accesspress-mag' ),
	'description'    => esc_html__( 'Setup Footer Widget Settings.', 'accesspress-mag' ),
	'panel'          => 'accesspress_mag_footer',
	'priority'       => 20,
) );

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'footer_switch',
		'label'       => esc_html__( 'Footer Widget Option', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_footer_widget',
		'description' => esc_html__( 'Show or hide the footer widget area.', 'accesspress-mag' ),
		'default'     => true,
		'priority'    => 20,
		'choices'     => array(
			true   => esc_html__( 'Yes', 'accesspress-mag' ),
			false => esc_html__( 'No', 'accesspress-mag' ),
		),
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);

$imagepath =  get_template_directory_uri() . '/inc/admin-panel/images/';

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'radio-image',
		'settings'    => 'footer_layout',
		'label'       => esc_html__( 'Footer Widget Layout', 'accesspress-mag' ),
		'description' => esc_html__( 'Choose footer widget layout.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_footer_widget',
		'default'     => 'column4',
		'choices'     => array(
			'column4' => $imagepath . 'footers/footer-4.png',
			'column3' => $imagepath . 'footers/footer-3.png',
			'column2' => $imagepath . 'footers/footer-2.png', 
			'column1' => $imagepath . 'footers/footer-1.png',
		),					
		'priority'    => 70,
		'sanitize_callback'	=> 'accesspress_mag_sanitize_footer',
	)
);
Kirki::add_section( 'accesspress_mag_sub_footer', array(
	'title'          => esc_html__( 'Sub Footer', 'accesspress-mag' ),
	'description'    => esc_html__( 'Setup Sub Footer Settings.', 'accesspress-mag' ),
	'panel'          => 'accesspress_mag_footer',
	'priority'       => 30,
) );
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'sub_footer_switch',
		'label'       => esc_html__( 'Sub Footer Option', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_sub_footer',
		'description' => esc_html__( 'Show or hide copy right and footer menu section.', 'accesspress-mag' ),
		'default'     => true,
		'priority'    => 20,
		'choices'     => array(
			true   => esc_html__( 'Yes', 'accesspress-mag' ),
			false => esc_html__( 'No', 'accesspress-mag' ),
		),
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'mag_footer_copyright',
		'label'       => esc_html__( 'Copyright text', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_sub_footer',
		'description' => esc_html__( 'Set footer copyright text.', 'accesspress-mag' ),
		'default'     => true,
		'priority'    => 20,
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'copyright_symbol',
		'label'       => esc_html__( 'Copyright Option', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_sub_footer',
		'description' => esc_html__( 'Show or hide the footer copyright example( Copyright © current year ).', 'accesspress-mag' ),
		'default'     => true,
		'priority'    => 20,
		'choices'     => array(
			true   => esc_html__( 'Yes', 'accesspress-mag' ),
			false => esc_html__( 'No', 'accesspress-mag' ),
		),
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);
Kirki::add_panel( 'accesspress_mag_homepage', array(
	'title'          => esc_html__( 'Homepage Settings', 'accesspress-mag' ),
	'description'    => esc_html__( 'Setup Homepage Settings.', 'accesspress-mag' ),
	'priority'       => 30,
) 
);
Kirki::add_section( 'accesspress_mag_slider', array(
	'title'          => esc_html__( 'Slider Settings', 'accesspress-mag' ),
	'description'    => esc_html__( 'Setup slider Settings.', 'accesspress-mag' ),
	'priority'       => 10,
	'panel'			=> 'accesspress_mag_homepage',
) 
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'slider_option',
		'label'       => esc_html__( 'Slider Section Option', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_slider',
		'description' => esc_html__( 'Enable or disable slider section at homepage.', 'accesspress-mag' ),
		'default'     => true,
		'priority'    => 10,
		'choices'     => array(
			true   => esc_html__( 'Enable', 'accesspress-mag' ),
			false  => esc_html__( 'Disable', 'accesspress-mag' ),
		),
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);

$imagepath =  get_template_directory_uri() . '/inc/admin-panel/images/';

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'radio-image',
		'settings'    => 'slider_layout',
		'label'       => esc_html__( 'Slider Layouts', 'accesspress-mag' ),
		'description' => esc_html__( 'Choose your slider layout as you like.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_slider',
		'default'     => 'slider_default',
		'choices'     => array(
			'slider_default' => $imagepath.'slider-default.jpg',
			'slider_highlight' => $imagepath.'slider-highlight.jpg'
		),					
		'priority'    => 20,
		'sanitize_callback'	=> 'accesspress_mag_sanitize_slider',
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'slider_post_option',
		'label'       => esc_html__( 'Slider Posts from', 'accesspress-mag' ),
		'description' => esc_html__( 'Choose option to slide posts in slider.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_slider',
		'default'     => ' ',
		'choices'     => array(
			'' => esc_html__('Latest Posts','accesspress-mag'),
			'cat' => esc_html__('Category Posts','accesspress-mag'),
		),					
		'priority'    => 30,
		'sanitize_callback'	=> 'accesspress_mag_sanitize_post_slider',

	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'select',
		'settings'    => 'homepage_slider_category',
		'label'       => esc_html__( 'Category for Slider', 'accesspress-mag' ),
		'description' => esc_html__( 'Select a category for homepage slider.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_slider',
		'priority'    => 40,
		'choices' => $options_categories,
		            	//'sanitize_callback'	=> 'accesspress_mag_sanitize_category_lists',
		'default'	=> '',
		'active_callback' => [
			[
				'setting'  => 'slider_post_option',
				'operator' => '==',
				'value'    => 'cat',
			]
		],
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'select',
		'settings'    => 'slider_highlight_category',
		'label'       => esc_html__( 'Category for Highlight Section', 'accesspress-mag' ),
		'description' => esc_html__( 'Select a category for highlight section beside slider.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_slider',
		'priority'    => 50,
		'choices' => $options_categories,
		'sanitize_callback'	=> 'accesspress_mag_sanitize_category_lists',
		'default'	=> '',
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'slider_pager',
		'label'       => esc_html__( 'Show Pager', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_slider',
		'description' => esc_html__( 'Show or hide the slider pager.', 'accesspress-mag' ),
		'default'     => true,
		'priority'    => 60,
		'choices'     => array(
			true   => esc_html__( 'Yes', 'accesspress-mag' ),
			false => esc_html__( 'No', 'accesspress-mag' ),
		),
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'slider_controls',
		'label'       => esc_html__( 'Show Controls', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_slider',
		'description' => esc_html__( 'Show or hide the slider controls.', 'accesspress-mag' ),
		'default'     => true,
		'priority'    => 70,
		'choices'     => array(
			true   => esc_html__( 'Yes', 'accesspress-mag' ),
			false => esc_html__( 'No', 'accesspress-mag' ),
		),
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'slider_auto_transition',
		'label'       => esc_html__( 'Auto Transition', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_slider',
		'description' => esc_html__( 'On or off the slider auto transition.', 'accesspress-mag' ),
		'default'     => true,
		'priority'    => 80,
		'choices'     => array(
			true   => esc_html__( 'Yes', 'accesspress-mag' ),
			false => esc_html__( 'No', 'accesspress-mag' ),
		),
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'slider',
		'settings'    => 'slider_pause',
		'label'       => esc_html__( 'Slider Pause Duration', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_slider',
		'description' => esc_html__( 'On or off the slider auto transition.', 'accesspress-mag' ),
		'default'     => 6000,
		'choices'     => [
			'min'  => 1000,
			'max'  => 6000,
			'step' => 100,
		],
		'priority'    => 90,
		'sanitize_callback'	=> 'accesspress_mag_sanitize_integer'
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'slider_info',
		'label'       => esc_html__( 'Show Title', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_slider',
		'description' => esc_html__( 'Show or hide slider`s Title/info.', 'accesspress-mag' ),
		'default'     => true,
		'priority'    => 90,
		'choices'     => array(
			true   => esc_html__( 'Yes', 'accesspress-mag' ),
			false => esc_html__( 'No', 'accesspress-mag' ),
		),
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'select',
		'settings'    => 'count_slides',
		'label'       => esc_html__( 'Number of slides', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_slider',
		'description' => esc_html__( 'Choose number of slides.', 'accesspress-mag' ),
		'default'     => true,
		'priority'    => 100,
		'choices'     => array(
			0   => esc_html__( 'Default', 'accesspress-mag' ),
			1 => esc_html__( '1', 'accesspress-mag' ),
			2 => esc_html__( '2', 'accesspress-mag' ),
			3 => esc_html__( '3', 'accesspress-mag' ),
			4 => esc_html__( '4', 'accesspress-mag' ),
			5 => esc_html__( '5', 'accesspress-mag' ),
			6 => esc_html__( '6', 'accesspress-mag' ),
		),
		'sanitize_callback'	=> 'accesspress_mag_sanitize_slides'
	)
);
Kirki::add_section( 'accesspress_mag_block', array(
	'title'          => esc_html__( 'Block Settings', 'accesspress-mag' ),
	'description'    => esc_html__( 'Setup block Settings.', 'accesspress-mag' ),
	'priority'       => 20,
	'panel'			=> 'accesspress_mag_homepage',
) 
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'select',
		'settings'    => 'featured_block_1',
		'label'       => esc_html__( 'Featured Block (First)', 'accesspress-mag' ),
		'description' => esc_html__( 'Select a category for first block in homepage.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_block',
		'priority'    => 10,
		'choices' => $options_categories,
		'sanitize_callback'	=> 'accesspress_mag_sanitize_category_lists',
		            	// 'default'	=> $defaults['featured_block_1'],
		'default'	=> '',
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'select',
		'settings'    => 'posts_for_block1',
		'label'       => esc_html__( 'Number of posts', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_block',
		'description' => esc_html__( 'Choose number of posts for block (First).', 'accesspress-mag' ),
		'default'     => true,
		'priority'    => 20,
		'choices'     => array(
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
		),
		'sanitize_callback'	=> 'accesspress_mag_sanitize_post_num'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'select',
		'settings'    => 'featured_block_2',
		'label'       => esc_html__( 'Featured Block (Second)', 'accesspress-mag' ),
		'description' => esc_html__( 'Select a category for first block in homepage.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_block',
		'priority'    => 30,
		'choices' => $options_categories,
		'sanitize_callback'	=> 'accesspress_mag_sanitize_category_lists',
		'default'	=> '',
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'select',
		'settings'    => 'posts_for_block2',
		'label'       => esc_html__( 'Number of posts', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_block',
		'description' => esc_html__( 'Choose number of posts for block (Second).', 'accesspress-mag' ),
		'default'     => true,
		'priority'    => 40,
		'choices'     => array(
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
		),
		'sanitize_callback'	=> 'accesspress_mag_sanitize_post_num'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'select',
		'settings'    => 'featured_block_3',
		'label'       => esc_html__( 'Featured Block (Third)', 'accesspress-mag' ),
		'description' => esc_html__( 'Select a category for first block in homepage.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_block',
		'priority'    => 50,
		'choices' => $options_categories,
		'sanitize_callback'	=> 'accesspress_mag_sanitize_category_lists',
		'default'	=> '',
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'select',
		'settings'    => 'posts_for_block3',
		'label'       => esc_html__( 'Number of posts', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_block',
		'description' => esc_html__( 'Choose number of posts for block (Third).', 'accesspress-mag' ),
		'default'     => true,
		'priority'    => 60,
		'choices'     => array(
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
		),
		'sanitize_callback'	=> 'accesspress_mag_sanitize_post_num'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'select',
		'settings'    => 'featured_block_4',
		'label'       => esc_html__( 'Featured Block (Fourth)', 'accesspress-mag' ),
		'description' => esc_html__( 'Select a category for first block in homepage.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_block',
		'priority'    => 70,
		'choices' => $options_categories,
		'sanitize_callback'	=> 'accesspress_mag_sanitize_category_lists',
		'default'	=> '',
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'select',
		'settings'    => 'posts_for_block4',
		'label'       => esc_html__( 'Number of posts', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_block',
		'description' => esc_html__( 'Choose number of posts for block (Fourth).', 'accesspress-mag' ),
		'default'     => true,
		'priority'    => 80,
		'choices'     => array(
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
		),
		'sanitize_callback'	=> 'accesspress_mag_sanitize_post_num'
	)
);
Kirki::add_section( 'accesspress_mag_editor', array(
	'title'          => esc_html__( 'Editor Settings', 'accesspress-mag' ),
	'description'    => esc_html__( 'Setup Editor Block Settings.', 'accesspress-mag' ),
	'priority'       => 30,
	'panel'			=> 'accesspress_mag_homepage',
) 
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'select',
		'settings'    => 'editor_pick_category',
		'label'       => esc_html__( 'Select Category', 'accesspress-mag' ),
		'description' => esc_html__( 'Select a category for editor pick in homepage sidebar.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_editor',
		'priority'    => 10,
		'choices' => $options_categories,
		'sanitize_callback'	=> 'accesspress_mag_sanitize_category_lists',
		'default'	=> '',
	)
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'select',
		'settings'    => 'posts_for_editor_pick',
		'label'       => esc_html__( 'Number of posts', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_editor',
		'description' => esc_html__( 'Choose number of posts for editor pick section.', 'accesspress-mag' ),
		'default'     => true,
		'priority'    => 20,
		'choices'     => array(
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
		),
		'sanitize_callback'	=> 'accesspress_mag_sanitize_post_num'
	)
);
Kirki::add_panel( 'accesspress_mag_post', array(
	'title'          => esc_html__( 'Post Settings', 'accesspress-mag' ),
	'description'    => esc_html__( 'Setup Post Settings.', 'accesspress-mag' ),
	'priority'       => 40,
) 
);
Kirki::add_section( 'accesspress_mag_add_settings', array(
	'title'          => esc_html__( 'ADDITIONAL SETTINGS', 'accesspress-mag' ),
	'description'    => esc_html__( 'Setup additional Settings.', 'accesspress-mag' ),
	'priority'       => 10,
	'panel'			=> 'accesspress_mag_post',
) 
);
Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'show_date_option',
		'label'       => esc_html__( 'Show Date', 'accesspress-mag' ),
		'description' => esc_html__( 'Enable or Disable the Post date.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_add_settings',
		'default'     => true,
		'priority'    => 10,
		'choices'     => array(
			true   => esc_html__( 'Enable', 'accesspress-mag' ),
			false => esc_html__( 'Disable', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'show_post_cat_op',
		'label'       => esc_html__( 'Show Post Category', 'accesspress-mag' ),
		'description' => esc_html__( 'Enable or Disable the Post Categories.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_add_settings',
		'default'     => true,
		'priority'    => 10,
		'choices'     => array(
			true   => esc_html__( 'Enable', 'accesspress-mag' ),
			false => esc_html__( 'Disable', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'featured_image',
		'label'       => esc_html__( 'Show/Hide Featured Images', 'accesspress-mag' ),
		'description' => esc_html__( 'Show or hide featured image in post`s single post.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_add_settings',
		'default'     => true,
		'priority'    => 10,
		'choices'     => array(
			true   => esc_html__( 'Enable', 'accesspress-mag' ),
			false => esc_html__( 'Disable', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'show_comment_count',
		'label'       => esc_html__( 'Show Comment Count', 'accesspress-mag' ),
		'description' => esc_html__( 'Enable or Disable comment number.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_add_settings',
		'default'     => true,
		'priority'    => 20,
		'choices'     => array(
			true   => esc_html__( 'Enable', 'accesspress-mag' ),
			false => esc_html__( 'Disable', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'show_author_name',
		'label'       => esc_html__( 'Show Author Under Title', 'accesspress-mag' ),
		'description' => esc_html__( 'Enable or Disable the author under the post title.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_add_settings',
		'default'     => true,
		'priority'    => 30,
		'choices'     => array(
			true   => esc_html__( 'Enable', 'accesspress-mag' ),
			false => esc_html__( 'Disable', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'show_tags_post',
		'label'       => esc_html__( 'Show Tags on Site', 'accesspress-mag' ),
		'description' => esc_html__( 'Enable or disable the post tags.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_add_settings',
		'default'     => true,
		'priority'    => 40,
		'choices'     => array(
			true   => esc_html__( 'Enable', 'accesspress-mag' ),
			false => esc_html__( 'Disable', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'show_author_box',
		'label'       => esc_html__( 'Show Author Box', 'accesspress-mag' ),
		'description' => esc_html__( 'Enable or disable the author box.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_add_settings',
		'default'     => true,
		'priority'    => 50,
		'choices'     => array(
			true   => esc_html__( 'Enable', 'accesspress-mag' ),
			false => esc_html__( 'Disable', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'show_post_nextprev',
		'label'       => esc_html__( 'Show Navigation in Posts', 'accesspress-mag' ),
		'description' => esc_html__( 'Enable or disable `next` and `previous` posts.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_add_settings',
		'default'     => true,
		'priority'    => 60,
		'choices'     => array(
			true   => esc_html__( 'Enable', 'accesspress-mag' ),
			false => esc_html__( 'Disable', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'show_post_nextprev',
		'label'       => esc_html__( 'Lightbox Effect', 'accesspress-mag' ),
		'description' => esc_html__( 'Enable or disable lightbox effect for galleries images.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_add_settings',
		'default'     => true,
		'priority'    => 60,
		'choices'     => array(
			true   => esc_html__( 'Enable', 'accesspress-mag' ),
			false => esc_html__( 'Disable', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);

Kirki::add_section( 'accesspress_mag_post_lay_settings', array(
	'title'          => esc_html__( 'POST LAYOUT', 'accesspress-mag' ),
	'description'    => esc_html__( 'Setup post layout Settings.', 'accesspress-mag' ),
	'priority'       => 20,
	'panel'			=> 'accesspress_mag_post',
) 
);

$imagepath =  get_template_directory_uri() . '/images/';

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'radio-image',
		'settings'    => 'global_post_template',
		'label'       => esc_html__( 'Default Post Template', 'accesspress-mag' ),
		'description' => esc_html__( 'Setting this option will make all post pages, that don\'t have a post template associated to them,to be displayed using this template. This option is OVERWRITTEN by the Post template option from the backend - post add / edit page.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_post_lay_settings',
		'default'     => 'single',
		'choices'     => array(
			'single' => $imagepath.'post-templates-icons-0.png',
			'single-style1' => $imagepath.'post-templates-icons-1.png'
		),					
		'priority'    => 10,
		'sanitize_callback'	=> 'accesspress_mag_sanitize_post_template',
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'radio-image',
		'settings'    => 'global_post_sidebar',
		'label'       => esc_html__( 'Default Post Sidebar', 'accesspress-mag' ),
		'description' => esc_html__( 'Setting this option will make all post pages, that don\'t have a post sidebar associated to them,to be displayed using this template. This option is OVERWRITTEN by the Post sidebar option from the backend - post add / edit page.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_post_lay_settings',
		'default'     => 'right-sidebar',
		'choices'     => array(
			'right-sidebar' => $imagepath.'right-sidebar.png',
			'left-sidebar' => $imagepath.'left-sidebar.png',
			'no-sidebar' => $imagepath.'no-sidebar.png'
		),					
		'priority'    => 20,
		'sanitize_callback'	=> 'accesspress_mag_sanitize_post_sidebar',
	)
);

Kirki::add_section( 'accesspress_mag_breadcrm_settings', array(
	'title'          => esc_html__( 'BREADCRUMBS', 'accesspress-mag' ),
	'description'    => esc_html__( 'Setup post breadcrumb Settings.', 'accesspress-mag' ),
	'priority'       => 30,
	'panel'			=> 'accesspress_mag_post',
) 
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'show_hide_breadcrumbs',
		'label'       => esc_html__( 'Show/Hide Breadcrumb', 'accesspress-mag' ),
		'description' => esc_html__( 'Show or hide breadcrumbs on site.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_breadcrm_settings',
		'default'     => true,
		'priority'    => 10,
		'choices'     => array(
			true   => esc_html__( 'Enable', 'accesspress-mag' ),
			false => esc_html__( 'Disable', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'show_home_link_breadcrumbs',
		'label'       => esc_html__( 'Enable link on Home', 'accesspress-mag' ),
		'description' => esc_html__( 'Enable or disable homepage link at home in breadcrumbs.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_breadcrm_settings',
		'default'     => true,
		'priority'    => 20,
		'choices'     => array(
			true   => esc_html__( 'Enable', 'accesspress-mag' ),
			false => esc_html__( 'Disable', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'show_article_breadcrumbs',
		'label'       => esc_html__( 'Enable Title on Single post', 'accesspress-mag' ),
		'description' => esc_html__( 'Show or hide article title on single post.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_breadcrm_settings',
		'default'     => true,
		'priority'    => 30,
		'choices'     => array(
			true   => esc_html__( 'Enable', 'accesspress-mag' ),
			false => esc_html__( 'Disable', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);

Kirki::add_section( 'accesspress_mag_archive_style', array(
	'title'          => esc_html__( 'Archive Style', 'accesspress-mag' ),
	'priority'       => 40,
) 
);

$imagepath =  get_template_directory_uri() . '/images/';

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'radio-image',
		'settings'    => 'global_archive_template',
		'label'       => esc_html__( 'Archive page template', 'accesspress-mag' ),
		'description' => esc_html__( 'Define - Choose template for all archive pages.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_archive_style',
		'default'     => 'archive-default',
		'choices'     => array(
			'archive-default' => $imagepath.'post-templates-icons-0.png',
			'archive-style1' => $imagepath.'post-templates-icons-1.png'
		),					
		'priority'    => 10,
		'sanitize_callback'	=> 'accesspress_mag_sanitize_ar_template',
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'radio-image',
		'settings'    => 'global_archive_sidebar',
		'label'       => esc_html__( 'Archive Page Sidebar', 'accesspress-mag' ),
		'description' => esc_html__( 'Define - Choose sidebar for all archive pages.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_archive_style',
		'default'     => 'right-sidebar',
		'choices'     => array(
			'right-sidebar' => $imagepath.'right-sidebar.png',
			'left-sidebar' => $imagepath.'left-sidebar.png',
			'no-sidebar' => $imagepath.'no-sidebar.png'
		),					
		'priority'    => 20,
		'sanitize_callback'	=> 'accesspress_mag_sanitize_post_sidebar',
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'switch',
		'settings'    => 'archive_cat',
		'label'       => esc_html__( 'Show/Hide Category', 'accesspress-mag' ),
		'description' => esc_html__( 'Show or hide category in archive page.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_archive_style',
		'default'     => true,
		'priority'    => 10,
		'choices'     => array(
			true   => esc_html__( 'Enable', 'accesspress-mag' ),
			false => esc_html__( 'Disable', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_checkbox'
	)
);

Kirki::add_section( 'accesspress_mag_excerpts_settings', array(
	'title'          => esc_html__( 'Excerpt Setting', 'accesspress-mag' ),
	'priority'       => 50,
) 
);

Kirki::add_field( 'accesspress_mag_config', [
	'type'        => 'custom',
	'settings'    => 'accesspress_mag_custom',
	'section'     => 'accesspress_mag_excerpts_settings',
	'default'     => '<div style="padding: 10px;background-color: #ddd; color: #000; border-radius: 5px;">' . esc_html__( 'Notice:Adding a text as excerpt on post edit page (Excerpt box), will overwrite the theme excerpts.', 'accesspress-mag' ) . '</div>',
	'priority'    => 10,
] );

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'radio',
		'settings'    => 'excerpt_type',
		'label'       => esc_html__( 'Excerpt Types', 'accesspress-mag' ),
		'description' => esc_html__( 'Define - Choose sidebar for all archive pages.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_excerpts_settings',
		'default'     => 'letters',
		'priority'    => 20,
		'choices'     => 
		array(
			''   => esc_html__( 'On Words', 'accesspress-mag' ),
			'letters' => esc_html__( 'On Letters', 'accesspress-mag' ),
		),					
		'sanitize_callback'	=> 'accesspress_mag_sanitize_ext_type'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'excerpt_lenght',
		'label'       => esc_html__( 'Excerpt Length', 'accesspress-mag' ),
		'description' => esc_html__( 'Define - Excerpt length of words/letters for archive pages.', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_excerpts_settings',
		'default'     => esc_html('Latest'),
		'priority'    => 20,			
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

Kirki::add_section( 'accesspress_mag_translation_settings', array(
	'title'          => esc_html__( 'Translation Settings', 'accesspress-mag' ),
	'description' => esc_html__( 'Translate Your Theme.', 'accesspress-mag' ),
	'priority'       => 60,
) 
);

Kirki::add_field( 'accesspress_mag_config', [
	'type'        => 'custom',
	'settings'    => 'accesspress_mag_custom_tran',
	'section'     => 'accesspress_mag_translation_settings',
	'default'     => '<div style="padding: 10px;background-color: #ddd; color: #000; border-radius: 5px;">' . esc_html__( 'Translate your frontend easily without any external plugins. While you leave the box empty and the theme will load the default string.', 'accesspress-mag' ) . '</div>',
	'priority'    => 10,
] );

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'trans_you_are_here',
		'label'       => esc_html__( 'You are here', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_translation_settings',
		'default'     => '',
		'priority'    => 20,			
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'trans_editor_picks',
		'label'       => esc_html__( 'Editor\'s Pick', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_translation_settings',
		'default'     => '',
		'priority'    => 30,		
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'trans_home',
		'label'       => esc_html__( 'Home', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_translation_settings',
		'default'     => '',
		'priority'    => 40,		
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'trans_search_results_for',
		'label'       => esc_html__( 'Search results for', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_translation_settings',
		'default'     => '',
		'priority'    => 50,		
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'trans_tagged',
		'label'       => esc_html__( 'Tagged', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_translation_settings',
		'default'     => '',
		'priority'    => 60,		
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'trans_next_article',
		'label'       => esc_html__( 'Next article', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_translation_settings',
		'default'     => '',
		'priority'    => 70,		
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'trans_previous_article',
		'label'       => esc_html__( 'Previous  article', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_translation_settings',
		'default'     => '',
		'priority'    => 80,		
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'trans_older_posts',
		'label'       => esc_html__( 'Older Posts', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_translation_settings',
		'default'     => '',
		'priority'    => 90,		
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'trans_newer_posts',
		'label'       => esc_html__( 'Newer Posts', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_translation_settings',
		'default'     => '',
		'priority'    => 90,		
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'trans_advertisement',
		'label'       => esc_html__( 'Advertisement', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_translation_settings',
		'default'     => '',
		'priority'    => 90,		
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'trans_search_button',
		'label'       => esc_html__( 'Search', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_translation_settings',
		'default'     => '',
		'priority'    => 90,		
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'trans_search_placeholder',
		'label'       => esc_html__( 'Search Placeholder', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_translation_settings',
		'default'     => '',
		'priority'    => 90,		
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

Kirki::add_field( 'accesspress_mag_config', 
	array(
		'type'        => 'text',
		'settings'    => 'trans_top_arrow',
		'label'       => esc_html__( 'Top arrow', 'accesspress-mag' ),
		'section'     => 'accesspress_mag_translation_settings',
		'default'     => '',
		'priority'    => 90,		
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);



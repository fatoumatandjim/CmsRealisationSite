<?php

namespace MasterAddons\Addons;

// Elementor Classes
use \Elementor\Widget_Base;
use \Elementor\Controls_Stack;
use \Elementor\Repeater;
use \Elementor\Icons_Manager;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Css_Filter;
use \Elementor\Group_Control_Background;
use \Elementor\Core\Schemes\Color;
use \Elementor\Core\Schemes\Typography;

// Master Addons Classes
use MasterAddons\Inc\Classes\Controls\Templates\Master_Addons_Template_Controls as TemplateControls;
use MasterAddons\Inc\Controls\MA_Group_Control_Transition;
use MasterAddons\Inc\Helper\Master_Addons_Helper;


/**
 * Author Name: Liton Arefin
 * Author URL : https: //jeweltheme.com
 * Date       : 05/08/2020
 */


if (!defined('ABSPATH')) exit; // If this file is called directly, abort.

class JLTMA_Toggle_Content extends Widget_Base
{

    public function get_name()
    {
        return 'jltma-toggle-content';
    }

    public function get_title()
    {
        return esc_html__('Toggle Content', JLTMA_TD);
    }

    public function get_icon()
    {
        return 'jltma-icon eicon-dual-button';
    }

    public function get_categories()
    {
        return ['master-addons'];
    }

    public function get_style_depends()
    {
        return [
            'font-awesome-5-all',
            'font-awesome-4-shim',
            'master-addons-main-style',
        ];
    }

    public function get_script_depends()
    {
        return [
            'jltma-toggle-content',
            'gsap-js'
        ];
    }

    public function get_keywords()
    {
        return [
            'content toggle',
            'toggle content',
            'content switcher',
            'switch content',
            'on/off content'
        ];
    }

    public function get_help_url()
    {
        return 'https://master-addons.com/demos/toggle-content/';
    }

    protected function register_controls()
    {

        /**
         * -------------------------------------------
         * Tab Style MA Toggle Content
         * -------------------------------------------
         */
        $this->start_controls_section(
            'jltma_toggle_content_element_settings',
            [
                'label' => esc_html__('Toggle Content', JLTMA_TD)
            ]
        );

        $repeater = new Repeater();

        $repeater->start_controls_tabs('jltma_toggle_contents_repeater');

        $repeater->start_controls_tab('jltma_toggle_contents', ['label' => esc_html__('Content', JLTMA_TD)]);

        $repeater->add_control(
            'jltma_toggle_content_text',
            [
                'default'   => '',
                'type'      => Controls_Manager::TEXT,
                'dynamic'   => ['active' => true],
                'label'     => esc_html__('Label', JLTMA_TD),
                'separator' => 'none',
            ]
        );


        // $repeater->add_control(
        //     'jltma_toggle_content_icon',
        //     [
        //         'label'					=> esc_html__( 'Icon', JLTMA_TD ),
        //         'type'					=> Controls_Manager::ICONS,
        //         'fa4compatibility'      => 'icon',
        //         'default' => [
        //             'value'     => 'fas fa-search',
        //             'library'   => 'solid',
        //         ],
        //         'label_block' 	        => false,
        //     ]
        // );

        // $repeater = new Repeater();

        $repeater->add_control(
            'jltma_toggle_content_icon',
            [
                'label'            => esc_html__('Icon', JLTMA_TD),
                'description'      => esc_html__('Please choose an icon from the list.', JLTMA_TD),
                'type'             => Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'default'          => [
                    'value'   => 'fas fa-search',
                    'library' => 'solid',
                ],
                'render_type' => 'template'
            ]
        );

        $repeater->add_control(
            'jltma_toggle_content_icon_position',
            [
                'label'       => esc_html__('Icon Position', JLTMA_TD),
                'label_block' => false,
                'type'        => Controls_Manager::SELECT,
                'default'     => 'left',
                'options'     => [
                    'left'  => esc_html__('Before', JLTMA_TD),
                    'right' => esc_html__('After', JLTMA_TD),
                ],
                'condition' => [
                    'jltma_toggle_content_fa4_icon!' => '',
                ],
            ]
        );

        $repeater->add_control(
            'jltma_toggle_content_icon_align',
            [
                'label' => esc_html__('Icon Spacing', JLTMA_TD),
                'type'  => Controls_Manager::SLIDER,
                'range' => [
                    'px'     => [
                        'max' => 50,
                    ],
                ],
                'condition'             => [
                    'jltma_toggle_content_fa4_icon!' => '',
                ],
                'selectors'             => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .jltma-icon--right' => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} {{CURRENT_ITEM}} .jltma-icon--left'  => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $repeater->add_control(
            'jltma_toggle_content_type',
            [
                'label'   => esc_html__('Type', JLTMA_TD),
                'type'    => Controls_Manager::SELECT,
                'default' => 'content',
                'options' => [
                    'content'  => esc_html__('Content', JLTMA_TD),
                    'template' => esc_html__('Template', JLTMA_TD),
                ],
            ]
        );

        $repeater->add_control(
            'jltma_toggle_content',
            [
                'label'     => esc_html__('Content', JLTMA_TD),
                'type'      => Controls_Manager::WYSIWYG,
                'dynamic'   => ['active' => true],
                'default'   => esc_html__('I am the content ready to be toggled', JLTMA_TD),
                'condition' => [
                    'jltma_toggle_content_type' => 'content',
                ],
            ]
        );

        TemplateControls::add_controls($repeater, [
            'condition' => [
                'jltma_toggle_content_type' => 'template',
            ],
            'prefix' => 'content_',
        ]);

        $repeater->end_controls_tab();

        $repeater->start_controls_tab('jltma_toggle_content_label', ['label' => esc_html__('Style', JLTMA_TD)]);

        $repeater->add_control(
            'jltma_toggle_content_text_color',
            [
                'label'     => esc_html__('Label Color', JLTMA_TD),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.jltma-toggle-content-controls__item' => 'color: {{VALUE}};',
                ],
            ]
        );


        $repeater->add_control(
            'jltma_toggle_content_text_active_color',
            [
                'label'     => esc_html__('Active Label Color', JLTMA_TD),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.jltma-toggle-content-controls__item.jltma--is-active,
                     {{WRAPPER}} {{CURRENT_ITEM}}.jltma-toggle-content-controls__item.jltma--is-active:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_control(
            'jltma_toggle_content_active_color',
            [
                'label' => esc_html__('Indicator Color', JLTMA_TD),
                'type'  => Controls_Manager::COLOR,
            ]
        );

        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        $this->add_control(
            'jltma_toggle_content_elements',
            [
                'label'   => esc_html__('Elements', JLTMA_TD),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'jltma_toggle_content_text' => esc_html__('Label One', JLTMA_TD),
                        'jltma_toggle_content'      => esc_html__('I am the content ready to be toggled', JLTMA_TD),
                    ],
                    [
                        'jltma_toggle_content_text' => esc_html__('Label Two', JLTMA_TD),
                        'jltma_toggle_content'      => esc_html__('I am the content of another element ready to be toggled', JLTMA_TD),
                    ],
                ],
                'title_field' => '{{{ jltma_toggle_content_text }}}',
            ]
        );

        $this->end_controls_section();



        /**
         * Content Tab: Toggle Settings
         */
        $this->start_controls_section(
            'jltma_toggle_content_settings',
            [
                'label' => esc_html__('Toggle Settings', JLTMA_TD),
            ]
        );

        $this->add_control(
            'jltma_toggle_content_active_index',
            [
                'label'              => esc_html__('Active Index', JLTMA_TD),
                'title'              => esc_html__('The index of the default active element.', JLTMA_TD),
                'type'               => Controls_Manager::NUMBER,
                'default'            => '1',
                'min'                => 1,
                'step'               => 1,
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'jltma_toggle_content_position',
            [
                'label'   => esc_html__('Position', JLTMA_TD),
                'type'    => Controls_Manager::SELECT,
                'default' => 'before',
                'options' => [
                    'before' => esc_html__('Before', JLTMA_TD),
                    'after'  => esc_html__('After', JLTMA_TD),
                ],
            ]
        );


        $this->add_control(
            'jltma_toggle_content_indicator_speed',
            [
                'label' => esc_html__('Indicator Speed', JLTMA_TD),
                'type'  => Controls_Manager::SLIDER,
                'range' => [
                    'px'                 => [
                        'min'  => 0.1,
                        'max'  => 2,
                        'step' => 0.1,
                    ],
                ],
                'default'                 => [
                    'size' => 0.3
                ],
                'frontend_available' => true,
            ]
        );

        $this->end_controls_section();




        /**
         * Content Tab: Toggle Style
         */
        $this->start_controls_section(
            'jltma_toggle_content_style_toggler',
            [
                'label' => esc_html__('Toggler', JLTMA_TD),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'jltma_toggle_content_toggle_style',
            [
                'label'   => esc_html__('Style', JLTMA_TD),
                'type'    => Controls_Manager::SELECT,
                'default' => 'round',
                'options' => [
                    'round'  => esc_html__('Round', JLTMA_TD),
                    'square' => esc_html__('Square', JLTMA_TD),
                ],
                'prefix_class' => 'jltma-toggle-element--',
            ]
        );

        $this->add_control(
            'jltma_toggle_content_toggle_background',
            [
                'label'     => esc_html__('Background Color', JLTMA_TD),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .jltma-toggle-content-controls-wrapper' => 'background-color: {{VALUE}};'
                ],
            ]
        );

        $this->add_responsive_control(
            'jltma_toggle_content_toggle_wrapper_radius',
            [
                'label'   => esc_html__('Border Radius', JLTMA_TD),
                'type'    => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 4,
                ],
                'range'     => [
                    'px'    => [
                        'max'  => 100,
                        'min'  => 0,
                        'step' => 1,
                    ],
                ],
                'selectors'     => [
                    '{{WRAPPER}} .jltma-toggle-content-controls-wrapper'        => 'border-radius: {{SIZE}}px;',
                ]
            ]
        );


        $this->add_responsive_control(
            'jltma_toggle_content_toggle_align',
            [
                'label'       => esc_html__('Align', JLTMA_TD),
                'label_block' => false,
                'type'        => Controls_Manager::CHOOSE,
                'options'     => [
                    'left'            => [
                        'title' => esc_html__('Left', JLTMA_TD),
                        'icon'  => 'eicon-h-align-left',
                    ],
                    'center'         => [
                        'title' => esc_html__('Center', JLTMA_TD),
                        'icon'  => 'eicon-h-align-center',
                    ],
                    'right'         => [
                        'title' => esc_html__('Right', JLTMA_TD),
                        'icon'  => 'eicon-h-align-right',
                    ],
                ],
                'default'   => 'center',
                'selectors' => [
                    '{{WRAPPER}} .jltma-toggle-content-toggle' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'jltma_toggle_content_toggle_zoom',
            [
                'label'   => esc_html__('Zoom', JLTMA_TD),
                'type'    => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 16,
                ],
                'range'     => [
                    'px'     => [
                        'max'  => 28,
                        'min'  => 12,
                        'step' => 1,
                    ],
                ],
                'selectors'     => [
                    '{{WRAPPER}} .jltma-toggle-content-controls-wrapper' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );

        // $this->add_control(
        //     'jltma_toggle_content_toggle_spacing',
        //     [
        //         'label'   => esc_html__('Spacing', JLTMA_TD),
        //         'type'    => Controls_Manager::SLIDER,
        //         'default' => [
        //             'size' => 24,
        //         ],
        //         'range'     => [
        //             'px'     => [
        //                 'max'  => 100,
        //                 'min'  => 0,
        //                 'step' => 1,
        //             ],
        //         ],
        //         'selectors'     => [
        //             '{{WRAPPER}} .jltma-toggle-content-controls-wrapper--before' => 'margin-bottom: {{SIZE}}px;',
        //             '{{WRAPPER}} .jltma-toggle-content-controls-wrapper--after'  => 'margin-top: {{SIZE}}px;',
        //         ],
        //     ]
        // );

        $this->add_responsive_control(
            'jltma_toggle_content_toggle_width',
            [
                'label' => esc_html__('Width (%)', JLTMA_TD),
                'type'  => Controls_Manager::SLIDER,
                'range' => [
                    'px'     => [
                        'max'  => 100,
                        'min'  => 0,
                        'step' => 1,
                    ],
                ],
                'selectors'     => [
                    '{{WRAPPER}} .jltma-toggle-content-controls-wrapper' => 'width: {{SIZE}}%;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'jltma_toggle_content_toggle_border',
                'label'    => esc_html__('Border', JLTMA_TD),
                'selector' => '{{WRAPPER}} .jltma-toggle-content-controls-wrapper'
            ]
        );

        $this->add_responsive_control(
            'jltma_toggle_content_toggle_radius',
            [
                'label'   => esc_html__('Border Radius', JLTMA_TD),
                'type'    => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 4,
                ],
                'range'     => [
                    'px'    => [
                        'max'  => 100,
                        'min'  => 0,
                        'step' => 1,
                    ],
                ],
                'selectors'     => [
                    '{{WRAPPER}} .jltma-toggle-content-controls-wrapper' => 'border-radius: {{SIZE}};',
                ],
                'condition' => [
                    'jltma_toggle_content_toggle_style' => 'square',
                ]
            ]
        );


        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'jltma_toggle_content_toggle',
                'selector' => '{{WRAPPER}} .jltma-toggle-content-controls-wrapper',
            ]
        );

        $this->add_control(
            'jltma_toggle_content_toggle_padding',
            [
                'label'      => esc_html__('Padding', JLTMA_TD),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default'    => [
                    'size' => 6,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .jltma-toggle-content-controls-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'jltma_toggle_content_toggle_margin',
            [
                'label'      => esc_html__('Margin', JLTMA_TD),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default'    => [
                    'size' => 6,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .jltma-toggle-content-controls-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();




        /**
         * Content Tab: Toggle Content Indicator
         */

        $this->start_controls_section(
            'jltma_toggle_content_section_style_indicator',
            [
                'label' => esc_html__('Indicator', JLTMA_TD),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'jltma_toggle_content_toggle_indicator_background',
            [
                'label'     => esc_html__('Background Color', JLTMA_TD),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .jltma-toggle-content-indicator' => 'background-color: {{VALUE}};'
                ],
            ]
        );


        $this->add_control(
            'jltma_toggle_content_indicator_height',
            [
                'label'              => esc_html__('Height', JLTMA_TD),
                'type'               => Controls_Manager::NUMBER,
                'min'                => 40,
                'step'               => 1,
                'frontend_available' => true,
                'selectors'  => [
                    '{{WRAPPER}} .jltma-toggle-content-indicator' => 'height: {{VALUE}}px !important;',
                ],
            ]
        );

        $this->add_control(
            'jltma_toggle_content_indicator_width',
            [
                'label'              => esc_html__('Width', JLTMA_TD),
                'type'               => Controls_Manager::NUMBER,
                'min'                => 20,
                'step'               => 1,
                'selectors'  => [
                    '{{WRAPPER}} .jltma-toggle-content-indicator' => 'width: {{VALUE}}px !important;',
                ],
                'frontend_available' => true,
            ]
        );


        $this->add_control(
            'jltma_toggle_content_indicator_color',
            [
                'label'              => esc_html__('Color', JLTMA_TD),
                'type'               => Controls_Manager::COLOR,
                'frontend_available' => true,
            ]
        );


        $this->add_responsive_control(
            'jltma_toggle_content_indicator_border_radius',
            [
                'label'      => esc_html__('Border Radius', JLTMA_TD),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .jltma-toggle-content-indicator' => 'border-radius: {{VALUE}}{{UNIT}} !important;',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'jltma_toggle_content_indicator',
                'selector' => '{{WRAPPER}} .jltma-toggle-content-indicator',
            ]
        );

        $this->add_control(
            'jltma_toggle_indicator_content_padding',
            [
                'label'      => esc_html__('Padding', JLTMA_TD),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .jltma-toggle-content-indicator' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );


        $this->end_controls_section();


        /**
         * Content Tab: Toggle Content Labels
         */

        $this->start_controls_section(
            'jltma_toggle_content_section_style_labels',
            [
                'label' => esc_html__('Labels', JLTMA_TD),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'jltma_toggle_content_labels_info',
            [
                'type'            => Controls_Manager::RAW_HTML,
                'raw'             => esc_html__('After adjusting some of these settings, interact with the toggler so that the position of the indicator is updated. ', JLTMA_TD),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );

        $this->add_control(
            'jltma_toggle_content_labels_stack',
            [
                'label'   => esc_html__('Stack On', JLTMA_TD),
                'type'    => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    ''        => esc_html__('None', JLTMA_TD),
                    'desktop' => esc_html__('All', JLTMA_TD),
                    'tablet'  => esc_html__('Tablet & Mobile', JLTMA_TD),
                    'mobile'  => esc_html__('Mobile', JLTMA_TD),
                ],
                'prefix_class' => 'jltma-toggle-element--stack-',
            ]
        );

        $this->add_responsive_control(
            'jltma_toggle_content_labels_align',
            [
                'label'       => esc_html__('Inline Align', JLTMA_TD),
                'description' => esc_html__('Label alignment only works if you set a custom width for the toggler.', JLTMA_TD),
                'type'        => Controls_Manager::CHOOSE,
                'options'     => [
                    'start'    => [
                        'title' => esc_html__('Left', JLTMA_TD),
                        'icon'  => 'eicon-h-align-left',
                    ],
                    'center'         => [
                        'title' => esc_html__('Center', JLTMA_TD),
                        'icon'  => 'eicon-h-align-center',
                    ],
                    'end'         => [
                        'title' => esc_html__('Right', JLTMA_TD),
                        'icon'  => 'eicon-h-align-right',
                    ],
                    'stretch'         => [
                        'title' => esc_html__('Justify', JLTMA_TD),
                        'icon'  => 'eicon-h-align-stretch',
                    ],
                ],
                'default'      => 'center',
                'prefix_class' => 'jltma-labels-align%s--',
            ]
        );

        $this->add_responsive_control(
            'jltma_toggle_content_stacked_labels_align',
            [
                'label'   => esc_html__('Stacked Align', JLTMA_TD),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'start'    => [
                        'title' => esc_html__('Left', JLTMA_TD),
                        'icon'  => 'eicon-h-align-left',
                    ],
                    'center'         => [
                        'title' => esc_html__('Center', JLTMA_TD),
                        'icon'  => 'eicon-h-align-center',
                    ],
                    'end'         => [
                        'title' => esc_html__('Right', JLTMA_TD),
                        'icon'  => 'eicon-h-align-right',
                    ],
                    'stretch'         => [
                        'title' => esc_html__('Justify', JLTMA_TD),
                        'icon'  => 'eicon-h-align-stretch',
                    ],
                ],
                'default'      => 'center',
                'prefix_class' => 'jltma-labels-align-stacked%s--',
            ]
        );

        $this->add_responsive_control(
            'jltma_toggle_content_labels_text_align',
            [
                'label'       => esc_html__('Align Label Text', JLTMA_TD),
                'description' => esc_html__('Label text alignment only works if your labels have text.', JLTMA_TD),
                'type'        => Controls_Manager::CHOOSE,
                'default'     => '',
                'options'     => Master_Addons_Helper::jltma_content_alignment(),
                'selectors'        => [
                    '{{WRAPPER}} .jltma-toggle-content-controls__item' => 'text-align: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'jltma_toggle_content_labels_typography',
                'selector' => '{{WRAPPER}} .jltma-toggle-content-controls__item',
                'exclude'  => ['font_size'],
                'scheme'   => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            MA_Group_Control_Transition::get_type(),
            [
                'name'     => 'jltma_toggle_content_labels',
                'selector' => '{{WRAPPER}} .jltma-toggle-content-controls__item',
            ]
        );

        $this->add_control(
            'jltma_toggle_content_labels_space-between',
            [
                'label'   => esc_html__('Space Between', JLTMA_TD),
                'type'    => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 24,
                ],
                'range'     => [
                    'px'     => [
                        'max'  => 1000,
                        'min'  => 0,
                        'step' => 1,
                    ],
                ],
                'selectors'     => [
                    '{{WRAPPER}} .jltma-toggle-content-controls__item:first-child' => 'margin-right: {{SIZE}}px;',
                    '{{WRAPPER}} .jltma-toggle-content-controls__item:last-child' => 'margin-left: {{SIZE}}px;',
                ],
            ]
        );

        $this->start_controls_tabs('jltma_toggle_content_labels_style');

        $this->start_controls_tab('jltma_toggle_content_labels_style_default', ['label' => esc_html__('Default', JLTMA_TD)]);

        $this->add_control(
            'labels_color',
            [
                'label'     => esc_html__('Color', JLTMA_TD),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .jltma-toggle-content-controls__item' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('jltma_toggle_content_labels_style_hover', ['label' => esc_html__('Hover', JLTMA_TD)]);

        $this->add_control(
            'jltma_toggle_content_labels_color_hover',
            [
                'label'     => esc_html__('Color', JLTMA_TD),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .jltma-toggle-content-controls__item:hover' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('jltma_toggle_content_labels_style_active', ['label' => esc_html__('Active', JLTMA_TD)]);

        $this->add_control(
            'jltma_toggle_content_labels_color_active',
            [
                'label'     => esc_html__('Color', JLTMA_TD),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .jltma-toggle-content-controls__item.jltma--is-active,
							 {{WRAPPER}} .jltma-toggle-content-controls__item.jltma--is-active:hover' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();



        /**
         * Content Tab: Toggle Content
         */

        $this->start_controls_section(
            'jltma_toggle_content_section_style_content',
            [
                'label' => esc_html__('Content', JLTMA_TD),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'jltma_toggle_content_typography',
                'selector' => '{{WRAPPER}} .jltma-toggle-content-element',
                'scheme'   => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_control(
            'jltma_toggle_content_padding',
            [
                'label'      => esc_html__('Padding', JLTMA_TD),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .jltma-toggle-content-element' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'jltma_toggle_content_margin',
            [
                'label'      => esc_html__('Margin', JLTMA_TD),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .jltma-toggle-content-element' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'jltma_toggle_content_border',
                'label'    => esc_html__('Border', JLTMA_TD),
                'selector' => '{{WRAPPER}} .jltma-toggle-content-element',
            ]
        );

        $this->add_responsive_control(
            'jltma_toggle_content_border_radius',
            [
                'label' => esc_html__('Border Radius', JLTMA_TD),
                'type'  => Controls_Manager::SLIDER,
                'range' => [
                    'px'     => [
                        'max'  => 10,
                        'min'  => 0,
                        'step' => 1,
                    ],
                ],
                'selectors'     => [
                    '{{WRAPPER}} .jltma-toggle-content-element' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
            'jltma_toggle_content_foreground',
            [
                'label'     => esc_html__('Color', JLTMA_TD),
                'type'      => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .jltma-toggle-content-element' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'jltma_toggle_content_background',
                'selector' => '{{WRAPPER}} .jltma-toggle-content-element',
                'types'    => ['classic', 'gradient'],
                'default'  => 'classic',
            ]
        );

        $this->end_controls_section();



        /**
         * Content Tab: Docs Links
         */
        $this->start_controls_section(
            'jltma_section_help_docs',
            [
                'label' => esc_html__('Help Docs', JLTMA_TD),
            ]
        );


        $this->add_control(
            'help_doc_1',
            [
                'type'            => Controls_Manager::RAW_HTML,
                'raw'             => sprintf(esc_html__('%1$s Live Demo %2$s', JLTMA_TD), '<a href="https://master-addons.com/demos/tabs/" target="_blank" rel="noopener">', '</a>'),
                'content_classes' => 'jltma-editor-doc-links',
            ]
        );

        $this->add_control(
            'help_doc_2',
            [
                'type'            => Controls_Manager::RAW_HTML,
                'raw'             => sprintf(esc_html__('%1$s Documentation %2$s', JLTMA_TD), '<a href="https://master-addons.com/docs/addons/tabs-element/?utm_source=widget&utm_medium=panel&utm_campaign=dashboard" target="_blank" rel="noopener">', '</a>'),
                'content_classes' => 'jltma-editor-doc-links',
            ]
        );

        $this->add_control(
            'help_doc_3',
            [
                'type'            => Controls_Manager::RAW_HTML,
                'raw'             => sprintf(esc_html__('%1$s Watch Video Tutorial %2$s', JLTMA_TD), '<a href="https://www.youtube.com/watch?v=lsqGmIrdahw" target="_blank" rel="noopener">', '</a>'),
                'content_classes' => 'jltma-editor-doc-links',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute([
            'wrapper' => [
                'class' => [
                    'jltma-toggle-element',
                    'jltma-toggle-content',
                ],
            ],
            'toggle' => [
                'class' => [
                    'jltma-toggle-content-toggle',
                ],
            ],
            'controls-wrapper' => [
                'class' => [
                    'jltma-toggle-content-controls-wrapper',
                    'jltma-toggle-content-controls-wrapper--' . $settings['jltma_toggle_content_position'],
                ],
            ],
            'indicator' => [
                'class' => [
                    'jltma-toggle-content-indicator',
                ],
            ],
            'controls' => [
                'class' => [
                    'jltma-toggle-content-controls',
                ],
            ],
            'elements' => [
                'class' => [
                    'jltma-toggle-content-elements',
                ],
            ],
        ]);

?>
        <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
            <div <?php echo $this->get_render_attribute_string('toggle'); ?>>

                <?php if ('before' === $settings['jltma_toggle_content_position']) $this->render_toggle(); ?>

                <div <?php echo $this->get_render_attribute_string('jltma_toggle_content_elements'); ?>>
                    <?php foreach ($settings['jltma_toggle_content_elements'] as $index => $item) {
                        $element_key = $this->get_repeater_setting_key('element', 'jltma_toggle_content_elements', $index);

                        $this->add_render_attribute($element_key, [
                            'class' => [
                                'jltma-toggle-content-element',
                                'elementor-repeater-item-' . $item['_id'],
                            ]
                        ]);

                    ?><div <?php echo $this->get_render_attribute_string($element_key); ?>>
                            <?php
                            switch ($item['jltma_toggle_content_type']) {
                                case 'content':
                                    $this->render_text($index, $item);
                                    break;
                                case 'template':
                                    $template_key = 'content_' . $item['content_template_type'] . '_template_id';
                                    if (array_key_exists($template_key, $item))
                                        TemplateControls::render_template_content($item[$template_key]);
                                    break;
                                default:
                                    break;
                            }
                            ?></div>
                    <?php } ?>
                </div>
                <?php if ('after' === $settings['jltma_toggle_content_position']) $this->render_toggle(); ?>
            </div>
        </div>
    <?php
    }



    public function render_toggle()
    {
        $settings = $this->get_settings_for_display();
    ?>
        <div <?php echo $this->get_render_attribute_string('controls-wrapper'); ?>>
            <div <?php echo $this->get_render_attribute_string('indicator'); ?>></div>

            <?php if ($settings['jltma_toggle_content_elements']) { ?>

                <ul <?php echo $this->get_render_attribute_string('controls'); ?>>
                    <?php
                    foreach ($settings['jltma_toggle_content_elements'] as $index => $item) {
                        $control_key      = $this->get_repeater_setting_key('control', 'jltma_toggle_content_elements', $index);
                        $control_text_key = $this->get_repeater_setting_key('control-text', 'jltma_toggle_content_elements', $index);

                        $has_icon = !empty($item['icon']) || !empty($item['jltma_toggle_content_icon']['value']);

                        $this->add_render_attribute([
                            $control_key => [
                                'class' => [
                                    'jltma-toggle-content-controls__item',
                                    'elementor-repeater-item-' . $item['_id'],
                                ]
                            ],
                            $control_text_key => [
                                'class'        => 'jltma-toggle-content-controls__text',
                                'unselectable' => 'on',
                            ],
                        ]);

                        if ('' !== $item['jltma_toggle_content_active_color']) {
                            $this->add_render_attribute($control_key, 'data-color', $item['jltma_toggle_content_active_color']);
                        }

                        if (!empty($item['jltma_toggle_content_text'])) {
                            $this->add_render_attribute($control_key, 'class', 'jltma--is-empty');
                        }

                    ?>
                        <li <?php echo $this->get_render_attribute_string($control_key); ?>>
                            <?php

                            if ($has_icon) {
                                $this->render_toggle_item_icon($index, $item);
                            }

                            if (!empty($item['jltma_toggle_content_text']) && !$has_icon) {
                            ?>
                                <span <?php echo $this->get_render_attribute_string($control_text_key); ?>>
                                <?php }

                            if (!empty($item['jltma_toggle_content_text'])) {
                                echo $item['jltma_toggle_content_text'];
                            } else if (!$has_icon) {
                                echo '&nbsp;';
                            }

                            if (!empty($item['jltma_toggle_content_text']) && !$has_icon) {
                                ?>
                                </span>
                            <?php } ?>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            <?php } ?>
        </div>
    <?php
    }


    public function render_toggle_item_icon($index, $item)
    {
        $icon_key = $this->get_repeater_setting_key('icon', 'jltma_toggle_content_elements', $index);

        $migrated = isset($item['__fa4_migrated']['jltma_toggle_content_icon']);
        $is_new   = empty($item['icon']) && Icons_Manager::is_migration_allowed();

        // $icon_migrated = isset($settings['__fa4_migrated']['jltma_search_icon']);
        // $icon_is_new = empty($settings['jltma_search_icon_new']);

        $this->add_render_attribute($icon_key, 'class', [
            'jltma-toggle-content-controls__icon',
            'jltma-icon',
            'jltma-icon-support--svg'
        ]);

        if ('' === $item['jltma_toggle_content_text']) {
            $this->add_render_attribute($icon_key, 'class', [
                'jltma-icon--flush',
            ]);
        }

    ?>
        <span <?php echo $this->get_render_attribute_string($icon_key); ?>>
            <?php Master_Addons_Helper::jltma_fa_icon_picker('fas fa-search', 'icon', $item['jltma_toggle_content_icon'], 'jltma_toggle_content_icon'); ?>
        </span>
<?php
    }

    protected function render_text($index, $item)
    {
        echo $this->parse_text_editor($item['jltma_toggle_content']);
    }

    protected function content_template()
    {
    }
}

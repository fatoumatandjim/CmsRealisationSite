<?php

namespace MasterAddons\Modules;

use \Elementor\Controls_Manager;

/**
 * Author Name: Liton Arefin
 * Author URL: https://jeweltheme.com
 * Date: 6/5/2021
 */

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly.

class JLTMA_Extension_Icons_Manager
{

    /*
	* Instance of this class
	*/
    private static $instance = null;

    public function __construct()
    {
        // Add new Icons to Icons Manager
        // if (is_admin()) {
        add_filter('elementor/icons_manager/additional_tabs', [$this, 'jltma_add_icons_manager_tab']);
        // }
    }

    // Add Section Controls
    public function jltma_add_icons_manager_tab($tabs)
    {
        // Adds Icons Library options

        $tabs['elementor-icons'] = [
            'name'          => 'elementor-icons',
            'label'         => __('Elementor Icons', JLTMA_TD),
            'url'           => JLTMA_ASSETS . 'fonts/elementor-icon/elementor-icons.min.css',
            'enqueue'       => [JLTMA_ASSETS . 'fonts/elementor-icon/elementor-icons.min.css'],
            'prefix'        => 'icon-',
            'displayPrefix' => 'elementor-icons',
            'labelIcon'     => 'jltma jltma-logo elementor-icons eicon-elementor-circle jltma-font-manager',
            'ver'           => JLTMA_VER,
            'fetchJson'     => JLTMA_ASSETS . 'fonts/elementor-icon/elementor-icons.js?v=' . JLTMA_VER,
            'native'        => false,
        ];

        $tabs['feather-icons'] = [
            'name'          => 'feather-icons',
            'label'         => __('Feather Icons', JLTMA_TD),
            'url'           => JLTMA_ASSETS . 'fonts/feather-icon/feather-icon-style.min.css',
            'enqueue'       => [JLTMA_ASSETS . 'fonts/feather-icon/feather-icon-style.min.css'],
            'prefix'        => 'icon-',
            'displayPrefix' => 'feather',
            'labelIcon'     => 'jltma jltma-logo feather icon-feather jltma-font-manager',
            'ver'           => JLTMA_VER,
            'fetchJson'     => JLTMA_ASSETS . 'fonts/feather-icon/feather-icons.js?v=' . JLTMA_VER,
            'native'        => false,
        ];

        $tabs['remix-icons'] = [
            'name'          => 'remix-icons',
            'label'         => __('Remix Icons', JLTMA_TD),
            'url'           => JLTMA_ASSETS . 'fonts/remix-icon/remixicon.min.css',
            'enqueue'       => [JLTMA_ASSETS . 'fonts/remix-icon/remixicon.min.css'],
            'prefix'        => 'ri-',
            'displayPrefix' => 'remixicon',
            'labelIcon'     => 'jltma jltma-logo remixicon ri-remixicon-fill jltma-font-manager',
            'ver'           => JLTMA_VER,
            'fetchJson'     => JLTMA_ASSETS . 'fonts/remix-icon/remix-icon.js?v=' . JLTMA_VER,
            'native'        => false,
        ];

        $tabs['teeny-icons'] = [
            'name'          => 'teeny-icons',
            'label'         => __('Teeny Icons', JLTMA_TD),
            'url'           => JLTMA_ASSETS . 'fonts/teeny-icon/teeny-icon-style.min.css',
            'enqueue'       => [JLTMA_ASSETS . 'fonts/teeny-icon/teeny-icon-style.min.css'],
            'prefix'        => 'ti-',
            'displayPrefix' => 'teenyicon',
            'labelIcon'     => 'jltma jltma-logo teenyicon ti-mood-laugh jltma-font-manager',
            'ver'           => JLTMA_VER,
            'fetchJson'     => JLTMA_ASSETS . 'fonts/teeny-icon/teeny-icon.js?v=' . JLTMA_VER,
            'native'        => false,
        ];
        return $tabs;
    }


    public static function get_instance()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}

JLTMA_Extension_Icons_Manager::get_instance();

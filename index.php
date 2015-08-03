<?php

/**
 * Plugin Name: Toaster Widget by Duo Leaf
 * Plugin URI: http://DuoLeaf.com/toaster-widget-wordpress-plugin/
 * Version: 1.0.3
 * Author: Duo Leaf
 * Author URI: http://DuoLeaf.com/
 * Description: This plugin creates a widget area on the bottom right corner of your site, with a 'toaster' like effect.
 * License: GPLv3 or later
 */
class dl_tw_ToasterWidget {

    /** @var dl_tw_PluginInfo */
    public $pluginInfo;

    /**
     * Constructor
     */
    public function __construct($pluginInfo) {

        $this->pluginInfo = $pluginInfo;

        require_once(WP_PLUGIN_DIR . '/' . $this->pluginInfo->name . '/core/settings.php');


        add_action('admin_menu', array(&$this, 'adminPanelsAndMetaBoxes'));
        add_action('wp_enqueue_scripts', array(&$this, 'enqueueScriptsECss'));
        add_action('admin_enqueue_scripts', array(&$this, 'adminEnqueueScripts'));
        
        
        add_action('widgets_init', array(&$this, 'widgetInit'));
        add_action('wp_footer', array(&$this, 'widgetInject'));
    }

    function adminPanelsAndMetaBoxes() {
        add_submenu_page('options-general.php', $this->pluginInfo->displayName, $this->pluginInfo->displayName, 'manage_options', $this->pluginInfo->name, array(&$this, 'adminPanel'));
    }

    function adminPanel() {
        $this->view = new stdClass();


        if (isset($_POST['submit'])) {
            $settings = new dl_tw_Settings();

            $settings->title = $_POST['title'];
            $settings->width = $_POST['width'];
            $settings->titleHeight = $_POST['titleHeight'];
            $settings->contentHeight = $_POST['contentHeight'];

            $settings->save();
        }

        require(WP_PLUGIN_DIR . '/' . $this->pluginInfo->name . '/actions/settings.php');
    }

    public function widgetInit() {

        $settings = new dl_tw_Settings();

        register_sidebar(array(
            'name' => 'Toaster Widget',
            'id' => 'toaster-widget',
            'before_widget' => '<div class=\'toaster-container\'><div class=\'toaster-title\'>' . $settings->title . '<span class=\'toaster-arrow-up\'></span></div><div class=\'toaster-content\'>',
            'after_widget' => '</div></div>',
            'before_title' => '',
            'after_title' => '',
        ));
    }

    public function widgetInject() {

        $settings = new dl_tw_Settings();

        echo '<style>.toaster-container{ width: ' . $settings->width . 'px; height: ' . $settings->titleHeight . 'px;}</style>';
        echo '<script>var toasterHeightOpened = \'' . ($settings->contentHeight + $settings->titleHeight) . 'px\'; var toasterHeightClosed = \'' . $settings->titleHeight . 'px\';</script>';

        if (is_active_sidebar('toaster-widget')) {
            dynamic_sidebar('toaster-widget');
        }
    }

    public function enqueueScriptsECss() {
        wp_register_script('dl_fw_javascript', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/js/script.js', array('jquery'), NULL, true);
        wp_enqueue_script('dl_fw_javascript');

        wp_enqueue_style('dl_fw_css', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/css/styles.css', array(), null, 'all');
        wp_enqueue_script('dl_fw_css');
    }

    function adminEnqueueScripts() {
        wp_register_script('dl_twa_customJS', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/js/custom.js', array('jquery'), NULL);
        wp_enqueue_script('dl_twa_customJS');
        wp_register_script('dl_twa_bootstrap', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/js/bootstrap.min.js', array('jquery'), NULL);
        wp_enqueue_script('dl_twa_bootstrap');

        wp_enqueue_style('dl_twa_css_custom', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/css/custom.css', array(), null, 'all');
        wp_enqueue_script('dl_twa_css_custom');
        wp_enqueue_style('dl_twa_css_bootstrap', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/css/bootstrap-iso.css', array(), null, 'all');
        wp_enqueue_script('dl_twa_css_bootstrap');
        wp_enqueue_style('dl_twa_css_bootstrap_theme', WP_PLUGIN_URL . '/' . $this->pluginInfo->name . '/assets/css/bootstrap-theme.css', array(), null, 'all');
        wp_enqueue_script('dl_twa_css_bootstrap_theme');
    }

}

require_once(WP_PLUGIN_DIR . '/toaster-widget-by-duo-leaf/core/plugin-info.php');
$dl_tw_pluginInfo = new dl_tw_PluginInfo();
$dl_tw_toasterWidget = new dl_tw_ToasterWidget($dl_tw_pluginInfo);

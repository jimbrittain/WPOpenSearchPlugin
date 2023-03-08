<?php
/*
 * Plugin Name: WPOpenSearch Plugin
 * Description: Creates an Open Search Description for the Wordpress Site
 * Version: 0.2
 * Text Domain: WPOpenSearchPlugin
 * Author: Immature Dawn
 * Author URI: http://immaturedawn.co.uk
*/
if (!class_exists('WPOpenSearchPlugin') && function_exists('get_bloginfo')) {
    class WPOpenSearchPlugin 
    {
        public static $_url = '';
        public static $_enabled;

        public function __construct()
        {
            self::_dependencies();
        }
        public function _dependencies()
        {
            if (function_exists('add_action')) {
                add_action('wp_head', 'WPOpenSearchPlugin::writeLinkTag');
            }
        }
        public static function activate()
        {
            self::$_enabled = true;
            return true;
        }
        public static function deactivate()
        {
            self::$_enabled = false;
            return true;
        }
        public static function uninstall()
        {
            return true;
        }
        public static function isEnabled()
        {
            return true;
        }
        public static function getUrl()
        {
            if (empty(self::$_url)) {
                self::$_url = plugin_dir_url(__FILE__).'opensearchdescription.php';
            }
            return self::$_url;
        }
        public static function viewLinkTag()
        {
            $str = '';
            if (self::isEnabled()) {
                //phpcs:disable
                $n = __('Site Search', 'WPOpenSearchPlugin');
                $str .= '<link rel="profile" src="http://a9.com/-/spec/opensearch/1.1/" />';
                $str .= '<link rel="search" type="application/opensearchdescription+xml" href="'.self::getUrl().'" title="'.$n.'" />';
                //phpcs:enable
            }
            return $str;
        }
        public static function writeLinkTag()
        {
            echo self::viewLinkTag();
        }
    }
}
if (class_exists('WPOpenSearchPlugin')) {
    $v = new WPOpenSearchPlugin();
    register_activation_hook(__FILE__, 'WPOpenSearchPlugin::activate');
    register_deactivation_hook(__FILE__, 'WPOpenSearchPlugin::deactivate');
    register_uninstall_hook(__FILE__, 'WPOpenSearchPlugin::uninstall');
}

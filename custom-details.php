<?php
/**
 * Plugin Name:       Easy Digital Downloads - Customer Profiles
 * Plugin URI:        https://Customer_Profiles.com
 * Description:       Handle the basics with this plugin.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Nazmul Hasan
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       customer-profiles
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    return;
}

/**
 * The main plugin class.
 */
final class Customer_Profiles {

    const version = '1.0';

    /**
     * Class constructor.
     */
    private function __construct() {

        $this->define_constants();
        $this->includes();

        add_action( 'plugins_loaded', [ $this, 'load_plugin_textdomain' ] );
        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Load customer-profiles textdomain.
     */
    public function load_plugin_textdomain() {
        load_plugin_textdomain( 'customer-profiles' );
    }

    /**
     * Initializes a singleton instance.
     *
     * @return \Customer_Profiles classes.
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Pre defined constance.
     */
    public function define_constants() {
        define( 'Customer_Profiles_VERSION', self::version );
        define( 'Customer_Profiles_FILE', __FILE__ );
        define( 'Customer_Profiles_PATH', __DIR__ );
        define( 'Customer_Profiles_URL', plugins_url( '', Customer_Profiles_FILE ) );
        define( 'Customer_Profiles_ASSETS', Customer_Profiles_URL . '/assets' );
    }
    
    /**
     * Included files.
     */
    public function includes() {

        require_once __DIR__ . '/includes/assets.php';
        require_once __DIR__ . '/includes/menu.php';
        require_once __DIR__ . '/includes/customer-list.php';
        require_once __DIR__ . '/includes/functions.php';

    }


    /**
     * Initializes the plugin.
     *
     * @param void
     */
    public function init_plugin() {
        
        if ( is_admin() ) {
            new Customer_Profiles\Assets;
            new Customer_Profiles\Menu();
            new Customer_Profiles\Functions();
        }
    }

}

/**
 * Initializes the main plugin.
 * @return \Customer_Profiles
 */
function Customer_Profiles() {
    return Customer_Profiles::init();
}

//Kick off the plugin.
Customer_Profiles();
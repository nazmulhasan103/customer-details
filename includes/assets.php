<?php
/**
 * @author  Customer_Profiles
 * @since   1.0
 * @version 1.0
 */

namespace Customer_Profiles;

/**
 * Assets handler class
 */
class Assets {

    /**
     * Initializes the class
     */
    function __construct() {
        add_action( 'admin_enqueue_scripts', [ $this, 'register_scripts' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
    }

    public function register_scripts () {

        wp_register_style( 'customer-profiles-style', Customer_Profiles_ASSETS . '/css/main.css', false, filemtime( Customer_Profiles_PATH . '/assets/css/main.css' ) );

        wp_register_script( 'customer-profiles-script', Customer_Profiles_ASSETS . '/js/main.js', false, filemtime( Customer_Profiles_PATH . '/assets/js/main.js' ), true );

    }

    public function enqueue_scripts () {

        wp_enqueue_style( 'customer-profiles-style' );

        wp_enqueue_script( 'customer-profiles-script' );

    }
}

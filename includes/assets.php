<?php
/**
 * @author  Customer_Details
 * @since   1.0
 * @version 1.0
 */

namespace Customer_Details;

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

        wp_register_style( 'customer-details-style', Customer_Details_ASSETS . '/css/main.css', false, filemtime( Customer_Details_PATH . '/assets/css/main.css' ) );

        wp_register_script( 'customer-details-script', Customer_Details_ASSETS . '/js/main.js', false, filemtime( Customer_Details_PATH . '/assets/js/main.js' ), true );

    }

    public function enqueue_scripts () {

        wp_enqueue_style( 'customer-details-style' );

        wp_enqueue_script( 'customer-details-script' );

    }
}
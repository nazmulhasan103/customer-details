<?php
/**
 * @author  Customer_Profiles
 * @since   1.0
 * @version 1.0
 */

namespace Customer_Profiles;

use Customer_Profiles_Info;

/**
 * The admin class
 */
class Menu {

    function __construct() {
        add_action( 'admin_menu', [ $this,'admin_menu' ] );
    }

    public function admin_menu() {

        $parent_slug = 'edit.php?post_type=download';
        $page_title  = 'customer-profiles';
        $menu_title  = __( 'Customer Details', 'Customer_Profiles' );
        $capability  = apply_filters( 'edd_view_customers_role', 'view_shop_reports' );
        $menu_slug   = 'customer-profiles';

        add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, [ $this, 'menu_callback' ], 6 );
    }

    public function menu_callback() {
    
        $customers_table = new Customer_Profiles_Info();
        $customers_table->prepare_items();
        ?>

        <div class="wrap">

            
            <?php do_action( 'edd_customers_table_top' ); ?>
            
            <form id="edd-customers-filter" method="get" action="<?php echo admin_url( 'edit.php?post_type=download&page=edd-customers' ); ?>">

                <h1 class="customer-profiles-title"><?php _e( 'Customers Details', 'customer-profiles' ); ?></h1>

                <?php
                $customers_table->search_box( __( 'Search Customer Name', 'customer-profiles' ), 'edd-customers' );
                $customers_table->display();
                ?>

                <input type="hidden" name="post_type" value="download" />
                <input type="hidden" name="page" value="edd-customers" />
                <input type="hidden" name="view" value="customers" />

            </form>

            <?php do_action( 'edd_customers_table_bottom' ); ?>
        </div>
        <?php
    }

}

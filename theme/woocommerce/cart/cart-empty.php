<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();


?>


<div class="container desktop-wrapper">
<div class="row">
<div class="col-md-12">
<div id="main-wrapper">

<div class="text-center">

<p class="cart-empty"><?php _e( 'Your bag is currently empty.', 'woocommerce' ) ?></p>

<div class="empty-bag"><img src ="<?php echo get_template_directory_uri(); ?>/images/emptybag.png" /></div>

<?php do_action( 'woocommerce_cart_is_empty' ); ?>

<a href="<?php echo get_permalink( get_page_by_path( 'products' ) ); ?>"><button type="button" class="btn return-to-shop">CONTINUE SHOPPING</button></a>

</div>
<!--<p class="return-to-shop"><a class="button wc-backward" href="<?php //echo apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ); ?>"><?php //_e( 'Return To Shop', 'woocommerce' ) ?></a></p>-->

</div>
</div><!--col-md-12-->
</div><!--row-->
</div>

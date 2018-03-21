<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( $order ) : ?>


<div class="container desktop-wrapper">
<div class="row">
<div class="col-md-12">

<div id="main-wrapper" class="thank-you-body">
	<?php if ( $order->has_status( 'failed' ) ) : ?>

		<p><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'woocommerce' ); ?></p>

		<p><?php
			if ( is_user_logged_in() )
				_e( 'Please attempt your purchase again or go to your account page.', 'woocommerce' );
			else
				_e( 'Please attempt your purchase again.', 'woocommerce' );
		?></p>

		<p>
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
			<?php if ( is_user_logged_in() ) : ?>
			<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My Account', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</p>

	<?php else : ?>

		<span class="thank-you"><?php echo 'Thank you!' ?></span><a href="<?php echo get_permalink( get_page_by_path( 'products' ) )?>" class="button shop-more">SHOP MORE</a>
		<p class="orders"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Your order has been received. Kindly check your email for further instructions and/or your receipt.', 'woocommerce' ), $order ); ?></p>

		<div class="order_details">
			<div class="col-md-3 order">
				<h3 class="order-header"><?php _e( 'ORDER NUMBER', 'woocommerce' ); ?></h3>
				<p class="orders"><?php echo $order->get_order_number(); ?></p>
			</div>
			<div class="col-md-3 date">
				<h3 class="order-header"><?php _e( 'ORDER DATE', 'woocommerce' ); ?></h3>
				<p class="orders"><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></p>
			</div>
			<div class="col-md-3 total">
				<h3 class="order-header"><?php _e( 'TOTAL', 'woocommerce' ); ?></h3>
				<p class="orders"><?php echo $order->get_formatted_order_total(); ?></p>
			</div>
			<?php if ( $order->payment_method_title ) : ?>
			<div class="col-md-3 method">
				<h3 class="order-header"><?php _e( 'PAYMENT METHOD', 'woocommerce' ); ?></h3>
				<p class="orders"><?php echo $order->payment_method_title; ?></p>
			</div>
			<?php endif; ?>
		</div>
		<div class="clear"></div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
	<?php do_action( 'woocommerce_thankyou', $order->id ); ?>
	
<?php else : ?>

	<p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

<?php endif; ?>

</div>
</div>
</div>
</div>
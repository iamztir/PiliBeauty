<?php
/**
 * Order tracking form
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header();

global $post;

?>

<div class="container desktop-wrapper">
<div class="row">
<div class="col-md-12">
<div id="order-tracking-wrapper">

	<div class="shopping-header text-center"><span>TRACK YOUR ORDER</span></div>

	<div class="order-tracking-body">

	<form action="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" method="post" class="track_order">

		<p class="order-tracking"><?php _e( 'To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.', 'woocommerce' ); ?></p>

		<p class="form-row tracking-name"><label for="orderid"><?php _e( 'Order ID', 'woocommerce' ); ?></label> <input class="input-text" type="text" name="orderid" id="orderid" placeholder="<?php _e( 'Found in your order confirmation email.', 'woocommerce' ); ?>" /></p>
		<p class="form-row tracking-name"><label for="order_email"><?php _e( 'Email Address', 'woocommerce' ); ?></label> <input class="input-text" type="text" name="order_email" id="order_email" placeholder="<?php _e( 'Email you used during checkout.', 'woocommerce' ); ?>" /></p>
		<div class="clear"></div>

		<p class="form-row tracking-name"><input type="submit" class="button" name="track" value="<?php _e( 'TRACK', 'woocommerce' ); ?>" /></p>
		<?php wp_nonce_field( 'woocommerce-order_tracking' ); ?>
		
		<p class="contact-note"><?php echo 'For any inquiries, don&rsquo;t hesistate to ' ?><a href="<?php echo get_permalink( get_page_by_path( 'contact-us' ) );?>">CONTACT US</a> </p>

	</form>

	</div>

</div>
</div>
</div>
</div>

<?php get_footer(); ?>
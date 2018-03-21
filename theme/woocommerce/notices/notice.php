<?php
/**
 * Show messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! $messages ){
	return;
}

?>
<style>
.woocommerce .woocommerce-error, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message{margin: 0 !important;}

</style>

<?php foreach ( $messages as $message ) : ?>
	<div class="woocommerce-info"><?php echo wp_kses_post( $message ); ?>
	<div class="pull-right"><button class="button_remove remove-info"><span class="message-close">&#x2573;</span></button></div>
	</div>
<?php endforeach; ?>
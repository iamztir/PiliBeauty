<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<style>

.table.mini-cart-table td.product-name dl.variation,
.table.mini-cart-table td.product-name dl.variation dd p{color: #59a0a8 !important;}

.woocommerce a.remove{color: #59A0A9 !important;}
.woocommerce a.remove span{font-size: 18px;}

.empty-cart{padding: 30px 0 !important;}
.shopnow{padding: 20px 0 !important;}
.shopnow a.shop-now{padding: 10px 60px !important;}

</style>



<?php do_action( 'woocommerce_before_mini_cart' ); ?>

<div class="shopping-bag <?php echo $args['list_class']; ?>">

<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

<table class="cart_list product_list_widget mini-cart-table table">
	<thead>
		<tr>
			<td class="mini-cart-name product-name"><?php _e( 'ITEM', 'woocommerce' ); ?></td>
			<td class="mini-cart-name product-quantity"><?php _e( 'QTY', 'woocommerce' ); ?></td>
			<td class="mini-cart-name product-subtotal"><?php _e( 'AMT', 'woocommerce' ); ?></td>
			<td class="mini-cart-name product-remove">&nbsp;</td>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
				
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

					$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					?>

		
						<td class="mini-cart-data product-name">
							<?php //if ( ! $_product->is_visible() ) : ?>
								<?php //echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . $product_name . '&nbsp;'; ?>
							<?php //else : ?>
								<!--<a href="<?php //echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
									<?php //echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . $product_name . '&nbsp;'; ?>
								</a>-->
							<?php //endif; ?>
							
							<?php if ( ! $_product->is_visible() ) {
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s </a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
							}

							// Meta data
							echo WC()->cart->get_item_data( $cart_item );
							?>
							
						</td>
						<td class="mini-cart-data product-quantity">
						
							<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
						</td>
						
						<td class="mini-cart-data product-subtotal">
						<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
							?>
						
						</td>
						<td class="mini-cart-data product-remove">
							<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s"><span class="glyphicon glyphicon-trash"></span></a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key ); ?>
						</td>
					</tr>
					<?php
				}
			}
		?>

	<?php else : ?>

		<div class="empty-cart">
			<div class="bag-empty" style="text-align:center;"><span class="empty"><?php _e( 'Your Bag is currently empty', 'woocommerce' ); ?></span></div>
			<div class="shopnow" style="text-align:center;"><a href="<?php echo get_permalink( get_page_by_path( 'products' ) )?>" class="button shop-now">SHOP NOW</a></div>
		</div>
		

	<?php endif; ?>
</tbody>
</table><!-- end table -->

</div>
<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

	<div class="mini-cart-total"><p class="total"><strong><?php _e( 'TOTAL', 'woocommerce' ); ?></strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p></div>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<div class="mini-cart-buttons">
	<p class="buttons">
		<a href="<?php echo WC()->cart->get_cart_url(); ?>" class="button wc-forward"><?php _e( 'View Cart', 'woocommerce' ); ?></a>
		<a href="<?php echo WC()->cart->get_checkout_url(); ?>" class="button checkout wc-forward"><?php _e( 'Checkout', 'woocommerce' ); ?></a>
	</p>
	</div>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
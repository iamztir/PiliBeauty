<?php
/**
 * Single Product title
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<div class="product-top-details">
	<div class="product-title">
		<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>
	</div>
	<div class="product-price">
		<p><?php echo $product->get_price_html(); ?></p>
	</div>
	<?php echo do_shortcode('[do_widget_area]'); ?>
	<div style="clear:both;"></div>
</div>


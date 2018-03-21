<?php
/**
 * Description tab
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

$heading = esc_html( apply_filters( 'woocommerce_product_description_heading', __( 'Product Description', 'woocommerce' ) ) );

?>

<style>
.product-top-details .product-price {
	font-size: 20px;
	color: #159a90;
}
.amount {
	font-family: 'cantarellregular';
	color: #159a90;
}
del .amount {
	color: #635b51 !important;
}
ins {
	background: transparent;
}

.percentage-left, .percentage-right {
	padding-top: 0 !important;
	float: left;
	margin-top: 18px;
}
.percentage-left {
	margin-left: 10px;
	line-height: 28px;
}
.percentage-left span {
	font-size: 28px;
    line-height: 28px;
    font-family: 'bitterregular';
}
.percentage-right span {
	display: block;
	font-size: 16px;
	line-height: 16px;
	font-family: 'bitterregular';
}
span.off {
	font-family: 'cantarellregular';
	font-size: 10px;
	line-height: 10px;
}
.onsale span {
	color: #ffffff;
}
.variant-description {
	font-family: 'cantarellregular';
    font-size: 15px;
    line-height: 27px;
    margin: 30px 0 40px 0;
    color: #000;
    text-align: left !important;
}
.variant-description p {
	font-family: 'cantarellregular';
    font-size: 15px;
    line-height: 27px;
    margin: 30px 0 40px 0;
    color: #000;
    text-align: left !important;
    margin-bottom: 20px;
}
.out-of-stock {
	display: none;
}
span.out-of-stock-badge {
	background-image: url(<?php echo get_template_directory_uri(); ?>/images/outofstock.png);
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
	width: 81px;
	height: 73px;
	position: absolute;
    z-index: 10000;
    top: -10px;
    right: 0px;
}
</style>

<?php if ( $heading ): ?>
  <h2 style="display:none;"><?php echo $heading; ?></h2>
<?php endif; ?>


<div class="variant-description"><?php the_content(); ?></div>
<div class="variant-description-2" style="display: none;"><?php the_content(); ?></div>



<?php $args = array(
	'posts_per_page'   => -1,
	'orderby'          => 'id',
	'order'            => 'DESC',
	'post_type'        => 'product_variation',
	'post_parent'      => $post->ID,
	'post_status'      => 'publish'
);

$posts_array = get_posts( $args ); 

$variant_description_Array = array();
foreach ( $posts_array as $post ) : setup_postdata( $post );
	$vProduct_ID = get_the_ID();
	$variant_description = get_post_meta( $vProduct_ID, '_variant_description', true );
	$variant_description_Array[$vProduct_ID] = $variant_description;
endforeach; 
wp_reset_postdata();

?>

<script type="text/javascript">
	var json_var = <?php echo json_encode($variant_description_Array) ?>;
	$(document).ready(function(){
		var prod_price_range = $('.product-top-details .product-price p').text();
		$('#price-range').val(prod_price_range);
		
		var setProdPrice = function() {
			setTimeout(function(){
				var varDesc = '';
				var varID = $('.variation_id').val();
				varDesc = json_var[varID];
				varDesc = $.trim(varDesc);
				var prodDesc = $('.variant-description-2').html();
				prodDesc = $.trim(prodDesc);

				console.log(varDesc);
				
				if( varDesc == '' ){
					$('.variant-description').html(prodDesc);
				} else {
					$('.variant-description').html(varDesc);
				}

				var variationsObject = $('.variations_form').data('product_variations');
				$.each(variationsObject, function(idx, obj) {
					if( obj.variation_id == varID ) {
						if( obj.display_price != obj.display_regular_price ) {
							var salePrice = obj.display_price;
							var regularPrice = obj.display_regular_price;
							var percentOff = ( salePrice / regularPrice ) * 100;
							percentOff = percentOff.toFixed()
							$('.onsale').html('<p class=\"percentage-left\"><span>' + percentOff + '</span></p>');
							$('.onsale').append('<p class=\"percentage-right\"><span>%</span><span class=\"off\">OFF</span>');
						} else {
							$('.onsale').text('Sale!');
						}
						var variableProd = '';
						variableProd = $('.single_variation .out-of-stock').text();
						if( variableProd != '' ){
							$('.out-of-stock-badge').css('display','block');
						} else {
							$('.out-of-stock-badge').css('display','none');
						}
					}
				});

				if( varID == '' ) {
					$('.onsale').text('Sale!');
					var price = $('p.price').html();
					$('.product-price').html(price);
				} else {
					var varPrice = $('span.price').html();
					$('.product-price').html(varPrice);
				}

				
				
			}, 1000);

			var singleProd = $('.entry-summary > .out-of-stock').text();
			if( singleProd != '' ) {
				$('.out-of-stock-badge').css('display','block');
			} else {
				$('.out-of-stock-badge').css('display','none');
			}
		}

		$('<span class="out-of-stock-badge"></span>').insertBefore('.images');
		setProdPrice();
		$('.variations select').on('change', setProdPrice );
	});
</script>
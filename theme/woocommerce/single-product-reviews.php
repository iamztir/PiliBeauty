<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.2
 */
 
 
global $product;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! comments_open() ) {
	return;
}

?>

<style>
.woocommerce .star-rating {
    float: none;
    overflow: hidden;
    position: relative;
    height: 1em;
    line-height: 1;
    font-size: 1em;
    width: 5.4em;
    font-family: star;
}
.woocommerce .star-rating:before {
	color: #00a29e;
}
.woocommerce .star-rating span:before {
	color: #00a29e;
}
button.write-review, button.write-review:hover {
	font-size: 12px;
    padding: 10px 15px;
}

#review_form {
 border: 1px solid #b1b1b1 !important;
 padding-bottom: 20px !important;
}
#respond {
 border: none !important;
 padding-bottom: 0 !important;
}
#respond form {
 margin-bottom: 0 !important;
}


</style>
<div id="reviews">
	<!--<div id="comments" style="display: none;">
		<h2><?php
			//if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) )
				//printf( _n( '%s review for %s', '%s reviews for %s', $count, 'woocommerce' ), $count, get_the_title() );
			//else
				//_e( 'Reviews', 'woocommerce' );
		?></h2>

		<?php //if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php //wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php //if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				//echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					//'prev_text' => '&larr;',
					//'next_text' => '&rarr;',
					//'type'      => 'list',
				) ) );
				//echo '</nav>';
			//endif; ?>

		<?php //else : ?>

			<p class="woocommerce-noreviews"><?php //_e( 'There are no reviews yet.', 'woocommerce' ); ?></p>

		<?php //endif; ?>
	</div>-->

		<?php
		
		 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
		
			global $post;
			    $args = array (
							'post_type'		 => 'product',
			    		   'status' 		=> 1,
						   'posts_per_page' => 3,
			    		   'post_id'		 => $post->ID
			    		   );	   
						   
			    $comments = get_comments( $args ); 		
		?>
		
		<div id="product-review-header">
			<div class="reviews text-left"><span>REVIEWS(<?php echo count ($comments); ?>)</span></div>
		</div>
		<div class="review-comments text-right"><button class="write-review">WRITE YOUR REVIEW</button></div>
		
		<div id="review-comments-wrapper" class="review-comments">
		
		<?php if ( have_comments() ) : ?>
			
			<?php	foreach ($comments as $review)  { ?>
			
				<div class="comment-data">
					<span class="name"><?php echo $review->comment_author; ?> </span>
					<?php $date = date_create($review->comment_date); ?>
					<span class="date"><?php echo date_format($date,"F j, Y"); ?> </span>
					<?php $rating = get_comment_meta( $review->comment_ID, 'rating', true ); ?>
					<?php $rating = $rating * 20; ?>
					<div itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating" class="star-rating" title="Rated 3 out of 5">
						<span style="width: <?php echo $rating; ?>%"><strong itemprop="ratingValue"><?php echo $rating; ?></strong> out of 5</span>
					</div>
					<p class="content"><?php echo $review->comment_content; ?></p>
				</div>
			<?php } ?>
			
			
			<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'woocommerce' ); ?></p>

		<?php endif; ?>
		
		</div>
		
			
	
	
	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

		<div id="review_form_wrapper">
		
			<div class="cross text-right"><button class="review-remove"><span class="review-close">&#x2573;</span></button></div>
		
			<div id="review_form">
				
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? __( 'Add a review', 'woocommerce' ) : __( 'Be the first to review', 'woocommerce' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
						'title_reply_to'       => __( 'Leave a Reply to %s', 'woocommerce' ),
						'comment_notes_before' => '',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
							            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',
							'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
							            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',
						),
						'label_submit'  => __( 'PROCEED', 'woocommerce' ),
						'logged_in_as'  => '',
						'comment_field' => ''
					);

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Your Rating', 'woocommerce' ) .'</label><select name="rating" id="rating">
							<option value="">' . __( 'Rate&hellip;', 'woocommerce' ) . '</option>
							<option value="5">' . __( 'Perfect', 'woocommerce' ) . '</option>
							<option value="4">' . __( 'Good', 'woocommerce' ) . '</option>
							<option value="3">' . __( 'Average', 'woocommerce' ) . '</option>
							<option value="2">' . __( 'Not that bad', 'woocommerce' ) . '</option>
							<option value="1">' . __( 'Very Poor', 'woocommerce' ) . '</option>
						</select></p>';
					}

					$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . __( 'What can you say about the product', 'woocommerce' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
					
					echo '<em style="font-size: 12px;">Your review will still be under approval.</em>';
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
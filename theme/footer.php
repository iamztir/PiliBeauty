<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#videoModal').on('hidden.bs.modal', function (e) {
            $iframe = $(this).find( 'iframe' );
            $iframe.attr('src', $iframe.attr('src'));
        });

        $(".carousel-inner").swipe( {
            swipeLeft:function(event, direction, distance, duration, fingerCount) {
                $(this).parent().carousel('next');
            },
            swipeRight: function() {
                $(this).parent().carousel('prev');
            },
            threshold:0
        });
    });
    /*
        $(function(){
            var x = jQuery('tfoot tr.fee td span.amount').text();
        //console.log(x);
        setInterval(function(){
            $('ul.payment_methods li img').attr('src', '<?php echo get_template_directory_uri();?>/images/paypal.png');


		var y = x.split(/\s+/);
		var currency = y[0];
		var paymentFee = y[1];
		paymentFee = paymentFee * 0.0220;
		paymentFee = paymentFee.toFixed(2)

		convertedAmount = currency.concat(' ',paymentFee);
		//jQuery('tfoot tr.fee td span.amount').text(convertedAmount);

	},1000)
});

	$(function(){
		setInterval(function(){
		//$("ul.payment_methods li.payment_method_bacs label[for=payment_method_bacs]").append("<img id='bank' src='<?php echo get_template_directory_uri();?>/images/bdo.png' />");
		$("ul.payment_methods li.payment_method_bacs label[for=payment_method_bacs").addClass('bdo-image');
	},1000)
	});
*/
</script>

<?php
global $post;
$post_slug = $post->post_name;
?>

<?php if( $post_slug == 'checkout' || $post_slug == 'cart' ) : ?>
    <div id="footer-wrapper">
        <div class="copyright-body custom-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="terms-policy">
                            <?php echo do_shortcode('[do_widget_area]'); ?>
                            <input id="curr" type="hidden" value="" />
                            <input id="exrate" type="hidden" value="" />
                            <a href="<?php echo get_permalink( get_page_by_path( 'terms-and-conditions' ) );?>">Terms & Conditions</a>
                            <span>|</span>
                            <a href="<?php echo get_permalink( get_page_by_path( 'privacy-policy' ) );?>">Privacy Policy</a>
                            <span>|</span>
                            <a href="<?php echo get_permalink( get_page_by_path( 'order-tracking' ) );?>">Order Tracking</a>
                        </div>
                        <div class="social-networking">
                            <div class="copyright-name">
                                <span>&copy; 2017 PILI | Elemie Naturals</span></div>
                            <div class="networking-sites">
                                <a href="https://www.facebook.com/ElemieNaturals" target="_blank">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/fb.png" />
                                </a>
                                <a href="https://instagram.com/elemienaturals" target="_blank">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/insta.png" />
                                </a>
                                <a href="https://twitter.com/elemienaturals" target="_blank">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div id="footer-wrapper">
        <div class="footer_01"><img src="<?php echo get_template_directory_uri(); ?>/images/footer_01.png"></div>
        <div class="footer_02"><img src="<?php echo get_template_directory_uri(); ?>/images/footer_02.png"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 main-footer">
                    <!--Lone Unicorn-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 footer">
                        <?php

                        echo '<div class="footer-name contact"><span>DAILY ESSENTIALS</span><div class="arrow"> </div></div>';
                        echo '<ul class="footer-list">';

                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => -1,
                            'order'=> 'ASC',
                            'orderby' => 'title',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'term_id',
                                    'terms' => 39,
                                )
                            ),
                        );

                        $postslist = get_posts( $args );

                        foreach ( $postslist as $post ) : setup_postdata( $post );
                            echo  '<li><a href="'. get_the_permalink() .'">' . get_the_title() . '</a></li>';
                        endforeach;
                        wp_reset_postdata();
                        echo '</ul>';
                        ?>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 footer">
                        <?php

                        echo '<div class="footer-name contact"><span>LIP CARE</span><div class="arrow"> </div></div>';
                        echo '<ul class="footer-list">';

                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => -1,
                            'order'=> 'ASC',
                            'orderby' => 'title',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'term_id',
                                    'terms' => 40,
                                )
                            ),
                        );

                        $postslist = get_posts( $args );

                        foreach ( $postslist as $post ) : setup_postdata( $post );
                            echo  '<li><a href="'. get_the_permalink() .'">' . get_the_title() . '</a></li>';
                        endforeach;
                        wp_reset_postdata();
                        echo '</ul>';
                        ?>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 footer">
                        <?php

                        echo '<div class="footer-name contact"><span>WELLNESS</span><div class="arrow"> </div></div>';
                        echo '<ul class="footer-list">';

                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => -1,
                            'order'=> 'ASC',
                            'orderby' => 'title',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'term_id',
                                    'terms' => 41,
                                )
                            ),
                        );

                        $postslist = get_posts( $args );

                        foreach ( $postslist as $post ) : setup_postdata( $post );
                            echo  '<li><a href="'. get_the_permalink() .'">' . get_the_title() . '</a></li>';
                        endforeach;
                        wp_reset_postdata();
                        echo '</ul>';
                        ?>
                    </div>




                    <!--	<div class="footer-body">
							<?php
                    $args = array(
                        'taxonomy'     => 'product_cat',
                        'orderby'      => 'id',
                        'show_count'   => '0',
                        'pad_counts'   => '0',
                        'hierarchical' => '1',
                        'title_li'     => '',
                        'hide_empty'   => '0'
                    );

                    $all_categories = get_categories( $args );

                    if($all_categories) {

                        foreach ($all_categories as $cat) {
                            if($cat->category_parent == 0) {
                                echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 footer">';
                                print_r('<div class="footer-name"><span>'. $cat->name .'</span> <div class="arrow"> </div></div>');
                                echo '<ul class="footer-list" style="display: none;">';
                                $args = array(
                                    'post_type' => 'product',
                                    'posts_per_page' => -1,
                                    'order'=> 'ASC',
                                    'orderby' => 'title',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'terms' => $cat->slug,
                                            'field' => 'slug',
                                        )
                                    ),
                                );
                                $postslist = get_posts( $args );

                                foreach ( $postslist as $post ) :
                                    setup_postdata( $post );
                                    echo  '<li><a href="'. get_the_permalink() .'">' . get_the_title() . '</a></li>';
                                endforeach;
                                wp_reset_postdata();
                                echo '</ul>';
                                echo '</div>';
                            }
                        }

                    }
                    ?>
						-->

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 footer">
                        <div class="footer-name about"><span>ABOUT</span><div class="arrow"> </div></div>
                        <ul class="footer-list">
                            <?php
                            $argss = array(
                                'order'                  => 'ASC',
                                'orderby'                => 'menu_order',
                                'post_type'              => 'nav_menu_item',
                                'post_status'            => 'publish',
                                'output'                 => ARRAY_A,
                                'output_key'             => 'menu_order',
                                'nopaging'               => true,
                                'update_post_term_cache' => false
                            );

                            $items = wp_get_nav_menu_items( '2', $argss );

                            foreach($items as $item ) {
                                if ( $item->menu_item_parent == 0 && $item->title == 'About Us' ) {
                                    $aboutID = $item->ID;
                                }
                                if ( $item->menu_item_parent == $aboutID ) {
                                    echo '<li><a href="'. $item->url .'">' . $item->title . '</a></li>';
                                    //print_r($item);
                                }

                            }
                            ?>
                            <li class="footer-distributor"><a href="https://www.pilibeauty.com/contact-us/">For International Distributors | Click Here!</a></li>
                        </ul>
                    </div>

<!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 footer">-->
<!--    <div class="footer-name contact"><span>CONTACT</span><div class="arrow"> </div></div>-->
<!--    <ul class="footer-list">-->
<!--        <li>Unit 209 Gold Condominium,</li>-->
<!--        <li>15 Annapolis Street,</li>-->
<!--        <li>Greenhills, San Juan City,</li>-->
<!--        <li>1502 Philippines</li>-->
<!--        <li class="footer-distributor"><a href="--><?php //echo get_permalink( get_page_by_path( 'contact-us' ) );?><!--">For International Distributors</a></li>-->
<!--    </ul>-->
<!--</div>-->
                </div><!--footer-body-->
            </div>
        </div>
    </div>
    <div class="copyright-body custom-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="terms-policy">
                        <?php echo do_shortcode('[do_widget_area]'); ?>
                        <a href="<?php echo get_permalink( get_page_by_path( 'terms-and-conditions' ) );?>">Terms & Conditions</a>
                        <span>|</span>
                        <a href="<?php echo get_permalink( get_page_by_path( 'privacy-policy' ) );?>">Privacy Policy</a>
                        <span>|</span>
                        <a href="<?php echo get_permalink( get_page_by_path( 'refund-policy' ) );?>">Refund Policy</a>
                    </div>
                    <div class="social-networking">
                        <div class="copyright-name"><span>&copy; 2017 PILI | Pili Beauty</span></div>
                        <div class="networking-sites">
                            <a href="https://www.facebook.com/PiliBeauty" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/fb.png" />
                            </a>
                            <a href="https://instagram.com/pilibeautyph" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/insta.png" />
                            </a>
                            <a href="https://twitter.com/PiliBeauty" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div><!--footer-->
<?php endif; ?>
<?php wp_footer(); ?>


</body>
</html>

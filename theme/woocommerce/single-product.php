<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header(); ?>

<style>
    .images {
        width: 100% !important;
    }
    .product-item {
        height: 250px;
    }

    .product-item .featured-image {
        background-size: auto 100%;
        background-repeat: no-repeat;
        background-position: center;
        width: 100%;
        height: 150px;
        margin: 20px 0;
    }

    .product-item > a {
        text-decoration: none;
    }

    .product-item p {
        text-align: center;
        color: #635b51;
    }

    .product-item {
        /*border-right: 1px solid #f2f2ea;*/
        /*border-bottom: 1px solid #f2f2ea;*/
    }

    .product-item:hover .featured-image {
        opacity: 0.8;
    }

    .product-item.third .border-right {
        /*border-right: none;*/
        display: none;
    }

    .product-item.last-row-item .border-bottom {
        /*border-bottom: none;*/
        display: none;
    }

    .category-02 li {
        padding-bottom: 30px;
        border-bottom: 1px solid #c4c3c1;
    }

    .category-02 li.last {
        border-bottom: none;
        padding-top: 30px;
    }

    .category-01 > li {
        padding: 20px 0 !important;
    }

    .category-01 > li > span {
        margin-left: 30px;
        font-family: 'bitterregular';
        font-size: 13px;
        color: #bbb6ae;
        letter-spacing: 5px;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .product-01 > li {
        padding: 0;
    }

    .product-01 > li > a {
        padding-left: 30px;
        display: block;
        line-height: 20px;
        padding: 10px 20px;
    }

    .view-all {
        overflow: auto;
    }

    .view-all > a {
        display: block;
        text-decoration: none;
        padding: 10px 0 10px 30px;
        margin: 20px 0;
        color: #635b51;
    }

    .view-all > a:hover {
        color: #ffffff;
        background-color: #635b51;
    }

    .top-banner {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        height: 255px;
        width: 100%;
    }
    #about-sidebar-menu-toggle {
        display: none;
    }
    #about-sidebar-menu-items {
        display: none;
    }
    #tab-description {
        box-shadow: none;
    }
    .product_title {
        text-transform: uppercase;
    }
    .product-top-details {
        border-bottom: 1px solid #b1b1b1;
        padding-bottom: 20px !important;
    }
    .product-top-details .product-title {
        float: none;
    }
    .product-top-details .product-price {
        float: none;
    }
    .product-top-details .product-price p {
        color: #00a29b;
        font-size: 20px;
        text-align: left;
    }
    .variations_form, .cart {
        padding-top: 20px;
    }
    .variations {
        width: 100%;
        margin-bottom: 0 !important;
    }
    .variations td {
        padding-bottom: 10px;
    }
    .variations label, .variations_button label {
        text-transform: uppercase;
        width: 100%;
        font-size: 12px;
        color: #61584c;
        font-family: 'bitterregular';
        letter-spacing: 1px;
    }
    .variations select {
        border-radius: 0;
        font-family: 'cantarellregular';
        height: 40px;
    }
    .single_variation {
        display: none;
    }
    .quantity {
        display: inline-block;
        float: none !important;
        margin: 0 !important;
    }
    .quantity input {
        width: 50px;
        font-family: 'bitterregular';
    }
    #product_add, #product_subtract {
        background-color: #635b51;
        width: 35px;
        height: 33px;
        color: #ffffff;
        display: inline-block;
        cursor: pointer;
        text-align: center;
        line-height: 33px;
        text-decoration: none;
        border-radius: 0;
        border: none;
        padding: 0;
    }
    #product_add:hover, #product_subtract:hover {
        background-color: #635b51;
        background-image: none;
    }
    #product_add {
        margin-left: -4px;
    }
    #product_add:hover, #product_subtract:hover {
        background-color: #635a51;
    }
    .single_add_to_cart_button {
        width: 100%;
        background-color: #159a90 !important;
        text-transform: uppercase;
        color: #ffffff;
        height: 40px;
        border-radius: 0 !important;
        font-weight: normal !important;
    }
    .woocommerce-tabs {
        border-top: 1px solid #b1b1b1;
        padding-top: 20px;
    }

    .woocommerce .quantity .qty {
        width: 65px !important;
    }

    @media (min-width: 1024px) {
        .desktop-wrapper {
            width: 1024px;
        }
    }
    @media (max-width: 640px) {
        .top-banner {
            height: 200px;
            background-size: auto 100%;
        }
        .sidebar-product {
            display: none;
        }
        .about-box {
            display: none;
        }
        #about-sidebar-menu-toggle {
            background-color: #f0ece5;
            margin-top: 15px;
            padding: 10px 15px;
            font-family: cantarellregular;
            cursor: pointer;
            display: block;
            margin-left: 2%;
            margin-right: 2%;
        }
        #about-sidebar-menu-toggle .arrow-up-down {
            background-image: url(<?php echo get_template_directory_uri(); ?>/images/arrow-up-down.png);
            background-repeat: no-repeat;
            background-size: 100% auto;
            width: 14px;
            height: 8px;
            display: block;
            position: absolute;
            right: 15px;
            top: 15px;
        }
        #about-sidebar-menu-toggle.active .arrow-up-down {
            background-position: bottom center;
        }
        #about-sidebar-menu-toggle.inactive .arrow-up-down {
            background-position: top center;
        }
        #about-sidebar-menu-items {
            margin-top: 2px;
            margin-left: 2%;
            margin-right: 2%;
        }
        #about-sidebar-menu-items ul li {
            background-color: #f0ece5;
            padding: 10px 15px;
            font-family: cantarellregular;
            cursor: pointer;
        }
        #about-sidebar-menu-items ul li a {
            color: black;
            text-decoration: none;
            display: block;
            width: 100%;
        }
        .no-padding {
            padding: 2% 0 !important;
        }
    }
    @media (max-width: 500px) {
        .top-banner {
            display: none !important;
        }
        .top-banner-mobile {
            display: block !important;
        }
        .top-banner-mobile img {
            min-height: 320px;
            min-width: 320px;
            max-width: 100%;
            max-height: 100%;
        }
    }
</style>

<?php
$page = get_page_by_path('products');
$thumb_id = get_post_thumbnail_id($page->ID);
$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
?>

<div class="top-banner" style="background-image: url(<?php echo $thumb_url[0]; ?>); "></div>
<div class="top-banner-mobile" style="display: none;"><img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/Website_banner_shop_mobile.jpg" alt=""></div>
<div class="container single-product desktop-wrapper">
    <div class="row">
        <div class="col-md-2 col-sm-3 nopadding">
            <div class="sidebar-product">
                <div class="view-all"><a href="<?php echo get_permalink( get_page_by_path( 'products' ) ); ?>">VIEW ALL</a></div>

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
                    echo '<ul class="category-01">';
                    foreach ($all_categories as $cat) {
                        if($cat->category_parent == 0) {
                            echo '<li>';
                            echo '<span>'. $cat->name .'</span>';

                            echo '<ul class="product-01">';
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
                            echo '</li>';
                        }
                    }
                    echo '</ul>';
                }
                ?>

                <div class="pili_leaves03"></div>
            </div>

            <div id="about-sidebar-menu-toggle" class="inactive">
                <span class="active-page"><?php if ( get_the_title() == 'Products' ) : echo 'VIEW ALL'; else : echo get_the_title(); endif; ?></span>
                <span class="arrow-up-down"></span>
            </div>
            <div id="about-sidebar-menu-items" class="">
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
                    echo '<ul>';
                    echo '<li><a href="'.get_permalink( get_page_by_path( 'products' ) ).'">VIEW ALL</a></li>';
                    foreach ($all_categories as $cat) {
                        if($cat->category_parent == 0) {
                            echo '<li>';
                            echo '<span>'. $cat->name .'</span>';
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
                            echo '</li>';
                        }
                    }
                    echo '</ul>';
                }
                ?>
            </div>
        </div>
        <div class="col-md-10 col-sm-9">
            <?php
            /**
             * woocommerce_before_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             * @hooked woocommerce_breadcrumb - 20
             */
            do_action( 'woocommerce_before_main_content' );
            ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php wc_get_template_part( 'content', 'single-product' ); ?>

            <?php endwhile; // end of the loop. ?>

            <?php
            /**
             * woocommerce_after_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action( 'woocommerce_after_main_content' );
            ?>

            <?php
            /**
             * woocommerce_sidebar hook
             *
             * @hooked woocommerce_get_sidebar - 10
             */
            //do_action( 'woocommerce_sidebar' );
            ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>

<script>
    $(document).ready(function(){
        $("#product_add").click(function() {
            var x = parseInt($('.qty').val());
            x = x + 1;
            $('.qty').val(x);
        });
        $("#product_subtract").click(function() {
            var y = parseInt($('.qty').val());
            if( y == 1 ) {
                y = 1;
            } else {
                y = y - 1;
            }
            $('.qty').val(y);
        });
    });
</script>
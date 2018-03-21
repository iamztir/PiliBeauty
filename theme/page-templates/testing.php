<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
    <div id="myCarousel-1" class="carousel slide hidden-xs" data-ride="carousel">

        <?php
        $args = array(
            'post_type' 		=> 'home-page-slider',
            'post_status' 		=> 'publish',
            'posts_per_page' 	=> -1,
            'orderby'          	=> 'DATE',
            'order'            	=> 'DESC',
            'post__not_in' => array($post->ID)
        );
        ?>

        <?php $wp_query = new WP_Query($args); ?>

        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php if(have_posts()):  ?>
                <?php $number = 0; ?>
                <?php while(have_posts()): the_post(); ?>
                    <li data-target="#myCarousel-1" data-slide-to="<?php echo $number++; ?>"></li>
                <?php endwhile; ?>
            <?php endif; ?>
        </ol>

        <div class="carousel-inner" role="listbox">

            <?php if ( $wp_query->have_posts() ) : ?>
                <?php $counter = 1; ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                        <div class="item <?php if($counter==1){echo 'active';}?>">
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                            <?php $slider_url = get_post_meta( $post->ID, 'wpcf-slider-url', true ); ?>
                            <?php if( $slider_url != "" ) : ?>
                            <a href="<?php echo $slider_url; ?>" <?php if( $new_tab == '1') : echo "target=\"_blank\""; endif; ?>>
                                <?php endif; ?>
                                <img src="<?php echo $image[0]; ?>" style="width:100%"/>
                                <?php if( $slider_url != "" ) : ?> </a> <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php $counter++; ?>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            <?php endif; ?>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel-1" role="button" data-slide="prev">
            <span class="lg-prev glyphicon glyphicon-chevron-left"><!--img src="assets/images/lg_previous.png"--></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel-1" role="button" data-slide="next">
            <span class="lg-next glyphicon glyphicon-chevron-left"><!--img src="assets/images/lg_next.png"--></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div id="myCarousel-2" class=" carousel slide visible-xs" data-ride="carousel">

        <?php
        $args = array(
            'post_type' 		=> 'home-page-slider',
            'post_status' 		=> 'publish',
            'posts_per_page' 	=> -1,
            'orderby'          	=> 'DATE',
            'order'            	=> 'DESC',
            'post__not_in' => array($post->ID)
        );
        ?>

        <?php $wp_query = new WP_Query($args); ?>

        <ol class="carousel-indicators">
            <?php if(have_posts()):  ?>
                <?php $number = 0; ?>
                <?php while(have_posts()): the_post(); ?>
                    <li data-target="#myCarousel-2" data-slide-to="<?php echo $number++; ?>"></li>
                <?php endwhile; ?>
            <?php endif; ?>``
        </ol>

        <div class="carousel-inner" role="listbox">

            <?php if ( $wp_query->have_posts() ) : ?>
                <?php $counter = 1; ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php $image = get_post_meta( $post->ID, "wpcf-page-slider-mobile", true ); ?>
                    <?php if ( $image != '' ) : ?>
                        <div class="item <?php if($counter==1){ echo 'active'; }?>">
                            <?php $slider_url = get_post_meta( $post->ID, 'wpcf-slider-url', true ); ?>
                            <?php if( $slider_url != "" ) : ?>
                            <a href="<?php echo $slider_url; ?>" <?php if( $new_tab == '1') : echo "target=\"_blank\""; endif; ?>>
                                <?php endif; ?>
                                <img src="<?php echo $image; ?>" style="width:100%"/>
                                <?php if( $slider_url != "" ) : ?> </a> <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php $counter++; ?>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            <?php endif; ?>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel-2" role="button" data-slide="prev">
            <span class="lg-prev glyphicon glyphicon-chevron-left"><!--img src="assets/images/lg_previous.png"--></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel-2" role="button" data-slide="next">
            <span class="lg-next glyphicon glyphicon-chevron-left"><!--img src="assets/images/lg_next.png"--></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div id="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 featured-product">
                    <h4 class="featured-name text-center">FEATURED PRODUCTS</h4>
                    <!-- <div id="myCarousel-3" class="product-slider hidden-xs carousel slide" data-ride="carousel"> -->
                    <!-- Indicators -->
                    <!-- <div class="carousel-inner" role="listbox"> -->
                    <!-- --> <?php
                    //          $args2 = array(
                    //                          'post_type' 	 => 'product',
                    //                          'meta_key' 		 => '_featured',
                    //                          'meta_value' 	 => 'yes',
                    //                          'posts_per_page' => -1
                    //                         );
                    //       ?>
                    <!-- --> <?php //$wp_query2 = new WP_Query($args2); ?>
                    <!-- --> <?php //$featured_product_count = $wp_query2->post_count;?>
                    <!-- --> <?php //$featured_product_count = $featured_product_count - ($featured_product_count % 4); ?>
                    <!-- --> <?php
                    //            $args = array(
                    //                           'post_type' 	 => 'product',
                    //                           'meta_key' 		 => '_featured',
                    //                           'meta_value' 	 => 'yes',
                    //                           'posts_per_page' => $featured_product_count
                    //                          );
                    //       ?>
                    <!-- --><?php
                    //            function iconic_find_matching_product_variation( $product, $attributes ) {
                    //            foreach( $attributes as $key => $value ) {
                    //                            if( strpos( $key, 'attribute_' ) === 0 ) {
                    //                                        continue;
                    //                               }
                    //                                 unset( $attributes[ $key ] );
                    //                                 $attributes[ sprintf( 'attribute_%s', $key ) ] = $value;
                    //                               }
                    //                                 if( class_exists('WC_Data_Store') ) {
                    //                                    $data_store = WC_Data_Store::load( 'product' );
                    //                                    return $data_store->find_matching_product_variation( $product, $attributes );
                    //                                } else {
                    //                                    return $product->get_matching_variation( $attributes );
                    //                                }
                    //                            }
                    //       ?>
                    <!-- --><?php
                    //            function iconic_get_default_attributes( $product ) {
                    //                             if( method_exists( $product, 'get_default_attributes' ) ) {
                    //                                  return $product->get_default_attributes();
                    //                              } else {
                    //                                   return $product->get_variation_default_attributes();
                    //                                }
                    //                            }
                    //       ?>
                    <!-- --><?php //$wp_query = new WP_Query($args); ?>
                    <!-- --><?php //if ( $wp_query->have_posts() ) : ?>
                    <!-- --><?php //$counter = 1; ?>
                    <!-- --><?php //$fourCount = 1; ?>
                    <!-- --><?php //while ( have_posts() ) : the_post(); ?>
                    <!-- --><?php //$excerpt = wp_trim_words(get_the_excerpt(),20); ?>
                    <!-- --><?php //$homeid = $product->id; ?>
                    <!-- --><?php
                    //             $default_attributes = iconic_get_default_attributes( $product );
                    //             $variation_id = iconic_find_matching_product_variation( $product, $default_attributes ); ?>
                    <!-- --><?php //if (has_post_thumbnail( $wp_query->post->ID ))?>
                    <!-- --><?php //if( $fourCount == 1 ) : ?> <!-- <div class="item --><?php //if ($counter == 1) {echo 'active';}?> <!-- "> --><?php //endif; ?>
                    <!-- <div class="col-sm-3 product"> -->
                    <!-- <a href=" --> <?php //echo get_permalink( $wp_query->post->ID ) ?> <!-- "> -->
                    <!-- --><?php //echo get_the_post_thumbnail($wp_query->post->ID, 'shop_catalog'); ?>
                    <!-- <div class="home-product-desc"><p> --> <?php //echo $excerpt;?> <!-- </p></div> -->
                    <!-- <div class="home-product-title"><p> --> <?php //the_title(); ?> <!-- </p></div> -->
                    <!-- </a> -->
                    <!-- <div class="add-to-cart-button"><a href="https://www.pilibeauty.com/?add-to-cart= --> <?php //echo $homeid ?> <!-- &variation_id= --> <?php //echo $variation_id ?> <!-- &attribute_pa_tinted-lip-balm=barely-red&attribute_pa_lipstick=classic&attribute_pa_body-oil-size=100ml&attribute_pa_essential-oil-size=6ml&attribute_pa_essential-oil-variant=stress-away-blend">ADD TO CART</a></div> -->
                    <!-- </div> -->
                    <!-- --><?php //if( $fourCount == 4 ) : ?><!-- </div> --><?php //$fourCount = 0; endif; ?>
                    <!-- --><?php //wp_reset_postdata(); ?>
                    <!-- --><?php //$counter++; ?>
                    <!-- --><?php //$fourCount++; ?>
                    <!-- --><?php //endwhile;  ?>
                    <!-- --><?php //endif; ?>
                    <!-- --><?php //wp_reset_query(); ?>
                    <!-- </div> -->
                    <!-- Left and right controls -->
                    <!-- <a class="left carousel-control" href="#myCarousel-3" role="button" data-slide="prev"> -->
                    <!-- <span class="lg-prev glyphicon glyphicon-chevron-left"><!--<img src="assets/images/lg_previous.png" /> </span> -->
                    <!-- <span class="sr-only">Previous</span> -->
                    <!-- </a> -->
                    <!-- <a class="right carousel-control" href="#myCarousel-3" role="button" data-slide="next"> -->
                    <!-- <span class="lg-next glyphicon glyphicon-chevron-left"><!--<img src="assets/images/lg_next.png" /> /span>  -->
                    <!-- <span class="sr-only">Next</span> -->
                    <!-- </a> -->
                    <!-- </div> -->

                    <!-- <div id="myCarousel-4" class=" product-slider visible-xs carousel slide" data-ride="carousel">-->
                    <!-- <div class="carousel-inner" role="listbox">-->
                    <!-- --><?php
                    //           $args2 = array(
                    //                          'post_type' 	 => 'product',
                    //                          'meta_key' 		 => '_featured',
                    //                          'meta_value' 	 => 'yes',
                    //                          'posts_per_page' => -1
                    //                          );
                    //      ?>
                    <!-- --><?php //$wp_query2 = new WP_Query($args2); ?>
                    <!-- --><?php //$featured_product_count = $wp_query2->post_count;?>
                    <!-- --><?php //$featured_product_count = $featured_product_count - ($featured_product_count % 2); ?>
                    <!-- --><?php
                    //           $args = array(
                    //                          'post_type' 	 => 'product',
                    //                          'meta_key' 		 => '_featured',
                    //                          'meta_value' 	 => 'yes',
                    //                          'posts_per_page' => $featured_product_count
                    //                         );
                    //      ?>
                    <!-- --><?php //$wp_query = new WP_Query($args); ?>
                    <!-- --><?php //if ( $wp_query->have_posts() ) : ?>
                    <!-- --><?php //$counter = 1; ?>
                    <!-- --><?php //$twoCount = 1; ?>
                    <!-- --><?php //while ( have_posts() ) : the_post(); ?>
                    <!-- --><?php //if (has_post_thumbnail( $wp_query->post->ID ))?>
                    <!-- --><?php //if( $twoCount == 1 ) : ?> <!--<div class="item --> <?php //if($counter==1){echo 'active';}?> <!-- "> --> <?php //endif; ?>
                    <!-- <div class="col-xs-6 product"> -->
                    <!-- <a href=" --> <?php //echo get_permalink( $wp_query->post->ID ) ?> <!-- "> -->
                    <!-- --> <?php //echo get_the_post_thumbnail($wp_query->post->ID, 'shop_catalog'); ?>
                    <!-- <p> --> <?php //the_title(); ?> <!-- </p> -->
                    <!-- </a> -->
                    <!-- </div> -->
                    <!-- --> <?php //if( $twoCount == 2 ) : ?> <!-- </div> --> <?php //$twoCount = 0; endif; ?>
                    <!-- --> <?php //$counter++; ?>
                    <!-- --> <?php //$twoCount++; ?>
                    <!-- --> <?php //endwhile; ?>
                    <!-- --> <?php //endif; ?>
                    <!-- --> <?php //wp_reset_query(); ?>
                    <!-- </div> -->
                    <!-- Left and right controls -->
                    <!-- <a class="left carousel-control" href="#myCarousel-4" role="button" data-slide="prev"> -->
                    <!-- <span class="lg-prev glyphicon glyphicon-chevron-left"><img src="assets/images/lg_previous.png"></span> -->
                    <!-- <span class="sr-only">Previous</span> -->
                    <!-- </a> -->
                    <!-- <a class="right carousel-control" href="#myCarousel-4" role="button" data-slide="next"> -->
                    <!-- <span class="lg-next glyphicon glyphicon-chevron-left"><img src="assets/images/lg_next.png"> </span> -->
                    <!-- <span class="sr-only"> Next </span> -->
                    <!-- </a> -->
                    <!-- </div> -->
                    <!-- <div class="col-md-12 second-body"> -->
                    <!-- <div class="col-xs-12 col-md-8 nopadding"> -->
                    <!-- <div class="pili_leaves" > -->
                    <!-- </div> -->
                    <!-- <div class="info-box"> -->
                    <!-- <div class="info info-box-m"> -->
                    <!-- <h4 class="title"> --> <?php //echo get_post_meta($post->ID, "wpcf-title", true); ?> <!-- </h4> -->
                    <!-- <p class="content"> --> <?php //echo get_post_meta($post->ID, "wpcf-description", true); ?> <!-- </p> -->
                    <!-- <a href=" --> <?php //echo get_permalink( get_page_by_path( 'about' ) ); ?> <!-- "><button type="button" class="btn btn-learn_more">LEARN MORE</button></a> -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- <div class="col-xs-12 col-md-4 nopadding"> -->
                    <!-- <a href="#" data-toggle="modal" data-target="#videoModal"> -->
                    <!-- <div class="avp-video"> -->
                    <!-- <div class="watch"></div> -->
                    <!-- </div> -->
                    <!-- </a> -->
                    <!-- <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true"> -->
                    <!-- <div class="modal-dialog"> -->
                    <!-- <div class="modal-content"> -->
                    <!-- <div class="modal-body"> m-->
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                    <!-- <div> -->
                    <!-- <iframe width="100%" height="350" src=" --> <?php //echo get_post_meta($post->ID, "wpcf-avp", true); ?> <!-- "></iframe> -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- </div> -->
<!--                    <div id="home-categories" class="row justify-content-md-center">-->
<!--                        <div id="category-beauty" class="col-md-4">-->
<!--                            <div class="category-images">-->
<!--                                <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/Category-Beauty.png">-->
<!--                            </div>-->
<!--                            <div class="category-button">Beauty</div>-->
<!--                        </div>-->
<!--                        <div id="category-wellness" class="col-md-4">-->
<!--                            <div class="category-images">-->
<!--                                <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/Category-Wellness.png">-->
<!--                            </div>-->
<!--                            <div class="category-button">Wellness</div>-->
<!--                        </div>-->
<!--                        <div id="category-essentials" class="col-md-4">-->
<!--                            <div class="category-images-last">-->
<!--                                <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/Category-Essentials.png">-->
<!--                            </div>-->
<!--                            <div class="category-button">Essentials</div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <!-- <script> -->
                    <!-- $(function () { -->
                    <!-- $('#carousel123').carousel({ -->
                    <!-- interval:2000, -->
                    <!-- pause: "true" -->
                    <!-- }); -->
                    <!-- $(".carousel-showsixmoveone .item").each(function() { -->
                    <!-- var itemToClone = $(this); -->
                    <!-- for (var i = 1; i < 3; i++) { -->
                    <!-- itemToClone = itemToClone.next(); -->
                    <!-- if (!itemToClone.length) { -->
                    <!-- itemToClone = $(this).siblings(":first"); -->
                    <!-- } -->
                    <!-- itemToClone -->
                    <!-- .children(":first-child") -->
                    <!-- .clone() -->
                    <!-- .addClass("cloneditem-" + i) -->
                    <!-- .appendTo($(this)); -->
                    <!-- } -->
                    <!-- }); -->
                    <!-- }); -->
                    <!-- $(function(){ -->
                    <!-- $("#category-item .item.active").addClass("focus-category"); -->
                    <!-- }); -->
                    <!-- </script> -->
                    <!-- <div class="carousel carousel-showsixmoveone slide" id="carousel123"> -->
                    <!-- <div class="carousel-inner"> -->
                    <!-- <ul id="category-item" class="item"> -->
                    <!-- <li id="category-beauty" class="col-xs-12 col-sm-4 col-md-4"><a href="#"><img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/Category-Beauty.png" class="img-responsive"></a></li> -->
                    <!-- </ul> -->
                    <!-- <ul id="category-item" class="item active"> -->
                    <!-- <li id="category-wellness" class="col-xs-12 col-sm-4 col-md-4"><a href="#"><img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/Category-Wellness.png" class="img-responsive"></a></li> -->
                    <!-- </ul> -->
                    <!-- <ul id="category-item" class="item"> -->
                    <!-- <li id="category-essentials" class="col-xs-12 col-sm-4 col-md-4"><a href="#"><img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/Category-Essentials.png" class="img-responsive"></a></li> -->
                    <!-- </ul> -->
                    <!-- </div> -->
                    <!-- <a class="left carousel-control" href="#carousel123" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a> -->
                    <!-- <a class="right carousel-control" href="#carousel123" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a> -->
                    <!-- </div> -->
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('.center-category').slick({
                                centerMode: true,
                                centerPadding: '0',
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                autoplay: true,
                                autoplaySpeed: 2000,
                                infinite: true,
                                variableWidth: true,
                                dots: true,
                                arrows: false,
                                responsive: [
                                    {
                                        breakpoint: 768,
                                        settings: {
                                            arrows: false,
                                            centerMode: true,
                                            centerPadding: '40px',
                                            slidesToShow: 3
                                        }
                                    },
                                    {
                                        breakpoint: 480,
                                        settings: {
                                            arrows: false,
                                            centerMode: true,
                                            centerPadding: '40px',
                                            slidesToShow: 1
                                        }
                                    }
                                ]
                            });
                        });
                        window.addEventListener('resize', function () { 
    "use strict";
    window.location.reload(); 
});
                    </script>
                    <div class="center-category">
                        <div class="slider-box">
                            <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/1.jpg">
                        </div>
                        <div class="slider-box">
                            <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/2.jpg">
                        </div>
                        <div class="slider-box">
                            <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/3.jpg">
                        </div>
                        <div class="slider-box">
                            <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/1.jpg">
                        </div>
                        <div class="slider-box">
                            <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/2.jpg">
                        </div>
                        <div class="slider-box">
                            <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/3.jpg">
                        </div>
                        <div class="slider-box">
                            <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/1.jpg">
                        </div>
                        <div class="slider-box">
                            <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/2.jpg">
                        </div>
                        <div class="slider-box">
                            <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/3.jpg">
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('.center-category-space').slick({
                                centerMode: true,
                                centerPadding: 0,
                                slidesToShow: 3,
                                infinite: true,
                                variableWidth: true,
                                dots: false,
                                focusOnSelect: true,
                                arrows: true,
                                responsive: [
                                    {
                                        breakpoint: 768,
                                        settings: {
                                            arrows: false,
                                            centerMode: true,
                                            centerPadding: '40px',
                                            slidesToShow: 3
                                        }
                                    },
                                    {
                                        breakpoint: 480,
                                        settings: {
                                            arrows: false,
                                            centerMode: true,
                                            centerPadding: '40px',
                                            slidesToShow: 1
                                        }
                                    }
                                ]
                            });
                        });
                    </script>
                    <div class="center-category-space">
                        <div class="slider-box">
                            <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/1.jpg">
                        </div>
                        <div class="slider-box">
                            <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/2.jpg">
                        </div>
                        <div class="slider-box">
                            <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/3.jpg">
                        </div>
                        <div class="slider-box">
                            <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/1.jpg">
                        </div>
                        <div class="slider-box">
                            <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/2.jpg">
                        </div>
                        <div class="slider-box">
                            <img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/3.jpg">
                        </div>
                    </div>
                    <script>
                        $(function() {
                            var showcase = $("#showcase")

                            showcase.Cloud9Carousel( {
                                yPos: 42,
                                smooth: true,
                                yRadius: 48,
                                mirrorOptions: {
                                    gap: 12,
                                    height: 0.2
                                },
                                buttonLeft: $(".nav > .left"),
                                buttonRight: $(".nav > .right"),
                                autoPlay: false,
                                bringToFront: true,
                                onRendered: showcaseUpdated,
                                onLoaded: function() {
                                    showcase.css( 'visibility', 'visible' )
                                    showcase.css( 'display', 'none' )
                                    showcase.fadeIn( 1500 )
                                }
                            } )

                            function showcaseUpdated( showcase ) {
                                var title = $('#item-title').html(
                                    $(showcase.nearestItem()).attr( 'alt' )
                                )

                                var c = Math.cos((showcase.floatIndex() % 1) * 2 * Math.PI)
                                title.css('opacity', 0.5 + (0.5 * c))
                            }

                            // Simulate physical button click effect
                            $('.nav > button').click( function( e ) {
                                var b = $(e.target).addClass( 'down' )
                                setTimeout( function() { b.removeClass( 'down' ) }, 80 )
                            } )

                            $(document).keydown( function( e ) {
                                //
                                // More codes: http://www.javascripter.net/faq/keycodes.htm
                                //
                                switch( e.keyCode ) {
                                    /* left arrow */
                                    case 37:
                                        $('.nav > .left').click()
                                        break

                                    /* right arrow */
                                    case 39:
                                        $('.nav > .right').click()
                                }
                            } )
                        })
                    </script>
                </div><!--col-md-12-->
            </div><!--row-->
        </div><!--container-->
    </div><!--main-wrapper-->
    <div class="container" style="width:1600px">
        <div id="wrap" class="row">
            <div id="showcase">
                <a href="https://www.pilibeauty.com/product-category/lip-care/"><img class="cloud9-item" src="https://www.pilibeauty.com/wp-content/uploads/2018/03/1-e1520223462172.jpg" alt="Alt"></a>
                <a href="https://www.pilibeauty.com/product-category/daily-essentials//"><img class="cloud9-item" src="https://www.pilibeauty.com/wp-content/uploads/2018/03/3-e1520223473294.jpg" alt="Alt"></a>
                <a href="https://www.pilibeauty.com/product-category/wellness/"><img class="cloud9-item" src="https://www.pilibeauty.com/wp-content/uploads/2018/03/2-e1520223440812.jpg" alt="Alt"></a>
            </div>
            <div class="nav">
                <span class="left"></span>
                <span class="right"></span>
            </div>
            <div id="mobile-nav" class="nav">
                <span id="mobile-left" class="left"></span>
                <span id="mobile-right" class="right"></span>
            </div>
        </div>
    </div>
<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>
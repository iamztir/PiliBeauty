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
        <div class="container" style="display: none;">
            <div class="row">
                <div class="col-md-12 featured-product">
                    <h4 class="featured-name text-center">Categories</h4>
                    <script>
                        $(function() {
                            var showcase = $("#showcase");

                            showcase.Cloud9Carousel( {
                                yPos: 48,
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
                                    showcase.css( 'visibility', 'visible' );
                                    showcase.css( 'display', 'none' );
                                    showcase.fadeIn( 1500 )
                                }
                            } );

                            function showcaseUpdated( showcase ) {
                                var title = $('#item-title').html(
                                    $(showcase.nearestItem()).attr( 'alt' )
                                );

                                var c = Math.cos((showcase.floatIndex() % 1) * 2 * Math.PI);
                                title.css('opacity', 0.5 + (0.5 * c))
                            }

                            // Simulate physical button click effect
                            $('.nav > button').click( function( e ) {
                                var b = $(e.target).addClass( 'down' );
                                setTimeout( function() { b.removeClass( 'down' ) }, 80 )
                            } );

                            $(document).keydown( function( e ) {
                                //
                                // More codes: http://www.javascripter.net/faq/keycodes.htm
                                //
                                switch( e.keyCode ) {
                                    /* left arrow */
                                    case 37:
                                        $('.nav > .left').click();
                                        break;

                                    /* right arrow */
                                    case 39:
                                        $('.nav > .right').click()
                                }
                            } )
                        });
                        window.addEventListener('resize', function () {
                            if(window.innerWidth > 425){
                                "use strict";
                                window.location.reload();
                            }
                        });
                    </script>
                </div><!--col-md-12-->
            </div><!--row-->
        </div><!--container-->
    </div><!--main-wrapper-->
    <div class="container home-container" style="margin-top: -5em;">
        <div id="wrap">
            <div id="showcase">
                <a href="https://www.pilibeauty.com/product-category/lip-care/"><img class="cloud9-item" src="https://www.pilibeauty.com/wp-content/uploads/2018/03/Square1-1.jpg" alt="Alt"></a>
                <a href="https://www.pilibeauty.com/product-category/wellness/"><img class="cloud9-item" src="https://www.pilibeauty.com/wp-content/uploads/2018/03/Square2-1.jpg" alt="Alt"></a>
                <a href="https://www.pilibeauty.com/product-category/daily-essentials/"><img class="cloud9-item" src="https://www.pilibeauty.com/wp-content/uploads/2018/03/Square3-1.jpg" alt="Alt"></a>
            </div>
            <div id="nav" class="nav">
                <span class="slider left"></span>
                <span class="slider right"></span>
            </div>
            <div id="mobile-nav" class="nav">
                <span id="mobile-left" class="slider left"></span>
                <span id="mobile-right" class="slider right"></span>
            </div>
        </div>
    </div>
    <style>
        #wrap {
            width: 980px;
            margin-top: 60px;
            left: -490px;
            margin-left: 50%;
            position: relative;
            margin-bottom: 4em;
        }
        #showcase {
            width: 100%;
            height: 500px;
            margin-top: 12px;
            visibility: hidden;
            overflow: visible !important;
        }
        #showcase img {
            cursor: pointer;
            max-width: 650px;
            max-height: 500px;
        }
        .cloud9-item {
            max-width: 100% !important;
            max-height: 100% !important;
            min-width: 320px;
            min-height: 320px;
        }
        #nav {
            text-align: center;
            position: relative;
            top: -22em;
            overflow: visible;
            width: 100%;
            z-index: 240;
        }
        .slider.left, .slider.right {
            height: 100px;
            width: 30px;
            cursor: pointer;
        }
        .slider.left {
            float: left;
            background: url(https://www.pilibeauty.com/wp-content/uploads/2018/03/prev.png);
            background-repeat: no-repeat !important;
            position: relative;
            left: -10em;
        }
        .slider.right {
            float: right;
            background: url(https://www.pilibeauty.com/wp-content/uploads/2018/03/nxt.png);
            background-repeat: no-repeat !important;
            position: relative;
            right: -10em;
        }
        #nav > button:active, #nav > button.down {
            box-shadow: none;
        }
        #mobile-nav {
            text-align: center;
            display: none;
            position: inherit;
            top: inherit;
        }
        .mobile-left, .mobile-right {
            height: 100px;
            width: 30px;
            cursor: pointer;
            position: relative;
        }
        #mobile-left.left {
            background: url(https://www.pilibeauty.com/wp-content/uploads/2018/03/prev-white.png) no-repeat;
            display: inline-block;
            float: inherit;
        }
        #mobile-right.right {
            background: url(https://www.pilibeauty.com/wp-content/uploads/2018/03/nxt-white.png) no-repeat;
            display: inline-block;
            float: inherit;
        }
        @media screen and (max-width: 1256px) {
            #showcase img {
                cursor: pointer;
                max-width: 500px;
                max-height: 400px;
            }
            #nav {
                top: -17em !important;
            }
            .slider.left {
                left: inherit;
                background: url(https://www.pilibeauty.com/wp-content/uploads/2018/03/new-prev.png);
            }
            .slider.right {
                right: inherit;
                background: url(https://www.pilibeauty.com/wp-content/uploads/2018/03/new-nxt.png);
            }
        }
        @media screen and (max-width: 1024px) {
            #mobile-nav {
                display: block !important;
                top: -12em;
                z-index: 202;
            }
            #mobile-right.right {
                right: -10em !important;
            }
            #mobile-left.left {
                left: -10em !important;
            }
            #nav {
                display: none !important;
            }
        }
        @media screen and (max-width: 425px) {
            .home-container {
                padding-right: 0px;
                padding-left: 0px;
            }
            #wrap {
                width: 100%;
                height: 100%;
                min-width: 320px;
                min-height: 320px;
                left: inherit;
                margin-left: inherit;
                margin-bottom: -5.5em;
                margin-top: 0;
            }
            #showcase {
                overflow: hidden !important;
                max-width: 500px;
                margin-top: -3em;
                max-width: 100%;
                max-height: 100%;
            }
            #mobile-nav {
                display: block !important;
                top: -20em;
                z-index: 202;
            }
        }
        @media screen and (max-width: 375px) {
            #wrap {
                margin-bottom: -7.5em;
            }
        }
        @media screen and (max-width: 320px) {
            #wrap {
                margin-bottom: -11.5em ;
            }
        }
    </style>
<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>
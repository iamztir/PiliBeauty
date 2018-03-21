<?php
/**
 * Template Name: About Page Template
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
    <style>
        .img-responsive, .attachment-full, .wp-post-image {
            width: 100%;
            height: 100%;
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
        @media (max-width: 767px) {
            .top-banner {
                height: 200px;
                background-size: auto 100%;
            }
            .about-box {
                display: none;
            }
            #about-sidebar-menu-toggle {
                display: block;
            }
            #about-sidebar-menu-toggle {
                background-color: #f0ece5;
                margin-top: 15px;
                padding: 10px 15px;
                font-family: cantarellregular;
                cursor: pointer;
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
                padding: 0 !important;
            }
        }
        @media (min-width: 1024px) {
            .desktop-wrapper {
                width: 1024px;
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
    <!--header class="slider-homepage">
	<?php echo get_the_post_thumbnail( $post->ID, 'full' );?>
</header-->

<?php
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
?>

    <div class="top-banner" style="background-image: url(<?php echo $thumb_url[0]; ?>); "></div>
    <div class="top-banner-mobile" style="display: none;"><img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/Website_banner_aboutus_mobile.jpg" alt=""></div>

    <div class="container desktop-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2 col-sm-3 nopadding">
                    <div class="about-box">
                        <ul class="about-submenu">
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
                        </ul>

                        <div class="pili_leaves02"></div>
                    </div>

                    <div id="about-sidebar-menu-toggle" class="inactive">
                        <span class="active-page"><?php echo get_the_title(); ?></span>
                        <span class="arrow-up-down"></span>
                    </div>
                    <div id="about-sidebar-menu-items" class="">
                        <ul>
                            <?php
                            foreach($items as $item ) {
                                if ( $item->menu_item_parent == 0 && $item->title == 'About Us' ) {
                                    $aboutID = $item->ID;
                                }
                                if ( $item->menu_item_parent == $aboutID ) {
                                    echo '<li><a href="'. $item->url .'">' . $item->title . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10 col-sm-9 custom-padding">
                    <div id="about-content">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                    </div><!--about-content-->
                </div>
            </div>
        </div>
    </div>

<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>
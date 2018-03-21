<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

function isFacebook() {
    if (
        strpos($_SERVER["HTTP_USER_AGENT"], "facebookexternalhit/") !== false ||
        strpos($_SERVER["HTTP_USER_AGENT"], "Facebot") !== false
    ) {
        return true;
    }
    return false;
}
/*
if (
    ( (do_shortcode('[geoip_detect2 property="country"]') == "Canada") || (do_shortcode('[geoip_detect2 property="country"]') == "United States") )
    && !is_user_logged_in()
    && !isFacebook()
    ) {
    header('Location: https://www.piliani.com');
}

*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?> data-country="<?php echo do_shortcode('[geoip_detect2 property="country"]'); ?>">
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <!-- attach CSS styles -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/slick.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/slick-theme.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/media-queries.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/main.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/fonts/stylesheet.css" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Cantarell:400" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" />
    <!-- Custom styles for this template -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/jcarousel.responsive.css" rel="stylesheet">

    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/common-scripts.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.touchSwipe.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/slick.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.cloud9carousel.js"></script>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-90872522-1', 'auto', 'thtfTracker');
        ga('thtfTracker.send', 'pageview');

    </script>

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '447247212295919'); // Insert your pixel ID here.
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=447247212295919&ev=PageView&noscript=1"
        /></noscript>
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php global $woocommerce; ?>

<header id="top" role="banner" class="mobile-carousel">
    <nav class="navbar hidden-xs" role="navigation">
        <div class="header container">
            <a class="navbar-brand" href="<?php bloginfo('url')?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/pili_logo.png">
            </a>
            <div class="header_bg"></div>

            <?php
            $defaults = array(
                'theme_location'  => '',
                'menu'            => 2,
                'container'       => 'div',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => 'menu',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul class="nav navbar-nav navbar-right">%3$s</ul>',
                'depth'           => 0,
                'walker'            => ''
            );
            wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) );
            ?>



        </div><!-- container-->
    </nav><!-- #navbar -->

    <nav class="navbar visible-xs-block navbar-fixed-top" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="<?php bloginfo('url')?>">
                <img class="logo_1" src="<?php echo get_template_directory_uri(); ?>/images/pili_logo.png">
            </a>
            <div class="header_bg"></div>
            <div class="navbar-header" id="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#tt_mobile_nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?php echo get_permalink( get_page_by_path( 'cart' ) )?>">
                    <div class="cart-mobile">
                        <?php echo $woocommerce->cart->cart_contents_count?>
                    </div>
                </a>
                <script>
                    function myFunction() {
                        var x = document.getElementById("mobile-converter");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                        } else {
                            x.style.display = "none";

                        }
                    }
                </script>
                <button class="mega-calculator-menu-mobile" onclick="myFunction()"> </button>
                </button>
                <div id="mobile-converter" style="display: none;">
                    <?php echo  do_shortcode( '[woocommerce_currency_switcher_drop_down_box]' ); ?>
                </div>
            </div>
        </div>
        <div class="navbar-collapse collapse" id="tt_mobile_nav">
            <?php
            $defaults = array(
                'theme_location'  => '',
                'menu'            => 2,
                'container'       => 'div',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => 'menu',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul class="nav navbar-nav navbar-right">%3$s</ul>',
                'depth'           => 0,
                'walker'            => new BootstrapBasicMyWalkerNavMenu()
            );
            wp_nav_menu( $defaults );
            ?>
        </div>
    </nav>
</header>

<script>
    jQuery(document).ready(function(){
        jQuery('.mega-cart-menu-header a').text('<?php echo $woocommerce->cart->cart_contents_count?>');
    });


</script>

<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '447247212295919', {
        em: 'insert_email_variable'
    });
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=447247212295919&ev=PageView&noscript=1"
    /></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->

<style>
    #woo-floating-minicart-icon span.cart-icon { border-radius: 100px; background-color: #149a91 !important; }
    #woo-floating-minicart-base { background-color: #fff !important; padding-bottom: 1em; }
    #woo-floating-minicart-base .total { display: none; }
    #awfm-cart-button { display: none; }
    #woo-floating-minicart span.quantity { font-size: 12px !important; }
    #woo-floating-minicart ul.cart_list li.mini_cart_item a { font-size: 1.25em !important; }
</style>



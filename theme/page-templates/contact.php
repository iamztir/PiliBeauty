<?php

/**

 * Template Name: Contact Us Page Template

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




        @media (max-width: 480px) {

            .top-banner {

                height: 200px;

                background-size: auto 100%;

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



    <div class="top-banner" style="background-image: url(<?php echo $thumb_url[0]; ?>);  margin-bottom: 1em;"></div>
    <div class="top-banner-mobile" style="display: none; margin-bottom: 1em;"><img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/Website_banner_contact_mobile.jpg" alt=""></div>


    <div class="container desktop-wrapper">

        <div class="row">

            <div class="col-md-12 mobile-no-padding">

                <div class="col-md-4 nopadding">

                    <div class="address-body">

                        <div class="contacts office-address">

                            <div class="title office-address"><span>OFFICE ADDRESS</span></div>

                            <?php echo get_post_meta( $post->ID, 'wpcf-contact-address', true); ?>

                        </div>



                        <div class="contacts telephone">

                            <div class="title"><span>CONTACT NUMBERS</span></div>

                            <?php echo get_post_meta( $post->ID, 'wpcf-contact-number', true); ?>

                        </div>



                        <div class="contacts email-address">

                            <div class="title"><span>EMAIL ADDRESS</span></div>

                            <?php echo get_post_meta( $post->ID, 'wpcf-contact-email-address', true); ?>

                        </div>

                    </div>

                </div>

                <div class="col-md-8 padding-left">

                    <h3 class="title">MESSAGE US</h3>



                    <div class="message-01" style="display: none;">



                        <div class="message-body">

                            <div class="name"><span>NAME</span></div>

                            <input type="text" class="message-us" name="name" placeholder="Lorem ipsum dolor">

                        </div>



                        <div class="message-body">

                            <div class="name"><span>CONTACT NUMBER</span></div>

                            <input type="text" class="message-us" name="contact" placeholder="Lorem Ipsum dolor">

                        </div>



                        <div class="message-body">

                            <div class="name"><span>EMAIL ADDRESS</span></div>

                            <input type="text" class="message-us" name="email" placeholder="Lorem Ipsum dolor">

                        </div>



                    </div>



                    <div class="message-02" style="display: none;">

                        <div class="name"><span>YOUR MESSAGE</span></div>

                        <textarea class="message" name="message" placeholder="Lorem Ipsum dolor"></textarea>



                        <div class="send-button">

                            <button type="button" class="btn btn-send">SEND</button>

                        </div>



                    </div>



                    <div class="message-01 col-xs-12 col-md-12">

                        <?php echo do_shortcode('[contact-form-7 id="168" title="Contact form 2"]') ?>

                    </div>

                </div>

            </div>

        </div>

    </div>





<?php get_sidebar( 'front' ); ?>

<?php get_footer(); ?>
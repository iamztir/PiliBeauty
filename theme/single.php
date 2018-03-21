<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
    <style>
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


$next_post_url = get_permalink( get_adjacent_post(false,'',false)->ID );
$next_post_title = get_the_title( get_adjacent_post(false,'',false)->ID );
$previous_post_url = get_permalink( get_adjacent_post(false,'',true)->ID );
$previous_post_title = get_the_title( get_adjacent_post(false,'',true)->ID );
?>

    <div class="top-banner" style="background-image: url(<?php echo $thumb_url[0]; ?>); "></div>
    <div class="top-banner-mobile" style="display: none;"><img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/Website_banner_shop_mobile.jpg" alt=""></div>
    <div class="container single-blog">
        <div class="row">
            <div class="col-md-8 blog-body">
                <div class="blog-content">
                    <h2><?php the_title(); ?></h2>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <p><?php the_content(); ?></p>

                    <?php endwhile; // end of the loop. ?>
                </div>


                <div class="pagination">
					<span class="previous pull-left"><?php if ($previous_post_url  != get_permalink()){?>
                        <a href="<?php echo $previous_post_url; ?>"><button><i class="fa fa-angle-left"></i>PREV</button> <?php }?></a>
					</span>
                    <span class="next pull-right"><?php if ($next_post_url  != get_permalink()){?>
                        <a href="<?php echo $next_post_url; ?>"><button>NEXT<i class="fa fa-angle-right"></i></button><?php }?></a>
					</span>
                </div>


            </div>
            <div class="col-md-4 blog-content blog-sidebar" style="padding-top: 1em;">
                <?php dynamic_sidebar(); ?>
            </div>

            <style>
                .blog-sidebar li {
                    padding: 0.5em 0;
                }
            </style>
            <!--
	<div class="col-md-12" style="margin-top: 1em">

			<span class="featured-articles pull-left">FEATURED ARTICLES</span>
		<span class="all-articles pull-right"><a href="<?php echo get_permalink( get_page_by_path( 'blog' ) ); ?>">VIEW ALL ARTICLES</a></span>
	<div class="col-md-12">
				<?php
            $args = array(
                'post_type' 		=> 'post',
                'post_status' 		=> 'publish',
                'posts_per_page' 	=> 4,
                'orderby'          	=> 'DATE',
                'order'            	=> 'DESC',
                'post__not_in' => array($post->ID)
            );
            ?>

				<?php $wp_query = new WP_Query($args); ?>

					<?php if ( $wp_query->have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-md-4 custompadding">
							<div class="blog-content">
								<div class="blog-image"></div>
								<h3><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></h3>
								<p><?php echo get_the_excerpt(); ?></p>
							</div>
					</div>
				<?php endwhile; ?>
					<?php endif; ?>
					</div>
    </div>
    -->

        </div>
        <?php echo do_shortcode('[mc4wp_form id="5347"]'); ?>
    </div>
<?php get_footer(); ?>
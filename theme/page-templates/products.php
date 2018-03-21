<?php
/**
 * Template Name: Products Page Template
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

<?php
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
?>

    <div class="top-banner" style="background-image: url(<?php echo $thumb_url[0]; ?>); "></div>
    <div class="top-banner-mobile" style="display: none;"><img src="https://www.pilibeauty.com/wp-content/uploads/2018/03/Website_banner_shop_mobile.jpg" alt=""></div>

    <div class="container desktop-wrapper">
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

            <div class="col-md-10 col-sm-9 product-paddingleft no-padding">
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
                $cat_count = count($all_categories);
                if($all_categories) {
                    echo '<ul class="category-02">';
                    foreach ($all_categories as $cat) {
                        if($cat->category_parent == 0) {
                            if( $cat_count == 1 ) :
                                echo '<li class="last">';
                            else :
                                echo '<li>';
                            endif;

                            echo '<span class="cat-name">'. $cat->name . '</span>';
                            echo '<p class="paragraph">' . $cat->description . '</p>';

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
                            $items_count = count($postslist);
                            $counter = 0;
                            $array_place = array("first", "second", "third");
                            $item_counter = 1;
                            ?>

                            <div class="row">
                                <?php foreach ( $postslist as $post ) :
                                    setup_postdata( $post );
                                    $row_count = floor($items_count/3);
                                    $abc = $row_count * 3;

                                    if ( $item_counter > $abc ) :
                                        echo  '<div class="col-md-4 col-xs-12 product-item '. $array_place[$counter] .' last-row-item">';
                                    else :
                                        echo  '<div class="col-md-4 col-xs-12 product-item '. $array_place[$counter] .'">';
                                    endif;

                                    $thumb_id = get_post_thumbnail_id();
                                    $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);

                                    echo '<a href="'. get_the_permalink() .'">';
                                    echo '<div class="featured-image" style="background-image: url('.$thumb_url[0].');">';
                                    echo '</div>';
                                    echo '<p>'. get_the_title() .'</p>';
                                    echo '</a>';

                                    echo '<div class="border-right"></div>';
                                    echo '<div class="border-bottom"></div>';
                                    echo '</div>';

                                    $counter++;
                                    if( $counter == 3 ) : $counter = 0; endif;
                                    $item_counter++;
                                endforeach;
                                wp_reset_postdata(); ?>
                            </div>
                            <?php
                            echo '</li>';
                        }
                        $cat_count--;
                    }
                    echo '</ul>';
                }
                ?>
            </div>
        </div>
    </div>

<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>
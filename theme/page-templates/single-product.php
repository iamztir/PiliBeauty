<?php
/**
 * Template Name: Single Product Page Template
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
 <header class="slider-homepage">
	<?php echo get_the_post_thumbnail( $post->ID, 'full' );?>
</header>

<div class="container">
	<div class="row">
	<div class="col-md-12">
		<div class="col-md-2 nopadding">
			<div class="sidebar-product">
				<li><a href="<?php echo get_permalink( get_page_by_path( 'products' ) ); ?>">VIEW ALL</a></li>
				
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
										echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name . '</a>';

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
		</div>
		
		<div class="col-md-10">
		
			<div class="col-md-4">
				<div class="singleproduct-img"></div>
			</div>
			
			<div class="col-md-8">
			<div class="description">
				<h4 class="title">LIP GLOSS</h4>
				<p class="paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi et ligula porttitor, commodo sem non, congue nisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam laoreet nisi quis mauris ultrices, ut bibendum nunc bibendum.</p>
			</div>
			</div>
		</div>
	
	</div>
	</div>
</div>

 
 
 
 
 <?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>
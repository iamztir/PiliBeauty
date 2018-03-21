<?php
/**
 * Template Name: Sample Product List
 **/
?>

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
			foreach ($all_categories as $cat) {
		    	if($cat->category_parent == 0) {
		    		echo '<li>';
			        	$category_id = $cat->term_id;   

			        	echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name . '</a>';
			        	echo ' - ' . $cat->description;

						$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); 
						$image = wp_get_attachment_url( $thumbnail_id ); 
						echo "<img src='{$image}' alt='' />";

						$args2 = array(
							'taxonomy'     => 'product_cat',
							'child_of'     => 0,
							'parent'       => $category_id,
							'orderby'      => 'id',
							'show_count'   => '0',
							'pad_counts'   => '0',
							'hierarchical' => '1',
							'title_li'     => '',
							'hide_empty'   => '0'
						);
			        	
			        	$sub_cats = get_categories( $args2 );
						
						if($sub_cats) {
							echo '<ul>';
					            foreach($sub_cats as $sub_category) {
					                echo  '<li><a href="'. get_term_link($sub_category->slug, 'product_cat') .'">' . $sub_category->name . '</a></li>';

									$product_args = array( 'post_type' => 'product', 'posts_per_page' => 1, 'product_cat' => $sub_category->slug );

									$loop = new WP_Query( $product_args );

									while ( $loop->have_posts() ) : $loop->the_post(); 
									global $product; 

									echo '<br /><a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().' '.the_title().'</a>';
									endwhile; 

									wp_reset_query(); 
					            }
					        echo '</ul>';
			        	}
			        echo '</li>';
				}
			}
		echo '</ul>';
	}
?>

-------------------------------------------------------------------------------------<br /><br />

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
			echo '<a href="'. $item->url .'">' . $item->title . '</a><br />';
			//print_r($item);
		}

	}
?>
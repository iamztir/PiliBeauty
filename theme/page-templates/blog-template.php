<?php
/**
 * Template Name: Blog Template
 */

get_header(); ?>

<!--header class="slider-homepage">
	<?php echo get_the_post_thumbnail( $post->ID, 'full' );?>
</header-->
<!--
<?php
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
?>

<div class="top-banner" style="background-image: url(<?php echo $thumb_url[0]; ?>); "></div>
-->

<div class="container blog">
    <?php the_post(); the_content(); ?>
</div>
<!--
<div class="container blog">
	<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
	
		<?php
			$args = array( 
				'post_type' 		=> 'post', 
				'post_status' 		=> 'publish', 
				'posts_per_page' 	=> 12,
				'orderby'          	=> 'DATE',
				'order'            	=> 'DESC',
				'paged' => 				$paged,
				'type' => 				'list',
				'prev_text'         => __('&lt;PREV'),
				'next_text'         => __('NEXT&gt;')
			); 
		?>
		
		<?php $wp_query = new WP_Query($args); ?>

	<div class="row">
	<div class="col-md-12 blog-body">
			<h4>ARTICLES</h4>
		<?php if ( $wp_query->have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="col-md-3 custompadding">
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
	
		<div class="text-center">
			<?php echo paginate_links( $args ); ?>
		</div>
	
	
</div>
-->

<?php get_footer(); ?>
<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div id="primary" class="site-content">
	<div id="content" role="main">

	<div class="container desktop-wrapper">
		<div class="row">
		<div class="col-md-12">
			<div id="main-wrapper" class="error-404">
				<article id="post-0" class="post error404 no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'twentytwelve' ); ?></h1>
					</header>

					<div class="entry-content error-page text-center">
						
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'twentytwelve' ); ?></p>
						
						<img src="<?php echo get_template_directory_uri(); ?>/images/404.png"/>
					
					</div><!-- .entry-content -->
						<?php //get_search_form(); ?>
					
				</article><!-- #post-0 -->
			
			</div>
		</div>
		</div>
	</div>

	<?php get_footer( '2' ); ?>
	
</div><!-- #content -->
</div><!-- #primary -->


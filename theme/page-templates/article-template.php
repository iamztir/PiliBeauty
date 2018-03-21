<?php
/**
 * Template Name: Article Template
 *
 */

get_header(); ?>
<style>
.top-banner {
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
	height: 255px;
	width: 100%;
}
.article-container {
    margin-top: 55px;
    margin-bottom: 55px;
}
.article-container .title {
	color: #61584c;
    font-family: 'bitterregular';
    font-size: 20px;
    letter-spacing: 2px;
    text-transform: uppercase;
	margin-bottom: 30px;
}
.article-container h3 {
	color: #000000;
    font-size: 16px;
    font-family: 'cantarellregular';
    margin: 14px 0;
    text-transform: uppercase;
}
.article-container p {
	color: #000000;
    font-size: 14px;
    font-family: 'cantarellregular';
    margin: 14px 0px 35px 0px;
    padding-left: 25px;
    line-height: 25px;
    background-image: url(<?php echo get_template_directory_uri(); ?>/images/bullet.png);
    background-repeat: no-repeat;
    background-position: 0px 6px;
}
.article-container li {
	color: #000000;
	font-family: 'cantarellregular';
	font-size: 14px;
	margin: 14px 0px 14px 0px;
    padding-left: 25px;
    line-height: 25px;
    background-image: url(<?php echo get_template_directory_uri(); ?>/images/bullet.png);
    background-repeat: no-repeat;
    background-position: 0px 6px;
}

@media (max-width: 767px) {
	.top-banner {
		height: 200px;
		background-size: auto 100%;
	}
}
@media (min-width: 1024px) {
	.desktop-wrapper {
		width: 1024px;
	}
}
</style>

<?php
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
?>

<div class="top-banner" style="background-image: url(<?php echo $thumb_url[0]; ?>); "></div>

<div class="container desktop-wrapper">
	<div class="row">
		<div class="col-md-12 article-container">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="title"><?php the_title(); ?></div>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
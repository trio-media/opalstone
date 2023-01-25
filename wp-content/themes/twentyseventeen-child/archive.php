<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php 
	if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false ) {
		$webPSupport = '.webp';
	} else {
		$webPSupport = '';
	} 

	$AttachmentId = get_field('news_archive_hero_image', 'option');
	$Size = 'CTAImage';		
	$Image = wp_get_attachment_image_src($AttachmentId, $Size);
	$alt = get_post_meta($AttachmentId , '_wp_attachment_image_alt', true);
?>

<div class="container-fluid subpage-hero" style="
background-image:url(<?php echo $Image[0];?>);
background-position: top center;
background-repeat: no-repeat;
background-size:cover;"
data-imageLoad="<?php echo $Image[0];?>">

	<div class="container h-100">
		<div class="row vertical">
			<div class="col-12 col-lg-6">
				<h1><?php echo post_type_archive_title( '', false );?></h1>

				<?php if ( function_exists('yoast_breadcrumb') ) 
			{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
			</div>
		</div>
	</div>
</div>   

<div class="container-fluid post-list reduce-header">
	<div class="container">
    	<div class="row">
		<?php
			if ( have_posts() ) : ?>
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
	
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					include( get_stylesheet_directory() . '/template-parts/post/content-news.php');
	
				endwhile; ?>
                
                <?php wp_pagination_nav();?>
		
			<?php else :
	
				include( get_stylesheet_directory() .'/template-parts/post/content-none.php' );

			endif; ?>
        </div>
    </div>
</div>



<?php get_footer();

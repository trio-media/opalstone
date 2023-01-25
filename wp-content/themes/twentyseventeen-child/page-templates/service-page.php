<?php
/**
 * Template Name: Service Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 */

get_header(); ?>

<?php include( get_stylesheet_directory() . '/template-parts/post/content-subpage-hero.php');?>

<?php 
	if( have_rows('text_image_blocks') ):
		while ( have_rows('text_image_blocks') ) : the_row();
			if( get_row_layout() == 'image_text_block' ):
				include( get_stylesheet_directory() . '/template-parts/post/content-image-text-split.php');
			endif;
		endwhile;
	endif;
?>

<?php if (is_page(90)) { ?>
	<div class="container-fluid accreditation-about-block">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2>About our accreditations</h2>
				</div>
				
				<?php 
					while ( have_rows('accreditations', 'option') ) : the_row();
				
						$AttachmentId = get_sub_field('image');
						$Size = 'accreditationLogo';		
						$Image = wp_get_attachment_image_src($AttachmentId, $Size);
						$alt = get_post_meta($AttachmentId , '_wp_attachment_image_alt', true);
				?>          	
						<div class="col-12 col-sm-6 col-md-3 mb-4">    
							<a class="cta-container" <?php if (get_sub_field('link','option')) {?>href="<?php echo the_sub_field('link','option');?>"<?php } ?> target="_blank">
								<div class="image-container">
									<img src="<?php echo $Image[0];?>" alt="<?php echo $alt; ?>" class="horizontal"/>
								</div>
								
								<?php echo the_sub_field('about'); ?>
							</a>
						</div>
				 <?php endwhile; ?>
				
			</div>
		</div>
	</div>
<?php } ?>

<?php include( get_stylesheet_directory() . '/template-parts/post/content-progression-block.php');?>

<?php 
	if (!is_page(90)) {
		include( get_stylesheet_directory() . '/template-parts/post/content-contact.php');
	}
?>

<?php get_footer();
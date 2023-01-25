<?php
/**
 * Template Name: Partnerships Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 */

get_header(); ?>

<?php include( get_stylesheet_directory() . '/template-parts/post/content-subpage-hero.php');?>

<?php
	while ( have_rows('flexible_content') ) : the_row();

		if(get_row_layout() == 'standard_content'){

			include(get_stylesheet_directory() . '/template-parts/modular-blocks/standard-content.php');

		} elseif(get_row_layout() == 'blockquote_row'){

			include(get_stylesheet_directory() . '/template-parts/modular-blocks/blockquote-row.php');

		} elseif(get_row_layout() == 'image_content_split_block'){

			include( get_stylesheet_directory() . '/template-parts/post/content-image-text-split.php');

		}

	endwhile;
?>

<div class="container-fluid accreditation-about-block">
		<div class="container">
			<div class="row">
				<?php 
					while ( have_rows('partnerships') ) : the_row();
				
						$AttachmentId = get_sub_field('image');
						$Size = 'accreditationLogo';		
						$Image = wp_get_attachment_image_src($AttachmentId, $Size);
						$alt = get_post_meta($AttachmentId , '_wp_attachment_image_alt', true);
				?>          	
						<div class="col-12 col-sm-6 col-lg-3 mb-4">    
							<a class="cta-container" <?php if (get_sub_field('link','option')) {?>href="<?php echo the_sub_field('link','option');?>"<?php } ?> target="_blank">
								<div class="image-container">
									<img src="<?php echo $Image[0];?>" alt="<?php echo $alt; ?>"/>
								</div>
								
								<?php echo the_sub_field('about'); ?>
							</a>
						</div>
				 <?php endwhile; ?>
				
			</div>
		</div>
	</div>

<?php //include( get_stylesheet_directory() . '/template-parts/post/content-contact.php');?>

<?php get_footer();
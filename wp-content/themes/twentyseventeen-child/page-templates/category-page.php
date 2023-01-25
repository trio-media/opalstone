<?php
/**
 * Template Name: Category Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 */

get_header(); ?>

<?php include( get_stylesheet_directory() . '/template-parts/post/content-subpage-hero.php');?>

<?php include( get_stylesheet_directory() . '/template-parts/post/content-subpage-intro.php');?>

<div class="container-fluid child-pages">
	<div class="container">
		<div class="row">
			<div class="col-0 col-xl-1"></div>
			
			<div class="col-12 col-xl-10">
				<div class="row justify-content-center">
					<?php
						global $post;
						
						// If is services page show child child page (ones below monitor response etc)
						if (is_page(283)) {
							// get the sub pages (Monitor response etc)
							$args = array( 
								'posts_per_page' => -1, 
								'orderby' => 'menu_order', 
								'order'   => 'ASC',
								'post_type' => 'page', 
								'post_parent__in' => array( 285, 301, 309, 315 )
							);
							
						// Else just get child pages
						} else { 
							$args = array( 
								'posts_per_page' => -1, 
								'orderby' => 'menu_order', 
								'order'   => 'ASC',
								'post_type' => 'page', 
								'post_parent' => $post->ID
							);
						}

						$myposts = get_posts( $args );
							foreach ( $myposts as $post ) : setup_postdata( $post );
					?>
								<div class="col-12 col-md-3">
									<a href="<?php echo the_permalink(); ?>" class="child-page-container">
									<?php 
										if (get_field('icon')) { 
											$AttachmentId = get_field('icon');
											$Size = 'CTAImage';		
											$Image = wp_get_attachment_image_src($AttachmentId, $Size);
											$alt = get_post_meta($AttachmentId , '_wp_attachment_image_alt', true);
									?>
											<div class="image-container">
												<img src="<?php echo $Image[0];?>" alt="<?php echo $alt; ?>" class="horizontal"/>
											</div>
									<?php } else { ?>
										<div class="vertical missing-img title">
											Sorry, we don't currently have an image for this post
										</div>
									<?php } ?>
									
									<h4><?php echo the_title(); ?></h4>
									</a>
								</div>
					<?php
							endforeach; 
						wp_reset_postdata();
					?>
				</div>
			</div>
			
			<div class="col-0 col-xl-1"></div>
		</div>
	</div>
</div>

<?php include( get_stylesheet_directory() . '/template-parts/post/content-contact.php');?>

<?php get_footer();
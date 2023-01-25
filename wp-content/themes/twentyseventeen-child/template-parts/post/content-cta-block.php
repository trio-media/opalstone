<?php 
	if( have_rows('cta_block', 'option') ):
	while( have_rows('cta_block', 'option') ): the_row(); 
?>
		<div class="container-fluid cta-block-top">
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-12 col-lg-7">
						<h2><?php echo the_sub_field('title'); ?></h2>
						
						<?php echo the_sub_field('text'); ?>
					</div>
				</div>
			</div>
			
			<img src="/wp-content/uploads/2021/01/TouchImage.png" alt="Hand Icon" class="control-image">
		</div>
		
		<?php if( have_rows('ctas') ): ?>
			<div class="container-fluid cta-block-bottom">
				<div class="container">
					<div class="row">
						<?php 
							while( have_rows('ctas') ): the_row(); 
								
								$AttachmentId = get_sub_field('image');
								$Size = 'CTAImage';		
								$Image = wp_get_attachment_image_src($AttachmentId, $Size);
								$alt = get_post_meta($AttachmentId , '_wp_attachment_image_alt', true);
						
								$id = get_sub_field('select_page');
								$temp = $post;
								$post = get_post( $id );
								setup_postdata( $post );
						?>
							<div class="col-12 col-sm-4 col-md-4">
								<?php if (get_sub_field('disable_link')) { ?>
								<div class="cta-container">
								<?php } else { ?>
								<a href="<?php echo the_permalink(); ?>" class="cta-container">
								<?php } ?>
									<div class="image-container">
										<img src="<?php echo $Image[0];?>" alt="<?php echo $alt; ?>" class="horizontal"/>
									</div>
									
									<h4><?php echo the_title(); ?></h4>

									<?php echo the_excerpt(); ?>
									
								<?php if (get_sub_field('disable_link')) { ?>
								</div>
								<?php } else { ?>
									<span class="cta-button horizontal">Find out more</span>
								</a>
								<?php } ?>
							</div>
						<?php 
								wp_reset_postdata();
								$post = $temp;
							endwhile; 
						?>
					</div>
				</div>
			</div>
		<?php endif; ?>
<?php 
	endwhile; 
	endif;
?>
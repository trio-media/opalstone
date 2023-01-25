<?php 
	if( have_rows('progression_block') ):
	while( have_rows('progression_block') ): the_row(); 
		if (get_sub_field('title')) { 
?>
			<div class="container-fluid progression-block-top">

				<div class="overlay" data-rellax-speed="1" style="
			background-image:url(/wp-content/uploads/2020/08/Solid-white-circle.png);"
			data-imageLoad="/wp-content/uploads/2020/08/Solid-white-circle.png"></div>

				<div class="container">
					<div class="row">
						<div class="col-12">
							<h2><?php echo the_sub_field('title'); ?></h2>
						</div>
					</div>
				</div>
			</div>
		
		<?php 
			}
			if( have_rows('cards') ): 
		?>
			<div class="container-fluid progression-block-bottom">
				<div class="container">
					<div class="row justify-content-center">
						<?php 
							while( have_rows('cards') ): the_row(); 
								
								$AttachmentId = get_sub_field('icon');
								$Size = 'CTAImage';		
								$Image = wp_get_attachment_image_src($AttachmentId, $Size);
								$alt = get_post_meta($AttachmentId , '_wp_attachment_image_alt', true);
						?>
								<div class="col-12 col-sm-6 col-md-3">
									<div class="cta-container">
										<div class="image-container">
											<img src="<?php echo $Image[0];?>" alt="<?php echo $alt; ?>" class="horizontal"/>
										</div>

										<h4><?php echo the_sub_field('title'); ?></h4>

										<p><?php echo the_sub_field('text'); ?></p>
									</div>
								</div>
						<?php 
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
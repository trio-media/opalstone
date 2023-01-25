<?php 
while ( have_rows('testimonials_block') ) : the_row(); 

$AttachmentId = get_sub_field('image');
$Size = 'newsImage';		
$Image = wp_get_attachment_image_src($AttachmentId, $Size);
$alt = get_post_meta($AttachmentId , '_wp_attachment_image_alt', true);

$BackgroundAttachmentId = get_sub_field('background_image');
$BackgroundSize = 'fullWidthHeaderImage';		
$BackgroundImage = wp_get_attachment_image_src($BackgroundAttachmentId, $BackgroundSize);
$Backgroundalt = get_post_meta($AttachmentId , '_wp_attachment_image_alt', true);
?>
	<div class="container-fluid testimonial-block">
		
		<div class="background-image float-left w-100 h-100 position-absolute" style="
			background-image:url(<?php echo $BackgroundImage[0];?>);
			background-position: left;
			background-repeat: no-repeat;
			background-size: cover;"
			data-imageLoad="<?php echo $BackgroundImage[0];?>"></div>
		
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-7">
					<h3 class="float-left w-100"><?php echo the_sub_field('title'); ?></h3>
					
					<p class="float-left w-100"><?php echo the_sub_field('text'); ?></p>
					
					<h4 class="float-left w-100">Here is one of our latest testimonials...</h4>
					
					<div class="reviews-slider float-left w-100">
						<?php while ( have_rows('reviews') ) : the_row(); ?>
							<div class="review-container float-left">
								<?php echo the_sub_field('text'); ?>

								<strong class="float-left w-100">
									<?php echo the_sub_field('author'); ?>
								</strong>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		</div>

		<div class="image float-left" style="
			background-image:url(<?php echo $Image[0];?>);
			background-position: left;
			background-repeat: no-repeat;
			background-size: cover;"
			data-imageLoad="<?php echo $Image[0];?>"></div>
	</div>
<?php endwhile; ?>
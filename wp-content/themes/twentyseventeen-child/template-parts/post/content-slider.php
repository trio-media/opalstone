<div class="slider-main">
	<?php 
	while ( have_rows('hero') ) : the_row();

	if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false ) {
	$webPSupport = '.webp';
	} else {
	$webPSupport = '';
	}
	
	$sliderAttachmentId = get_sub_field('background_image');
	$sliderSize = 'fullWidthHeaderImage';
	$sliderImage = wp_get_attachment_image_src($sliderAttachmentId, $sliderSize); 
	?>
		<div class="slides position-relative">

			<div class="background-image float-left w-100 h-100 position-absolute" style="
			background-image:url(<?php echo $sliderImage[0];?>);
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;"
				 data-imageLoad="<?php echo $sliderImage[0];?>"></div>
			
			<div class="container h-100">
				<div class="row vertical">
					<div class="col-12 col-lg-10">
						<h1 class="slides__heading slides__heading--desktop"><?php echo the_sub_field('title'); ?></h1>
						<h1 class="slides__heading slides__heading--mobile"><?php echo the_sub_field('mobile_title'); ?></h1>
						<?php echo the_sub_field('text'); ?>
						<h4 style="color: white; margin-top: 0; font-family: 'Open Sans', sans-serif; padding-bottom: 20px; margin-bottom: 10px; font-weight: 400;">Opalstone Group are a multi-service provider operating throughout the UK to all sectors. Our key to success is delivering the best customer experience through managed solutions, this has led to nationwide companies turning to us as their trusted security provider.</h4>
						<a href="<?php echo the_permalink(162); ?>" class="cta-button mr-3 mb-3">
							Get in Touch
						</a>
					</div>
				</div>
			</div>
		</div>      
	<?php endwhile; ?>
</div>
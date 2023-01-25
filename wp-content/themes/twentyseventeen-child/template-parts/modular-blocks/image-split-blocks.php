<div class="container-fluid flexible-row-block image-content-block <?php if (get_sub_field('image_position')) { echo the_sub_field('image_position'); } else { echo 'left'; } ?>-image">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 image">
				<div class="image-container vertical">
					<?php 
						$contentImageAttachmentId = get_sub_field('image');
						$contentImageSize = 'textImageSplitImage';
						$contentImage = wp_get_attachment_image_src($contentImageAttachmentId, $contentImageSize);
					?>

					<img src="<?php echo $contentImage[0];?>" alt="<?php echo get_post_meta($contentImageAttachmentId, '_wp_attachment_image_alt', true) ?>"/>
				</div>
			</div>

			<div class="col-12 col-md-6 text">
				<div class="float-left vertical">
					<h2><?php the_sub_field('title');?></h2>

					<?php the_sub_field('text');?>

					<?php 
						if( have_rows('download_buttons') ):
						while( have_rows('download_buttons') ): the_row(); 
					?>
						<a href="<?php echo the_sub_field('link'); ?>" class="cta-button">
							<i class="fas fa-download"></i>

							<?php echo the_sub_field('text'); ?>
						</a>
					<?php 
						endwhile; 
						endif;
					?>
				</div>
			</div>
		</div>
	</div>
</div>